@props(['paginator'])

@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation">
    <ul class="inline-flex -space-x-px">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <span class="flex items-center justify-center px-3 h-8 ms-0 text-gray-400 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                    Previous
                </span>
            </li>
        @else
            <li>
                <button
                    wire:click="previousPage"
                    class="flex items-center justify-center px-3 h-8 ms-0 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 cursor-pointer"
                >
                    Previous
                </button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <li>
                    <span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 cursor-pointer">
                        {{ $page }}
                    </span>
                </li>
            @else
                <li>
                    <button
                        wire:click="gotoPage({{ $page }})"
                        class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 cursor-pointer"
                    >
                        {{ $page }}
                    </button>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button
                    wire:click="nextPage"
                    class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 cursor-pointer"
                >
                    Next
                </button>
            </li>
        @else
            <li>
                <span class="flex items-center justify-center px-3 h-8 text-gray-400 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
                    Next
                </span>
            </li>
        @endif

    </ul>
</nav>
@endif
