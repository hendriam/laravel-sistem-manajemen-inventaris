<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen User</h2>

    <x-ui.card>
        <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-between">
            <h2 class=" text-xl font-bold text-gray-900 dark:text-white">Tambah user baru</h2>
            <a href="{{ route('users.index') }}">
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
                <x-ui.label for="username">Nama User</x-ui.label>
                <x-ui.input type="text" name="name" id="name" wire:model.defer="name" class="w-full" placeholder="John Doe" required="" />
                @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>
            <div class="w-full lg:w-2xl">
                <x-ui.label for="username">Username</x-ui.label>
                <x-ui.input type="text" name="username" id="username" wire:model.defer="username" class="w-full" placeholder="johndoe123" required="" />
                @error('username')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>
            <div class="w-full lg:w-2xl">
                <x-ui.label for="password">Password (Opsional)</x-ui.label>
                <x-ui.input type="password" name="password" id="password" wire:model.defer="password" class="w-full" placeholder="••••••••" required="" />
                @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>
            <div class="w-full lg:w-2xl">
                <x-ui.label for="password_confirmation">Konfirmasi Password</x-ui.label>
                <x-ui.input type="password" name="password_confirmation" id="password_confirmation" wire:model.defer="password_confirmation" class="w-full" placeholder="••••••••" required="" />
                @error('password_confirmation')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>
            <div class="w-full lg:w-2xl">
                <x-ui.label for="role_id">Role</x-ui.label>
                <select
                        id="role_id"
                        name="role_id"
                        wire:model.defer="role_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    >
                        <option selected="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                </select>
                @error('role_id')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>

            <div class="w-sm">
                <x-ui.button type="submit" wire:loading.attr="disabled" wire:target="save,update" class="flex items-center justify-center px-4 py-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <span wire:loading wire:target="save,update">
                        <svg aria-hidden="true" role="status" class="inline w-6 h-6 mr-1 text-white animate-spin" viewBox="0 0 100 101" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                    </span>

                    <span wire:loading.remove wire:target="save,update">
                        <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm10 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7V5h8v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                                    
                    Simpan
                </x-ui.button>
            </div>
        </form>

    </x-ui.card>
</div>