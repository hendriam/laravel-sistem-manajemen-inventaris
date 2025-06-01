@props(['type' => 'submit'])

<button 
	type="{{ $type }}" 
	{{ $attributes->merge(['class' => 'text-sm font-medium text-white rounded-lg hover:cursor-pointer focus:outline-none focus:ring-4']) }}
>
	{{ $slot }}
</button>
