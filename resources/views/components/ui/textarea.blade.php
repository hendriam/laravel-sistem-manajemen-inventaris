@props(['name',  'placeholder' => ''])

<textarea
    id="{{ $name }}"
    name="{{ $name }}"
    rows="4"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}
></textarea>