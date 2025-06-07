<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Barang Masuk</h2>

    <x-ui.card>
        <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-between">
            <h2 class=" text-lg font-semibold text-gray-900 dark:text-white">Detail transaksi : {{ $transaction->reference }}</h2>
            <a href="{{ route('transaction-in.index') }}">
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

        <div class="flex">
            <div class="min-w-sm">
                <div><strong>Tanggal Transaksi : </strong> {{ $transaction->transacted_at }}</div>
                <div><strong>Kode Transaksi : </strong> {{ $transaction->reference }}</div>
                <div><strong>Keterangan : </strong> {{ $transaction->description ?? '-' }}</div>
                <div><strong>Dibuat Oleh : </strong> {{ $transaction->createdBy->name ?? '-' }}</div>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Barang</th>
                        <th scope="col" class="px-4 py-3">Jumlah</th>
                        <th scope="col" class="px-4 py-3">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaction->details as $detail)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $detail->inventory->name ?? '-' }}</th>
                            <td class="px-4 py-2">{{ $detail->quantity }}</td>
                            <td class="px-4 py-2">{{ $detail->note ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">Tidak ada detail barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>
</div>
