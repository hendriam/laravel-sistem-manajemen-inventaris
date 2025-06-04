<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Lokasi</h2>

    <x-ui.card>
        @if (session('success'))
        <x-ui.alert class="text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <span class="sr-only">Info</span>
            <div>
                <span class="ms-3 text-sm font-medium">Success! </span> {{ session('success') }}
            </div>
        </x-ui.alert>
        @endif

        <div class="mb-4 flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-between">
            <div class="w-full md:w-1/2">
                <x-ui.input-search placeholder="Cari nama lokasi..." />
            </div>

			@hasPermission('create-location')
            <a href="{{ route('locations.create') }}">
                <x-ui.button
                    type="button"
                    class="flex items-center justify-center px-4 py-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                >
                    <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                    </svg>
                    Tambah Lokasi
                </x-ui.button>
            </a>
			@endhasPermission

        </div>

        <x-ui.table :data="$locations" :columns="[
            ['label' => 'Nama Lokasi', 'field' => 'name'],
            ['label' => 'Keterangan', 'field' => 'description'],
            ['label' => 'Dibuat', 'field' => 'created_at']
            ]" :sortField="$sortField" :sortDirection="$sortDirection"
        >
            @foreach($locations as $location)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $location->name }}</th>
                    <td class="px-4 py-2 ">{{ $location->description ?? '-' }}</td>
                    <td class="px-4 py-2 ">{{ $location->created_at->format('d-m-Y') }}</td>
                    <td class="px-4 py-2 ">
                        <x-ui.button-actions 
                            :urlAction="route('locations.edit', $location->id)"
                            :editAction="'edit(' . $location->id . ')'"
                            :deleteAction="'delete(' . $location->id . ')'"
                        />    
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <div class="mt-4 flex justify-between items-center">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->firstItem() }} - {{ $locations->lastItem() }}</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->total() }}</span>
            </span>
            <x-ui.pagination :paginator="$locations" />
        </div>
    </x-ui.card>
</div>