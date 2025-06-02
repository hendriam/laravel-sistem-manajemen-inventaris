@props(['data', 'columns', 'sortField' => null, 'sortDirection' => null])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($columns as $column)
                    <th scope="col" wire:click="sortBy('{{ $column['field'] }}')"
                        class="px-4 py-3 cursor-pointer hover:text-blue-500">
                        {{ $column['label'] }}
                        @if($column['field'] === $sortField)
                            @if($sortDirection === 'asc')
                                ↑
                            @else
                                ↓
                            @endif
                        @endif
                    </th>
                @endforeach
                <th class="px-4 py-3 text-gray-700 w-32">Aksi</th>
            </tr>
        </thead>
        <tbody>
           {{ $slot }}
        </tbody>
    </table>
</div>
