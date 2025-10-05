@extends('layouts.app')

@section('title')
    {{ $category->name ?? 'Категорія' }} - Екочистка одягу та домашнього текстилю
@endsection

@section('content')
    {{-- Price Section --}}
    @include('includes.elements.price-box')

    {{-- Consultation Section --}}
    @include('includes.elements.consultation')

    {{-- Services Navigation --}}
    @include('includes.elements.header-2-box')

    {{-- Courier Form --}}
    @include('includes.elements.courier_form-box')
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/price_slide.js') }}"></script>
@endsection