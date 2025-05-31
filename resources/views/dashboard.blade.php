<x-layouts.app :title="__('Dashboard')">
	<x-ui.card>
		<form wire:submit.prevent="simpan">
			<x-ui.label for="email">Your Email</x.ui.label>
            <x-ui.input type="email" name="email" id="email" wire:model="nama" placeholder="youremail@gmail.com" />
            <x-ui.button>Simpan</x-ui.button>
            <x-ui.button>Button</x-ui.button>
		<h1>Welcome</h1>
	</x-ui.card>
</x-layouts.app>