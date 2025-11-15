@extends('layouts.app')

@section('title')
    Доставка - Екочистка одягу та домашнього текстилю
@endsection

@section('content')
    {{-- Hero Section --}}
    <div class="container mx-auto px-4 mb-20">
        <div class="flex flex-col-reverse lg:flex-row gap-12 items-center">
            {{-- Content --}}
            <div class="space-y-8 text-center lg:text-left flex-1">
                {{-- Badge --}}
                <div class="inline-flex items-center px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-medium">
                    <i class="fas fa-shipping-fast mr-2"></i>
                    Швидка доставка
                </div>
                
                {{-- Main Title --}}
                <div class="space-y-6">
                    <h1 class="text-4xl lg:text-6xl font-bold leading-tight text-gray-900">
                        <span class="text-primary">Доставка</span> одягу
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                        Швидка та надійна доставка ваших речей прямо до дверей. 
                    </p>
                </div>
                
                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <button class="gradient-button text-white px-8 py-4 rounded-2xl font-semibold text-lg transition-all duration-300 shadow-lg hover:shadow-2xl modal_fade" data-modal="feedbackmd">
                        <i class="fas fa-phone mr-2"></i>
                        Замовити доставку
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Delivery Info --}}
    @include('includes.elements.delivery-box')

    {{-- Courier Form --}}
    @include('includes.elements.courier_form-box')
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/price_slide.js') }}"></script>
@endsection
