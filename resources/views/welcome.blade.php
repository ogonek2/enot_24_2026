@extends('layouts.app')

@section('title')
    Хімчистка одягу та домашнього текстилю
@endsection

@section('content')
    {{-- Hero Section with Background Image --}}
    <div class="relative flex items-center overflow-hidden">
        <div class="container mx-auto relative z-10">
            <div class="flex flex-col justify-center items-center">
                {{-- Left Side - White Box with Content --}}
                <div class="w-full">
                    {{-- White Content Box --}}
                    <div class="bg-white flex align-stretch h-full rounded-2xl py-6 px-8 relative min-h-96 overflow-hidden">
                        <div class="h-100 flex flex-col justify-between gap-2 relative" style="z-index: 100;">
                            <div>
                                <ul class="flex items-center gap-2">
                                    <li>
                                        <a href="https://t.me/enot24ServiceBot" target="_blank" class="text-2xl hover:text-primary">
                                            <i class="fab fa-telegram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/enot24cleaner" target="_blank" class="text-2xl hover:text-primary">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="space-y-6">
                                {{-- Main Title --}}
                                <div>
                                    <h1 class="text-4xl font-sans leading-tight text-gray-900" style="color: #111827;">
                                        <b>хімчистка</b> одягу
                                    </h1>
                                    <div class="flex items-center gap-2">
                                        <span class="text-6xl font-bold leading-tight text-primary">
                                            ЄНОТ
                                        </span>
                                        <span class="text-4xl py-2 px-4 bg-primary text-white rounded-full">
                                            24
                                        </span>
                                    </div>
                                </div>

                                {{-- CTA Buttons --}}
                                <div class="flex flex-col sm:flex-row gap-3 sm:gap-2">
                                    <button
                                        class="bg-gradient-primary text-white px-4 sm:px-6 lg:px-8 py-4 rounded-full font-sans text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg modal_fade"
                                        data-modal="feedbackmd">
                                        <i class="fas fa-cart-plus mr-2"></i>
                                        Замовити хімчистку
                                    </button>
                                    <a href="{{ route('services') }}"
                                        class="text-custom-purple text-center border-2 border-custom-purple px-4 sm:px-6 lg:px-8 py-3 sm:py-4 rounded-full font-sans text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:bg-custom-purple hover:text-white">
                                        <i class="fas fa-list mr-2"></i>
                                        Послуги та ціни
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 top-0 right-[0%] w-100 h-100 hidden lg:block" style="z-index: 10;">
                            <img src="{{ asset('storage/src/banner_lines.svg') }}" alt="enot 24 banner lines" class="w-100 h-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Services Navigation --}}
    @include('includes.elements.header-3-box')

    {{-- Promotions Slider --}}
    @include('includes.elements.promotions-slider')

    {{-- Services Navigation --}}
    <!-- @include('includes.elements.header-2-box') -->

    {{-- Price Section --}}
    @include('includes.elements.price-box')

    {{-- Consultation Section --}}
    @include('includes.elements.consultation')

    {{-- Recommendations Section --}}
    @include('includes.elements.recomendations-box')

    {{-- Delivery Section --}}
    @include('includes.elements.delivery-box')

    {{-- Courier Form --}}
    @include('includes.elements.courier_form-box')
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/price_slide.js') }}"></script>
    <script>
        // Page-specific animations
        $(document).ready(function () {
            // Add floating animation to benefits
            $('.grid.grid-cols-2.lg\\:grid-cols-4 > div').each(function (index) {
                $(this).css('animation-delay', (index * 0.2) + 's');
                $(this).addClass('animate-fade-in-up');
            });
        });
    </script>
@endsection