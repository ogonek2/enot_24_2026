@extends('layouts.app')

@section('title')
    Акції - Єнот 24 / Знижка на послуги з хімчистки. Актуальні акції
@endsection

@section('content')
    <div class="pb-8 md:pb-12">
        <div class="container mx-auto px-4 md:px-6">
            {{-- Page Header --}}
            <div class="mb-8 md:mb-12 text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                    Акції та спеціальні пропозиції
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                    Не пропустіть вигідні акції та знижки від ЄНОТ 24
                </p>
            </div>

            {{-- Promotions Grid --}}
            @if($promotions->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($promotions as $promotion)
                        <a href="{{ route('promotion_page', $promotion->id) }}" 
                           class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            {{-- Promotion Image --}}
                            @if($promotion->banner)
                                <div class="relative h-48 md:h-64 overflow-hidden">
                                    <img src="{{ asset('storage/' . $promotion->banner) }}" 
                                         alt="{{ $promotion->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                    <div class="absolute top-4 right-4">
                                        <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            Акція
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="relative h-48 md:h-64 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                    <i class="fas fa-gift text-6xl md:text-8xl text-primary/30"></i>
                                    <div class="absolute top-4 right-4">
                                        <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            Акція
                                        </span>
                                    </div>
                                </div>
                            @endif

                            {{-- Promotion Content --}}
                            <div class="p-6 md:p-8">
                                <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-300">
                                    {{ $promotion->name }}
                                </h3>
                                
                                @if($promotion->discount_action)
                                    <p class="text-gray-600 mb-4 line-clamp-3">
                                        {{ Str::limit($promotion->discount_action, 120) }}
                                    </p>
                                @endif

                                @if($promotion->locations)
                                    <div class="mb-4">
                                        <p class="text-sm font-semibold text-gray-700 mb-2">Локації:</p>
                                        <p class="text-sm text-gray-600">{{ $promotion->locations }}</p>
                                    </div>
                                @endif

                                {{-- Read More Button --}}
                                <div class="flex items-center gap-2 text-primary font-semibold group-hover:gap-4 transition-all duration-300">
                                    <span>Детальніше</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                {{-- No Promotions --}}
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-gift text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">
                        Наразі акцій немає
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Запрошуємо вас переглянути наші послуги та ціни
                    </p>
                    <a href="{{ route('services') }}" 
                       class="inline-block bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-xl font-semibold hover:from-primary/90 hover:to-secondary/90 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Переглянути послуги
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
