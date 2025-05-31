<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Sign in to your account
    </h1>
    <form class="space-y-4 md:space-y-6" action="#">
        <div>
            <x-ui.label for="username">Username</x-ui.label>
            <x-ui.input type="text" name="username" id="username" wire:model="username" placeholder="johndoe" required="" />
        </div>
        <div>
            <x-ui.label for="password">Password</x-ui.label>
            <x-ui.input type="password" name="password" id="password" wire:model="password" placeholder="••••••••" required="" />
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                </div>
            </div>
            @if (Route::has('forgot-password'))
                <a href="{{ route('forgot-password') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
            @endif
        </div>
        <x-ui.button class="w-full">Sign in</x-ui.button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
        </p>
    </form>
</div>
