<div class="space-y-4">
    <h2 class="text-xl font-bold">Profil User</h2>
    
    <x-ui.card>
        <h2 class=" text-md font-bold text-gray-900 dark:text-white">Profile Saya</h2>
        <div class="mt-5 flex space-x-3 items-center">
            <img class="w-23 h-23 rounded-md" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="user photo" />
            <div>
                <h3 class="text-2xl font-semibold">{{ auth()->user()->name }}<h3>
                <span class="text-xl text-gray-600">{{ auth()->user()->role->name }}</span>
            </div>
        
        </div>

        <x-ui.hr />

        <a href="{{ route('profile.edit') }}">
            <x-ui.button
                type="button"
                class="flex items-center justify-center px-3 py-2 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
            >
                 <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
            </svg>
                Edit 
            </x-ui.button>
        </a>
        
    </x-ui.card>
</div>