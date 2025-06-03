@props(['type' => 'text', 'name', 'value' => '', 'placeholder' => ''])

<input 
    type="{{ $type }}" 
    name="{{ $name }}" 
    id="{{ $name }}" 
    value="{{ old($name, $value) }}" 
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'text-sm border rounded-lg block border-gray-300 bg-gray-50 text-gray-900 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
/>
