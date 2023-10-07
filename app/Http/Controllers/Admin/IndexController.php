<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $dates = [];
        $orderStat = [];
        $memberStat = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;
            $orderStat[$date] = 0;
            $memberStat[$date] = 0;
        }

        $orders = Order::query()
            ->whereBetween('created_at', [$dates[0], $dates[count($dates) - 1] . ' 23:59:59'])
            ->pluck('created_at');

        foreach ($orders as $order) {
            $createdAt = Carbon::parse($order)->format('Y-m-d');
            if (isset($orderStat[$createdAt])) {
                $orderStat[$createdAt]++;
            } else {
                $orderStat[$createdAt] = 1;
            }
        }

        $members = User::query()
            ->whereBetween('created_at', [$dates[0], $dates[count($dates) - 1] . ' 23:59:59'])
            ->pluck('created_at');

        foreach ($members as $member) {
            $createdAt = Carbon::parse($member)->format('Y-m-d');
            if (isset($memberStat[$createdAt])) {
                $memberStat[$createdAt]++;
            } else {
                $memberStat[$createdAt] = 1;
            }
        }

        return view('admin.index', compact(['dates', 'orderStat', 'memberStat']));
    }
}
