@extends('layouts.page')
@section('page-content')
    <div class="bg-white rounded-lg lg:p-10 md:p-4 lg:w-[600px] md:w-2/3 mx-auto my-10">
        <h1 class="text-3xl font-bold mb-6">Riwayat Belanja </h1>
        <div id="invoices-container">
        </div>
    </div>
@endsection

@push('scripts')
    @include('scripts.purchase-history')
@endpush
