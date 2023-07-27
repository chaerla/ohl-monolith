@extends('layouts.base')

@section('body')
    <div class="parent relative bg-gradient-to-r from-indigo-200 via-yellow-100 to-white flex min-h-screen">
        @include('layouts.partials.header')
        <div class="lg:px-40 md:px-10 py-20 min-h-screen w-screen">
            @yield('page-content')
        </div>
    </div>
@endsection
