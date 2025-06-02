<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Role</h2>

    <x-ui.card>
        <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-between">
            <h2 class=" text-xl font-bold text-gray-900 dark:text-white">Assign Permission ke Role: {{ $role->name }}</h2>
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

        <form wire:submit.prevent="save" class="space-y-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($permissions as $permission)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->id }}" class="text-blue-600 rounded">
                        <span>{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>
    
            <x-ui.button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" wire:loading.attr="disabled">
                <span wire:loading.remove>Assign</span>
                <span wire:loading>Processing...</span>
            </x-ui.button>
        </form>

    </x-ui.card>

    @if (session('success'))
        <x-ui.alert class="text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <span class="sr-only">Info</span>
            <div>
                <span class="ms-3 text-sm font-medium">Success! </span> {{ session('success') }}
            </div>
        </x-ui.alert>
    @endif
</div>
