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
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
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
                <x-ui.button type="submit" class="px-4 py-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Simpan
                </x-ui.button>
            </div>
        </form>
    </x-ui.card>
</div>