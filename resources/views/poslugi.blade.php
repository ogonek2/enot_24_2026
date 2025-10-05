@extends('layouts.app')

@section('title')
    Послуги та ціни - Екочистка одягу та домашнього текстилю
@endsection

@section('content')
    {{-- Promotions Banner --}}
    {{-- @include('includes.elements.promotions-banner') --}}

    {{-- Price Section --}}
    @include('includes.elements.price-box')

    {{-- Consultation Section --}}
    @include('includes.elements.consultation')

    {{-- Services Navigation --}}
    @include('includes.elements.header-2-box')

    {{-- Delivery Section --}}
    @include('includes.elements.delivery-box')

    {{-- Courier Form --}}
    @include('includes.elements.courier_form-box')
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/price_slide.js') }}"></script>
@endsection