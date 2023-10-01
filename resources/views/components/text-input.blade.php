@props(['disabled' => false])

{{--Deleted Classes : focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 /
Added Classes : focus:ring-red-500--}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-red-500 rounded-md shadow-sm']) !!}>
