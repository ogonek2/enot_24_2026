@extends('layouts.app')

@section('title')
    Екочистка одягу та домашнього текстилю
@endsection

@section('content')
    {{-- Hero Section with Background Image --}}
    <div class="relative flex items-center py-20 overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('storage/source/head.png') }}');">
            <div class="absolute inset-0 bg-black/30"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-12 items-end">
                {{-- Left Side - White Box with Content --}}
                <div class="space-y-4 lg:space-y-8">
                    {{-- White Content Box --}}
                    <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-4 lg:p-8 shadow-2xl">
                        <div class="space-y-6">
                            {{-- Main Title --}}
                            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-6xl font-roboto font-bold leading-tight text-gray-900" style="color: #111827;">
                                ЧИСТКА ОДЯГУ
                            </h1>

                            {{-- Description --}}
                            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed">
                                Професійна екочистка одягу та домашнього текстилю з кур'єрською доставкою. Швидко, зручно,
                                якісно!
                            </p>

                            {{-- CTA Buttons --}}
                            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                                <button
                                    class="gradient-button text-white px-4 sm:px-6 lg:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-semibold text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:shadow-2xl modal_fade"
                                    data-modal="feedbackmd">
                                    <i class="fas fa-phone mr-2"></i>
                                    Замовити зараз
                                </button>
                                <a href="#prices"
                                    class="text-custom-purple text-center border-2 border-custom-purple px-4 sm:px-6 lg:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-semibold text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg hover:bg-custom-purple hover:text-white">
                                    <i class="fas fa-list mr-2"></i>
                                    Наші послуги
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Benefits Block on Blurred Background --}}
                    <div class="relative">
                        <div class="absolute inset-0 bg-white/20 backdrop-blur-md rounded-2xl"></div>
                        <div class="relative z-10 p-3 sm:p-4 lg:p-6">
                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                                {{-- Benefit 1 --}}
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-white/90 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-2 sm:mb-3 shadow-lg">
                                        <i class="fas fa-truck text-primary text-sm sm:text-base lg:text-xl"></i>
                                    </div>
                                    <div class="text-sm sm:text-base lg:text-xl font-bold text-white">300 грн</div>
                                    <div class="text-xs sm:text-sm text-white/90">Кур'єрська доставка</div>
                                </div>

                                {{-- Benefit 2 --}}
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-white/90 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-2 sm:mb-3 shadow-lg">
                                        <i class="fas fa-phone text-primary text-sm sm:text-base lg:text-xl"></i>
                                    </div>
                                    <div class="text-sm sm:text-base lg:text-xl font-bold text-white">Без вихідних</div>
                                    <div class="text-xs sm:text-sm text-white/90">З 09:00 до 21:00</div>
                                </div>

                                {{-- Benefit 3 --}}
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-white/90 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-2 sm:mb-3 shadow-lg">
                                        <i class="fas fa-leaf text-primary text-sm sm:text-base lg:text-xl"></i>
                                    </div>
                                    <div class="text-sm sm:text-base lg:text-xl font-bold text-white">100%</div>
                                    <div class="text-xs sm:text-sm text-white/90">Екологічно - Безпечно</div>
                                </div>

                                {{-- Benefit 4 --}}
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-white/90 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-2 sm:mb-3 shadow-lg">
                                        <i class="fas fa-clock text-primary text-sm sm:text-base lg:text-xl"></i>
                                    </div>
                                    <div class="text-sm sm:text-base lg:text-xl font-bold text-white">48 год</div>
                                    <div class="text-xs sm:text-sm text-white/90">Швидке виконання</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Reviews Slider --}}
                @include('includes.elements.reviews-slider')
            </div>
        </div>
    </div>
    {{-- Services Navigation --}}
    @include('includes.elements.header-2-box')

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
        $(document).ready(function() {
            // Add floating animation to benefits
            $('.grid.grid-cols-2.lg\\:grid-cols-4 > div').each(function(index) {
                $(this).css('animation-delay', (index * 0.2) + 's');
                $(this).addClass('animate-fade-in-up');
            });
        });
    </script>
@endsection
