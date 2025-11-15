@extends('layouts.app')

@section('title')
    {{ $service->name }} - {{ $service->title ?? 'Послуга хімчистки' }} - Екочистка одягу та домашнього текстилю
@endsection

@section('meta')
    @if($service->seo_description)
        <meta name="description" content="{{ $service->seo_description }}">
    @endif
    @if($service->seo_keywords)
        <meta name="keywords" content="{{ $service->seo_keywords }}">
    @endif
@endsection

@section('content')
    <div class="pb-8 md:pb-12">
        <div class="container mx-auto px-4 md:px-6">
            {{-- Breadcrumbs --}}
            <div class="mb-6">
                <nav class="flex items-center space-x-2 text-sm text-gray-600">
                    <a href="{{ route('welcome') }}" class="hover:text-primary transition-colors duration-300">
                        Головна
                    </a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <a href="{{ route('services') }}" class="hover:text-primary transition-colors duration-300">
                        Послуги та ціни
                    </a>
                    @if($primaryCategory)
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <a href="{{ route('category_page', $primaryCategory->href) }}" class="hover:text-primary transition-colors duration-300">
                            {{ $primaryCategory->name }}
                        </a>
                    @endif
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <span class="text-gray-900 font-semibold">{{ $service->name }}</span>
                </nav>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    {{-- Service Header --}}
                    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-6">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex-1">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                    {{ $service->name }}
                                </h1>
                                @if($service->title)
                                    <p class="text-xl text-gray-600 mb-4">
                                        {{ $service->title }}
                                    </p>
                                @endif
                                
                                {{-- Categories --}}
                                @if($service->categories && $service->categories->count() > 0)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach($service->categories as $cat)
                                            <a href="{{ route('category_page', $cat->href) }}" 
                                               class="inline-flex items-center gap-2 bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-semibold hover:bg-primary/20 transition-colors duration-300">
                                                @if($cat->category_img)
                                                    <img src="{{ asset('storage/' . $cat->category_img) }}" 
                                                         alt="{{ $cat->name }}" 
                                                         class="w-5 h-5 rounded-full object-cover">
                                                @endif
                                                <span>{{ $cat->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Prices --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            @php
                                $originalPrice = floatval($service->price ?? 0);
                                $hasPrice = $originalPrice > 0;
                                $discountedPrice = $originalPrice;
                                $hasDiscount = false;
                                
                                // Проверяем скидку на категорию
                                if ($hasPrice && $primaryCategory && $primaryCategory->hasActiveDiscount()) {
                                    $discountedPrice = floatval($primaryCategory->calculateDiscountedPrice($originalPrice));
                                    $hasDiscount = true;
                                }
                            @endphp
                            
                            @if($hasPrice)
                                <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl p-6 border border-primary/20">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-gray-600 font-semibold">Потокова ціна</span>
                                        @if($hasDiscount && $primaryCategory)
                                            <span class="text-xs bg-green-500 text-white px-2 py-1 rounded-full font-semibold">
                                                -{{ $primaryCategory->getDiscountPercent() }}%
                                            </span>
                                        @endif
                                    </div>
                                    @if($hasDiscount)
                                        <div class="space-y-1">
                                            <div class="text-3xl font-bold text-primary">
                                                {{ number_format($discountedPrice, 0, ',', ' ') }} ₴
                                            </div>
                                            <div class="text-lg text-gray-400 line-through">
                                                {{ number_format($originalPrice, 0, ',', ' ') }} ₴
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-3xl font-bold text-primary">
                                            {{ number_format($originalPrice, 0, ',', ' ') }} ₴
                                        </div>
                                    @endif
                                    <p class="text-sm text-gray-500 mt-2">за одиницю</p>
                                </div>
                            @endif
                            
                            @if($service->individual_price && $service->individual_price > 0)
                                <div class="bg-gradient-to-br from-secondary/10 to-secondary/5 rounded-xl p-6 border border-secondary/20">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-gray-600 font-semibold">Індивідуальна ціна</span>
                                    </div>
                                    <div class="text-3xl font-bold text-secondary">
                                        {{ number_format($service->individual_price, 0, ',', ' ') }} ₴
                                    </div>
                                    <p class="text-sm text-gray-500 mt-2">за одиницю</p>
                                </div>
                            @endif
                            
                            @if(!$hasPrice && !($service->individual_price && $service->individual_price > 0))
                                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                                    <div class="text-gray-600 font-semibold mb-2">Ціна</div>
                                    <div class="text-xl text-gray-500">Ціна за запитом</div>
                                    <p class="text-sm text-gray-500 mt-2">Зв'яжіться з нами для уточнення</p>
                                </div>
                            @endif
                        </div>

                        {{-- Add to Cart Button --}}
                        @if($hasPrice)
                            <div class="mb-6">
                                @php
                                    $finalPrice = $hasDiscount ? $discountedPrice : $originalPrice;
                                @endphp
                                @include('components.add-to-cart-button', [
                                    'serviceId' => $service->id,
                                    'serviceName' => $service->name,
                                    'hasIndividual' => ($service->individual_price ?? 0) > 0,
                                    'price' => $finalPrice,
                                    'individualPrice' => $service->individual_price ?? 0
                                ])
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    @if($service->description)
                        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Опис послуги</h2>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                {!! nl2br(e($service->description)) !!}
                            </div>
                        </div>
                    @endif

                    {{-- Additional Info --}}
                    @if($service->value)
                        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Додаткова інформація</h2>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                {!! nl2br(e($service->value)) !!}
                            </div>
                        </div>
                    @endif

                    {{-- Article --}}
                    @if($service->article)
                        <div class="bg-gray-50 rounded-xl p-4 mb-6">
                            <span class="text-sm text-gray-600">Артикул: </span>
                            <span class="text-sm font-semibold text-gray-900">{{ $service->article }}</span>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1">
                    {{-- Other Services from Same Category --}}
                    @if($otherServices->count() > 0)
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Інші послуги</h3>
                            <div class="space-y-4">
                                @foreach($otherServices as $otherService)
                                    <a href="{{ route('service_page', $otherService->transform_url ?? $otherService->href) }}" 
                                       class="block p-4 bg-gray-50 rounded-xl hover:bg-primary/5 transition-colors duration-300 group">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-primary transition-colors duration-300 mb-2">
                                            {{ $otherService->name }}
                                        </h4>
                                        @if($otherService->price && $otherService->price > 0)
                                            <p class="text-sm text-primary font-bold">
                                                {{ number_format($otherService->price, 0, ',', ' ') }} ₴
                                            </p>
                                        @else
                                            <p class="text-sm text-gray-500">Ціна за запитом</p>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Other Categories --}}
                    @if($otherCategories->count() > 0)
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Інші категорії</h3>
                            <div class="space-y-3">
                                @foreach($otherCategories as $otherCategory)
                                    <a href="{{ route('category_page', $otherCategory->href) }}" 
                                       class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/5 transition-colors duration-300 group">
                                        @if($otherCategory->category_img)
                                            <img src="{{ asset('storage/' . $otherCategory->category_img) }}" 
                                                 alt="{{ $otherCategory->name }}" 
                                                 class="w-10 h-10 rounded-full object-cover">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                                <i class="fas fa-tag text-primary/50 text-sm"></i>
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-800 group-hover:text-primary transition-colors duration-300 text-sm">
                                                {{ $otherCategory->name }}
                                            </h4>
                                            <p class="text-xs text-gray-500">
                                                {{ $otherCategory->services->count() }} {{ $otherCategory->services->count() === 1 ? 'послуга' : 'послуг' }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- CTA --}}
                    <div class="bg-gradient-to-br from-primary to-secondary rounded-2xl p-6 text-white mt-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-phone text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Потрібна консультація?</h3>
                            <p class="text-sm text-white/90 mb-4">
                                Зв'яжіться з нами для отримання додаткової інформації
                            </p>
                            <button class="bg-white text-primary hover:bg-gray-100 px-6 py-3 rounded-xl font-semibold transition-colors duration-300 w-full modal_fade"
                                    data-modal="feedbackmd">
                                Зв'язатися з нами
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

