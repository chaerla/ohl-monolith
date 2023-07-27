@extends('layouts.page')
@section('page-content')
    @if ($data->isEmpty())
        <div class="w-full h-full lg:text-5xl md:text-3xl sm:text-2xl font-bold flex items-center justify-center">
            <h1>Belum ada barang :(</h1>
        </div>
    @else
        <div class="grid lg:grid-cols-3 gap-12 md:grid-cols-1 m-10">
            @foreach ($data as $item)
                @include('components.item-card', [
                    'id' => $item['id'],
                    'nama' => $item['nama'],
                    'harga' => $item['harga'],
                    'stok' => $item['stok'],
                    'kode' => $item['kode'],
                ])
            @endforeach
        </div>
        <div class="w-full flex justify-center mx-auto">
            {{ $data->links() }}
        </div>
    @endif
@endsection
