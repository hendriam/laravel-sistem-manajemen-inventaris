<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Role</h2>

    <x-ui.card>
        <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-between">
            <h2 class=" text-xl font-bold text-gray-900 dark:text-white">Tambah role baru</h2>
            <a href="{{ route('roles.index') }}">
                <x-ui.button
                    type="button"
                    class="flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900"
                >
                <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                </svg>
                Kembali
                </x-ui.button>
            </a>
        </div>
        <x-ui.hr />
        <form wire:submit.prevent="save" class="grid gap-4">
            <div class="w-full lg:w-2xl">
                <x-ui.label for="username">Nama Role</x-ui.label>
                <x-ui.input type="text" name="name" id="name" wire:model="name" class="w-full" placeholder="Admin" required="" />
            </div>
            <div class="w-full lg:w-2xl">
                <x-ui.label for="description">Keterangan</x-ui.label>
                <textarea
                    id="description"
                    name="description"
                    wire:model="description" 
                    rows="8"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Your description here"
                ></textarea>
            </div>
            <div class="w-sm">
                <x-ui.button type="submit" class="flex items-center justify-center px-4 py-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    
                <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm10 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7V5h8v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                </svg>
                Simpan
                </x-ui.button>
            </div>
        </form>
    </x-ui.card>
</div>