@extends('layouts.app')

@section('title')
    Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві
@endsection
@section('seo_tags')
    <meta property="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">

    <meta property="og:description"
        content="Замовити послугу прання/хімчистки килимів та одягу Ви можете в компанії Єнот-24. Краща якість хімчистки. Безпечна хімія. Найкоротші терміни. Замовляйте просто зараз!">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('storage/src/logo/enot-white-bg.png') }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    <!-- Локалізація та адреса -->
    <meta name="geo.position" content="50.4501;30.5234">
    <meta name="geo.region" content="UA-30">
    <meta name="geo.placename" content="Київ, Україна">
    <meta name="DC.title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="DC.description" content="Замовити послугу прання/хімчистки килимів та одягу Ви можете в компанії Єнот-24. Краща якість хімчистки. Безпечна хімія. Найкоротші терміни. Замовляйте просто зараз!">
    <meta name="DC.subject" content="Прання, хімчистка, Київ, Єнот-24, чистка килимів, одяг">
    
    <!-- Оптимізація для пошукових систем -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://enot-24.com.ua/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta property="og:description" content="Якісні послуги прання та хімчистки в Києві. Звертайтеся до Єнот-24 для чистоти, яку ви заслуговуєте!">
    <meta property="og:url" content="https://enot-24.com.ua/">
    
    <!-- Додаткові метатеги для SEO -->
    <meta name="city" content="Київ">
    <meta name="coverage" content="Київ, Україна">
    <meta name="revisit-after" content="3 days">
    <meta name="author" content="Єнот-24">
    <meta name="rating" content="general">
    
    <!-- Контактна інформація для локального SEO -->
    <meta name="business" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="address" content="Київ, Україна">
    <meta name="phone" content="+38 (067) 887-2233">
    
    <!-- Покращення швидкості відображення сторінки -->
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://enot-24.com.ua/" crossorigin>
    
    <!-- Підказка для мобільних пристроїв (Google та інші пошукові системи враховують адаптивність сайту) -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=yes">
    
    <!-- Додаткові метатеги для пошукової оптимізації -->
    <meta property="og:locale" content="uk_UA">
    <meta property="og:site_name" content="Єнот-24">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="twitter:description" content="Професійне прання та хімчистка килимів і одягу в Києві. Чистота, якість та вигідні ціни від Єнот-24!">
    <meta name="twitter:url" content="https://enot-24.com.ua/">
    
    <!-- Локалізаційні теги для Google My Business -->
    <meta itemprop="name" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta itemprop="addressLocality" content="Київ">
    <meta itemprop="telephone" content="+38 (067) 887-2233">
    
    <!-- Підказки для пошукових систем -->
    <meta name="google-site-verification" content="-Tye_Cwi5cK0K8x7A1C8Heuxg5Nmxgjh-H5j3vGd6gQ" />
    
    <!-- Теги для локального SEO, спрямовані на підвищення залученості користувачів -->
    <meta name="service" content="Прання килимів Київ, хімчистка одягу Київ, чистка меблів, професійне прання">
    <meta name="distribution" content="global">
    <meta name="target" content="all">
    <meta name="audience" content="Кияни, люди, зацікавлені у чистоті та догляді за одягом і килимами">
    
    <!-- Структуровані дані Schema.org для покращення індексації (JSON-LD формат) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві",
      "image": "{{ asset('storage/src/logo/logo-enot24.png') }}",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Київ",
        "addressCountry": "UA"
      },
      "url": "https://enot-24.com.ua",
      "telephone": "+38 (067) 887-2233",
      "priceRange": "₴₴",
      "description": "Професійні послуги прання та хімчистки килимів і одягу в Києві від Єнот-24.",
      "areaServed": "Київ, Україна"
    }
    </script>
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