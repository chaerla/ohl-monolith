@php
    $id_mod = $id % 3;
    switch ($id_mod) {
        case 1:
            $badge_color = 'bg-yellow-200 text-yellow-600';
            break;
        case 2:
            $badge_color = 'bg-green-200 text-green-600';
            break;
        default:
            $badge_color = 'bg-blue-200 text-blue-600';
            break;
    }
@endphp

<div class="flex flex-col bg-white p-8 rounded-xl shadow-md hover:shadow-indigo-300">
    <div class="mb-4 space-y-2">
        <h2 class="text-2xl font-bold text-gray-700">{{ $nama }}</h2>
        <div class="text-gray-400">
            <p> <i class="fa fa-store"></i> </i> Stok: {{ $stok }}</p>
            <p> <i class="fa fa-tag"></i> {{ \App\Utils\Util::formatCurrency($harga) }}</p>
            <div class="{{ $badge_color . ' inline-block px-2 py-1 rounded my-2' }}">
                {{ '#' . $kode }}
            </div>
            @if ($stok == 0)
                <div class="bg-red-100 inline-block px-2 py-1 rounded my-2 text-red-700">
                    Stok Habis
                </div>
            @endif
        </div>
    </div>
    <div class="w-full flex justify-end">
        <a href="{{ route('item', $id) }}">
            <button
                class="bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                Lihat
            </button>
        </a>
    </div>
</div>
