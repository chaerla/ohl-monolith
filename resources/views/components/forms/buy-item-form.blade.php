@php
    $id_mod = $data['id'] % 3;
    switch ($id_mod) {
        case 1:
            $badge_color = 'bg-yellow-200 text-yellow-600';
            break;
        case 2:
            $badge_color = 'bg-green-200 text-green-600';
            break;
        default:
            $badge_color = 'bg-red-200 text-red-600';
            break;
    }
@endphp

<div class="flex items-center h-full w-full">
    <div class="bg-white rounded-lg p-10 w-5/6 mx-auto">
        <form id="buy-item-form">
            @csrf
            <h2 class="text-2xl font-bold text-gray-700">{{ $data['nama'] }}</h2>
            <div class="text-gray-400">
                <p> <i class="fa fa-store"></i> </i> Stok: {{ $data['stok'] }}</p>
                <p> <i class="fa fa-tag"></i> {{ \App\Utils\Util::formatCurrency($data['harga']) }}</p>
                <div class="{{ $badge_color . ' inline-block px-2 py-1 rounded my-2' }}">
                    {{ '#' . $data['kode'] }}
                </div>
                @if ($data['stok'] == 0)
                    <div class="bg-red-100 inline-block px-2 py-1 rounded my-2 text-red-700">
                        Stok Habis
                    </div>
                @endif
            </div>
            <div class="w-full flex lg:justify-end sm:justify-center mt-8">
                <div class="flex flex-col space-y-4 lg:items-end sm:items-center">
                    <div class="flex space-x-2 items-center align-right">
                        <p class="font-semibold">Jumlah:</p>
                        <input {{ $data['stok'] == 0 ? 'disabled' : '' }} required type="number" name="quantity"
                            class="bg-gray-100 focus:outline-none borderbg-gray-100 shadow-sm rounded-md focus:ring focus:ring-indigo-400 p-2 min-w-[150px]"
                            min="0" max="{{ $data['stok'] }}" />
                        <input type="hidden" name="item_id" value="{{ $data['id'] }}" />
                    </div>
                    <button {{ $data['stok'] == 0 ? 'disabled' : '' }} type="submit"
                        class="align-right bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline {{ $data['stok'] == 0 ? 'cursor-not-allowed' : '' }}">Beli</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    @include('scripts.buy-item')
@endpush
