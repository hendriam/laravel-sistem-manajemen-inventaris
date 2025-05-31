	<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
		<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
			Change Password
		</h1>
		<form class="space-y-4 md:space-y-6" action="#">
			<div>
				<x-ui.label for="email">Your email</x-ui.label>
				<x-ui.input type="email" name="email" id="email" wire:model="nama" placeholder="name@company.com" required="" />
			</div>
			<div>
				<x-ui.label for="new_password">New Password</x-ui.label>
				<x-ui.input type="new_password" name="new_password" id="new_password" wire:model="nama" placeholder="••••••••" required="" />
			</div>
            <div>
				<x-ui.label for="confirm_password">Confirm Password</x-ui.label>
				<x-ui.input type="confirm_password" name="confirm_password" id="confirm_password" wire:model="nama" placeholder="••••••••" required="" />
			</div>
			<div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="newsletter" aria-describedby="newsletter" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                </div>
                <div class="ml-3 text-sm">
                    <label for="newsletter" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                </div>
            </div>
			<x-ui.button class="w-full">Sign in</x-ui.button>
			<p class="text-sm font-light text-gray-500 dark:text-gray-400">
				Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
			</p>
		</form>
	</div>