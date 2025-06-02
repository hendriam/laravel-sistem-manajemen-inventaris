<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Permission</h2>

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
                <x-ui.input-search type="text" name="search" id="search" value placeholder="Cari nama role.." />
            </div>
            <a href="{{ route('permissions.create') }}">
                <x-ui.button
                    type="button"
                    class="flex items-center justify-center px-4 py-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                >
                    <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                    </svg>
                    Tambah Permission
                </x-ui.button>
            </a>
        </div>
        <x-ui.table :data="$permissions" :columns="[
            ['label' => 'Nama Permission', 'field' => 'name'],
            ['label' => 'Keterangan', 'field' => 'description'],
            ['label' => 'Dibuat', 'field' => 'created_at']
            ]" :sortField="$sortField" :sortDirection="$sortDirection"
        >
            @foreach($permissions as $permission)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th class="px-4 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $permission->name }}</th>
                    <td class="px-4 py-1 ">{{ $permission->description ?? '-' }}</td>
                    <td class="px-4 py-1 ">{{ $permission->created_at->format('d-m-Y') }}</td>
                    <td class="px-4 py-1 ">
                        <x-ui.button-actions 
                            :urlAction="route('permissions.edit', $permission->id)"
                            :editAction="'edit(' . $permission->id . ')'"
                            :deleteAction="'delete(' . $permission->id . ')'"
                        />    
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <div class="mt-4 flex justify-between items-center">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">1000</span>
            </span>
            <x-ui.pagination :paginator="$permissions" />
        </div>
    </x-ui.card>
</div>