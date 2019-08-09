@extends('layouts.app')
@section('content')
    @include('blocks.slideshow')
    @include('blocks.popular_categories')
    @include('blocks.recommended')
    @include('blocks.bestsellers')
    @include('blocks.news')
    @include('blocks.vendors')
@endsection
@push('scripts')
    @if(session()->has('message'))
        <script>
            swal('{{ session()->get('message') }}', '', "success");
        </script>
    @endif
@endpush
