<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Role</h2>

    <x-ui.card>
            <div class="mb-4 flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-between">
                <div class="w-full md:w-1/2">
                    <x-ui.input-search />
                </div>
                <a href="{{ route('roles.create') }}">
                    <x-ui.button
                        type="button"
                        class="flex items-center justify-center px-4 py-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    >
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Tambah Role
                    </x-ui.button>
                </a>
            </div>
            <x-ui.table :headers="['#', 'Nama Role', 'Keterangan']" :rows="$this->tableData" actions />
    </x-ui.card>
</div>