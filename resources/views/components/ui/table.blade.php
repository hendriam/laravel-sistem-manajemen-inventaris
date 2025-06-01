@props([
    'headers' => [],
    'rows' => [],
    'actions' => false,
])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="px-4 py-3">{{ $header }}</th>
                @endforeach
                @if ($actions)
                    <th class="px-4 py-3">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    @foreach ($row['data'] as $cell)
                        <td scope="row" class="px-4 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $cell }}</td>
                    @endforeach

                    @if ($actions)
                        <td class="px-4 py-1 max-w-[70px] ">
                            {!! $row['actions'] ?? '' !!}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
