<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Modules\Discount\Entities\Discount;

if (!function_exists('registerCode')) {
    function registerCode($request)
    {
        try {
            $code = $request->validate([
                'code' => ['required', Rule::exists('discounts', 'code'),]
            ]);

            if ($code) {
                $code = Discount::query()->where('code', $code)->first();
                $codeID = $code->id;

                $loggedInUserID = auth()->user()->id;

                $AllowedUsersID = $code->users()->pluck('id')->toArray();
                if (in_array($loggedInUserID, $AllowedUsersID)) {
                    $tableCode = DB::table('discount_user')->where('user_id', $loggedInUserID)->where('discount_id', $codeID);
                    if (!$tableCode->first()->register) {
                        $tableCode->update(['register' => 1]);
                        return 'correct';
                    } else {
                        return 'exists';
                    }
                } else {
                    return 'not yours';
                }
            }

        } catch (\Exception $e) {
            return 'incorrect';
        }
    }
}

if (!function_exists('digibonsCount')) {
    function digibonsCount()
    {
        $digibons = [];

        $user = auth()->user();
        $digibon = $user->discounts()->get();
        $digibonsCount = count($user->discounts()->get());

        $usedCount = 0;
        $expiredCount = 0;
        $usableCount = 0;

        for ($i = 0; $i < $digibonsCount; $i++) {
            $initial = $user->discounts()->pluck('initial_credit')[$i];
            $used = $user->discounts()->pluck('used')[$i];
            $expired_at = $user->discounts()->pluck('expired_at')[$i];

            $credit = $initial - $used;
            if ($credit == 0) {
                $usedCount++;
            }

            if ($expired_at < now() && $credit != 0) {
                $expiredCount++;
            }

            if ($expired_at > now() && $credit != 0) {
                $usableCount++;
            }
        }

        $digibons['count'] = $digibonsCount;
        $digibons['used'] = $usedCount;
        $digibons['expired'] = $expiredCount;
        $digibons['usable'] = $usableCount;

        return $digibons;
    }

    if (!function_exists('digibonStatus')) {
        function digibonStatus($digibonID)
        {
            $digibon = \Modules\Discount\Entities\Discount::query()->find($digibonID);
            $initial = $digibon->initial_credit;
            $used = $digibon->used;
            $expired_at = $digibon->expired_at;
            $status = '';

            $credit = $initial - $used;
            if ($credit == 0) {
                $status = 'استفاده شده';
            }

            if ($expired_at < now() && $credit != 0) {
                $status = 'منقضی شده';
            }

            if ($expired_at > now() && $credit != 0) {
                $status = 'قابل استفاده';
            }

            return $status;
        }
    }

    if (!function_exists('checkCode')) {
        function checkCode($request)
        {
            $codeValidate = registerCode($request);

            if ($codeValidate == 'correct' || $codeValidate == 'exists') {
                $code = Discount::query()->whereCode($request->code)->first();
                $status = digibonStatus($code->id);
                $amount = $code->amount;
                session()->flash('discount-id', $code->id);
            } else {
                $status = 'نامعتبر';
                $amount = 0;
            }

            session()->flash('discount-amount', $amount);
            return ['status' => $status, 'amount' => $amount];
        }
    }
}
