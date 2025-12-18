{{-- Price Section --}}
<div class="py-10 relative">
    {{-- Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 left-10 w-32 h-32 bg-enot-light-purple/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-secondary/5 rounded-full blur-3xl"></div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-enot-light-purple/3 rounded-full blur-3xl">
        </div>
    </div>
    
    <div id="price-box-container" class="container mx-auto relative z-10">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-2">
                <h2 class="text-4xl font-bold text-enot-pink">Ціни</h2>
            </div>
            <p class="text-lg font-sans text-gray-600">
                Прозорі та доступні ціни на всі наші послуги
            </p>
        </div>
        
        @if (isset($categories) && $categories->count() > 0)
            {{-- Mobile Search and Category Selector --}}
            <div class="mb-6 px-4 lg:hidden">
                {{-- Mobile Search Box --}}
                <div class="mb-4">
                    <div class="relative">
                            <input type="text" id="mobile-service-search" placeholder=""
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-enot-light-purple focus:border-transparent transition-all duration-200 text-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                            <div id="mobile-animated-placeholder"
                                class="absolute inset-y-0 left-10 right-10 flex items-center pointer-events-none text-gray-400 text-sm">
                            <span id="mobile-placeholder-text">Завантаження...</span>
                            <span id="mobile-typing-cursor" class="ml-1">|</span>
                        </div>
                            <button id="mobile-clear-search"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div id="mobile-search-results-count" class="text-xs text-gray-500 mt-2 hidden"></div>
                    <div id="mobile-search-suggestions" class="mt-2 hidden">
                        <div class="text-xs text-gray-500 mb-1">Популярні запити:</div>
                        <div id="mobile-suggestions-list" class="flex flex-wrap gap-1"></div>
                    </div>
                </div>

                <div class="relative px-2">
                    <button id="mobile-category-selector"
                        class="w-full bg-white border-2 border-gray-300 rounded-xl px-6 py-4 text-left font-semibold text-gray-700 hover:border-enot-light-purple focus:border-enot-light-purple focus:outline-none transition-all duration-200 flex items-center justify-between">
                        <span id="mobile-category-text">Оберіть категорію</span>
                        <i class="fas fa-chevron-down transition-transform duration-200" id="mobile-category-icon"></i>
                    </button>
                    
                    {{-- Dropdown Menu --}}
                        <div id="mobile-category-dropdown"
                            class="absolute top-full left-0 right-0 mt-2 bg-white border border-gray-300 rounded-xl shadow-lg z-50 hidden">
                        <div class="py-2">
                            @foreach ($categories->filter(fn($category) => $category->services->isNotEmpty()) as $index => $category)
                                    <button
                                        class="mobile-category-option w-full text-left px-6 py-3 hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between {{ (isset($activeCategory) && $category->href === $activeCategory->href) ? 'bg-enot-light-purple text-white' : '' }}"
                                        data-category="{{ $category->href }}" data-name="{{ $category->name }}">
                                        <div class="flex items-center space-x-2">
                                            <img src="{{ asset('storage/' . $category->category_img) }}" alt="{{ $category->name }}"
                                                class="rounded-full" style="width: 30px; height: 30px;">
                                    <span class="font-medium">{{ $category->name }}</span>
                                        </div>
                                        <span
                                            class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $category->services->count() }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mobile Search Results Container --}}
            <div id="mobile-search-results-container" class="mb-6 lg:hidden hidden">
                    <div
                        class="bg-gradient-to-r from-accent/30 to-enot-light-purple/20 px-4 py-4 border border-gray-200 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800">Результати пошуку</h3>
                                <p id="mobile-search-results-info" class="text-gray-600 text-sm mt-1">Знайдено: <span
                                        id="mobile-search-total-count">0</span></p>
                        </div>
                        <div class="flex items-center space-x-2">
                                <button id="mobile-reset-search-btn"
                                    class="bg-white text-gray-600 hover:text-enot-light-purple hover:bg-white/80 px-3 py-2 rounded-lg border border-gray-300 transition-all duration-200 flex items-center space-x-1 text-sm">
                                <i class="fas fa-times"></i>
                                <span class="hidden sm:inline">Скинути</span>
                            </button>
                            <div class="w-10 h-10 bg-enot-light-purple/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-search text-enot-light-purple text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    <div id="mobile-search-results-list"
                        class="bg-white border border-gray-200 rounded-xl shadow-lg divide-y divide-gray-200">
                    <!-- Mobile search results will be populated here -->
                </div>
            </div>

            {{-- Main Layout (Desktop + Mobile) --}}
            <div class="flex flex-col lg:flex-row gap-6">
                {{-- Sticky Sidebar (Desktop only) --}}
                <div class="w-80 flex-shrink-0 hidden lg:block">
                    <div class="sticky top-0">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4">
                            {{-- Search Box --}}
                            <div class="mb-6">
                                <div class="relative">
                                        <input type="text" id="service-search" placeholder=""
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-enot-light-purple focus:border-transparent transition-all duration-200 text-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-search text-gray-400"></i>
                                    </div>
                                        <div id="animated-placeholder"
                                            class="absolute inset-y-0 left-10 right-10 flex items-center pointer-events-none text-gray-400 text-sm">
                                        <span id="placeholder-text">Завантаження...</span>
                                        <span id="typing-cursor" class="ml-1">|</span>
                                    </div>
                                        <button id="clear-search"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div id="search-results-count" class="text-xs text-gray-500 mt-2 hidden"></div>
                                <div id="search-suggestions" class="mt-2 hidden">
                                    <div class="text-xs text-gray-500 mb-1">Популярні запити:</div>
                                    <div id="suggestions-list" class="flex flex-wrap gap-1"></div>
                                </div>
                            </div>

                            <h3 class="text-lg font-sans text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-list mr-2 text-enot-light-purple"></i>
                                Категорії послуг
                            </h3>
                                <nav
                                    class="space-y-2 max-h-[calc(100vh-200px)] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                                @foreach ($categories->filter(fn($category) => $category->services->isNotEmpty()) as $index => $category)
                                        <button
                                            class="price-tab-btn w-full text-left px-4 py-3 rounded-lg font-medium transition-all duration-300 {{ (isset($activeCategory) && $category->href === $activeCategory->href) ? 'bg-enot-light-purple shadow-md text-black' : 'hover:bg-white hover:shadow-sm text-black' }}"
                                        data-category="{{ $category->href }}">
                                        <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2">
                                                    <img src="{{ asset('storage/' . $category->category_img) }}"
                                                        alt="{{ $category->name }}" class="rounded-full"
                                                        style="width: 30px; height: 30px;">
                                                    <span class="font-medium">{{ $category->name }}</span>
                                                </div>
                                                <span class="text-xs opacity-75 bg-gray-100 px-2 py-1 rounded-full"
                                                    style="color: #000 !important;">{{ $category->services->count() }}</span>
                                        </div>
                                    </button>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>

                    {{-- Main Content --}}
                    <div class="flex-1">
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200">
                            {{-- Search Results Container --}}
                            <div id="search-results-container" class="hidden">
                                <div class="bg-gradient-to-r from-accent/30 to-enot-light-purple/20 px-8 py-6 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-800">Результати пошуку</h3>
                                            <p id="search-results-info" class="text-gray-600 mt-1">Знайдено послуг: <span
                                                    id="search-total-count">0</span></p>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <button id="reset-search-btn"
                                                class="bg-white text-gray-600 hover:text-enot-light-purple hover:bg-white/80 px-4 py-2 rounded-lg border border-gray-300 transition-all duration-200 flex items-center space-x-2">
                                                <i class="fas fa-times"></i>
                                                <span>Скинути пошук</span>
                                            </button>
                                            <div class="w-12 h-12 bg-enot-light-purple/10 rounded-full flex items-center justify-center">
                                                <i class="fas fa-search text-enot-light-purple text-xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="search-results-list" class="divide-y divide-gray-200">
                                    <!-- Search results will be populated here -->
                                </div>
                            </div>

                            <div class="price-content">
                                @foreach ($categories->filter(fn($category) => $category->services->isNotEmpty()) as $index => $category)

                                    <div class="price-category {{ (isset($activeCategory) && $category->href === $activeCategory->href) ? 'active' : '' }}"
                                        data-category="{{ $category->href }}">
                                        {{-- Category Header --}}
                                        <div id="category-header-{{ $category->href }}"
                                            class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h3 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h3>
                                                    <p class="text-gray-600 mt-1">{{ $category->services->count() }} послуг</p>
                                                </div>
                                                <div class="w-12 h-12 bg-enot-light-purple/10 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-list text-enot-light-purple text-xl"></i>
                                                </div>
                                            </div>
                                        </div>



                                        {{-- Services List --}}
                                        @if ($category->services->count() > 0)
                                            <div class="category-services" data-category="{{ $category->href }}">
                                                <div class="group-services {{ (isset($activeCategory) && $category->href === $activeCategory->href) ? 'active' : '' }}"
                                                    data-category="{{ $category->href }}" data-group="all">
                                                    <div class="divide-y divide-gray-200">
                                                        @foreach ($category->services as $serviceIndex => $service)
                                                            <div
                                                                class="service-item px-8 py-6 hover:bg-gray-50 transition-colors duration-200 group">
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center space-x-4">
                                                                        <div
                                                                            class="w-10 h-10 bg-enot-light-purple/10 rounded-lg flex items-center justify-center group-hover:bg-enot-light-purple/20 transition-colors duration-200">
                                                                            <span
                                                                                class="text-enot-light-purple font-semibold text-sm leading-none flex items-center justify-center w-full h-full">{{ $serviceIndex + 1 }}</span>
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{ route('service_page', $service->transform_url ?? $service->href) }}" 
                                                                               class="block">
                                                                                <h4
                                                                                    class="text-sm font-semibold text-gray-800 group-hover:text-enot-light-purple transition-colors duration-200 cursor-pointer">
                                                                                    {{ $service->name }}
                                                                                    @if($service->marker !== null)<br><span class="p-2 bg-enot-pink rounded-3xl font-sans text-sm text-white block my-2" style="width: fit-content;">{{ $service->marker }}</span> @endif
                                                                                </h4>
                                                                                <p class="text-sm text-gray-500">Професійна обробка</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        @php
                                                                            $originalPrice = floatval($service->price ?? 0);
                                                                            $hasPrice = $originalPrice > 0;
                                                                            $discountedPrice = $originalPrice;
                                                                            $hasDiscount = false;
                                                                            
                                                                            // Проверяем скидку на категорию
                                                                            if ($hasPrice) {
                                                                                foreach ($service->categories as $category) {
                                                                                    if ($category->hasActiveDiscount()) {
                                                                                        $discountedPrice = floatval($category->calculateDiscountedPrice($originalPrice));
                                                                                        $hasDiscount = true;
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        
                                                                        @if ($hasPrice)
                                                                            @if ($hasDiscount)
                                                                                <div class="space-y-1">
                                                                                    <div class="text-lg font-bold text-enot-light-purple">
                                                                                        {{ number_format($discountedPrice, 0) }}₴</div>
                                                                                    <div class="text-sm text-gray-400 line-through">
                                                                                        {{ number_format($originalPrice, 0) }}₴</div>
                                                                                    <div class="text-xs text-green-600 font-semibold">
                                                                                        -{{ $service->categories->first()->getDiscountPercent() }}%
                                                                                        знижка
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div class="text-lg font-bold text-enot-light-purple">{{ number_format($originalPrice, 0) }}₴@if($service->marker !== null)<br><span class="text-right font-sans text-sm text-secondary">Акційна ціна!</span> @endif</div>
                                                                            @endif
                                                                            <div class="text-xs text-gray-500">за одиницю</div>
                                                                        @else
                                                                            <div class="text-sm text-gray-400 italic">Ціна за запитом</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @if($hasPrice)
                                                                    <div class="mt-4">
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
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="px-8 py-16 text-center">
                                                <div
                                                    class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                    <i class="fas fa-exclamation-triangle text-gray-400 text-xl"></i>
                                                </div>
                                                <p class="text-gray-500">Послуги в цій категорії тимчасово недоступні</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            {{-- CTA Section for Desktop --}}
                            <div class="mt-12">
                                <div
                                    class="bg-enot-light-purple rounded-2xl p-12 shadow-2xl relative overflow-hidden">
                                    <div class="relative z-10">
                                        <div
                                            class="inline-flex items-center w-16 h-16 justify-center bg-white/20 rounded-2xl mb-6">
                                            <i class="fas fa-rocket text-white text-2xl"></i>
                                        </div>
                                        <p class="text-white/90 text-lg mb-8 max-w-2xl leading-relaxed">
                                            Зв'яжіться з нами для уточнення деталей та оформлення замовлення.
                                            Наші експерти готові допомогти вам!
                                        </p>
                                        
                                        <div class="flex flex-col sm:flex-row gap-6">
                                            <button
                                                class="group bg-white text-black hover:bg-gray-100 px-10 py-2 rounded-full font-bold text-lg transition-all duration-500 transform hover:scale-105 shadow-xl hover:shadow-2xl modal_fade"
                                                data-modal="feedbackmd">
                                                <i
                                                    class="fas fa-phone mr-3 group-hover:rotate-12 transition-transform duration-300"></i>
                                                Замовити зараз
                                            </button>
                                            <a href="{{ route('courier_page') }}"
                                                class="group border-2 border-white text-white hover:bg-white hover:text-enot-light-purple px-10 py-2 rounded-full font-bold text-lg transition-all duration-500 transform hover:scale-105">
                                                <i
                                                    class="fas fa-truck mr-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                                                Викликати кур'єра
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-info-circle text-gray-400 text-3xl"></i>
                                        </div>
                <p class="text-gray-500 text-xl">Інформація про ціни тимчасово недоступна</p>
                                    </div>
                                @endif

        {{-- Sticky Mobile Search & Category Menu --}}
    <div id="sticky-mobile-menu"
        class="fixed bottom-0 left-0 right-0 z-50 lg:hidden transform translate-y-full transition-transform duration-300 ease-in-out">
            <div class="bg-white border-t border-gray-200 shadow-2xl">
                {{-- Search Section --}}
                <div class="px-4 py-3 border-b border-gray-100">
                    <div class="relative">
                    <input type="text" id="sticky-mobile-search" placeholder=""
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-enot-light-purple focus:border-transparent transition-all duration-200 text-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                                                                </div>
                    <div id="sticky-mobile-animated-placeholder"
                        class="absolute inset-y-0 left-10 right-10 flex items-center pointer-events-none text-gray-400 text-sm">
                            <span id="sticky-mobile-placeholder-text">Пошук послуг...</span>
                            <span id="sticky-mobile-typing-cursor" class="ml-1">|</span>
                                                                </div>
                    <button id="sticky-mobile-clear-search"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                            <i class="fas fa-times"></i>
                        </button>
                                                            </div>
                    <div id="sticky-mobile-search-suggestions" class="mt-2 hidden">
                        <div class="text-xs text-gray-500 mb-1">Популярні запити:</div>
                        <div id="sticky-mobile-suggestions-list" class="flex flex-wrap gap-1"></div>
                                            </div>
                                        </div>

                {{-- Category & Group Section --}}
                <div class="px-4 py-3">
                                                                <div class="flex items-center space-x-3">
                        {{-- Category Selector --}}
                        <div class="flex-1">
                            <button id="sticky-mobile-category-selector"
                                class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 text-left font-medium text-gray-700 hover:border-enot-light-purple focus:border-enot-light-purple focus:outline-none transition-all duration-200 flex items-center justify-between">
                                <span id="sticky-mobile-category-text">Оберіть категорію</span>
                            <i class="fas fa-chevron-down transition-transform duration-200"
                                id="sticky-mobile-category-icon"></i>
                            </button>
                                                                    </div>

                        {{-- Quick Actions --}}
                        <div class="flex items-center space-x-2">
                        <button id="sticky-mobile-reset-btn"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-3 rounded-xl transition-all duration-200"
                            title="Скинути пошук">
                                <i class="fas fa-undo text-sm"></i>
                            </button>
                        <button id="sticky-mobile-scroll-top"
                            class="bg-enot-light-purple hover:bg-enot-light-purple/90 text-white p-3 rounded-xl transition-all duration-200"
                            title="На початок">
                                <i class="fas fa-arrow-up text-sm"></i>
                            </button>
                                                                    </div>
                                                                </div>

                    {{-- Sticky Dropdown Menu --}}
                <div id="sticky-mobile-category-dropdown"
                    class="absolute bottom-full left-4 right-4 mb-2 bg-white border border-gray-300 rounded-xl shadow-lg z-50 hidden">
                        <div class="py-2 max-h-60 overflow-y-auto">
                            @foreach ($categories->filter(fn($category) => $category->services->isNotEmpty()) as $index => $category)
                            <button
                                class="sticky-mobile-category-option w-full text-left px-4 py-3 hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between {{ (isset($activeCategory) && $category->href === $activeCategory->href) ? 'bg-enot-light-purple text-white' : '' }}"
                                data-category="{{ $category->href }}" data-name="{{ $category->name }}">
                                    <span class="font-medium">{{ $category->name }}</span>
                                <span
                                    class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $category->services->count() }}</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('js/scripts/price_slide.js') }}"></script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
    console.log('Price tabs script starting...');

    // Elements
    const tabButtons = document.querySelectorAll('.price-tab-btn');
    const categories = document.querySelectorAll('.price-category');
    const mobileSelector = document.getElementById('mobile-category-selector');
    const mobileDropdown = document.getElementById('mobile-category-dropdown');
    const mobileIcon = document.getElementById('mobile-category-icon');
    const mobileText = document.getElementById('mobile-category-text');
    const mobileOptions = document.querySelectorAll('.mobile-category-option');
    const groupTabButtons = document.querySelectorAll('.group-tab-btn');
    
    // Search elements
    const searchInput = document.getElementById('service-search');
    const clearSearchBtn = document.getElementById('clear-search');
    const searchResultsCount = document.getElementById('search-results-count');
    const searchResultsContainer = document.getElementById('search-results-container');
    const searchResultsList = document.getElementById('search-results-list');
    const searchTotalCount = document.getElementById('search-total-count');
    const resetSearchBtn = document.getElementById('reset-search-btn');
    
    // Mobile search elements
    const mobileSearchInput = document.getElementById('mobile-service-search');
    const mobileClearSearchBtn = document.getElementById('mobile-clear-search');
    const mobileSearchResultsCount = document.getElementById('mobile-search-results-count');
    const mobileSearchResultsContainer = document.getElementById('mobile-search-results-container');
    const mobileSearchResultsList = document.getElementById('mobile-search-results-list');
    const mobileSearchTotalCount = document.getElementById('mobile-search-total-count');
    const mobileResetSearchBtn = document.getElementById('mobile-reset-search-btn');
    
    // Search state
    let searchTimeout;
    let isSearchActive = false;
    let currentSearchQuery = '';
    let currentCategory = '';
    let currentGroup = 'all';
    
    // Animated placeholder state
    let placeholderServices = [];
    let currentPlaceholderIndex = 0;
    let currentCharIndex = 0;
    let isTyping = false;
    let isDeleting = false;
    let placeholderInterval;
    
    // Sticky mobile menu state
    let stickyMenuVisible = false;
    let scrollThreshold = 200; // Показывать меню после прокрутки на 200px
    let lastScrollY = 0;
    let scrollTimeout;
    let currentActiveCategory = '';
    let priceBoxContainer = null;

    console.log('Found elements:', {
        tabButtons: tabButtons.length,
        categories: categories.length,
        mobileOptions: mobileOptions.length,
        mobileSearchInput: !!mobileSearchInput,
        mobileSearchResultsContainer: !!mobileSearchResultsContainer,
        mobileSearchResultsList: !!mobileSearchResultsList,
        groupTabButtons: groupTabButtons.length
    });

    // Flag to track if we should scroll on category switch
    let shouldScrollOnSwitch = false;

    // Function to switch categories
    function switchTab(targetCategory, userInitiated = false) {
        console.log('Switching to category:', targetCategory, 'userInitiated:', userInitiated);

        // Update desktop buttons
        tabButtons.forEach(btn => {
            btn.classList.remove('bg-enot-light-purple', 'text-white', 'shadow-md');
            btn.classList.add('text-gray-700');
        });

        const activeButtons = document.querySelectorAll(`.price-tab-btn[data-category="${targetCategory}"]`);
        activeButtons.forEach(activeButton => {
            activeButton.classList.add('bg-enot-light-purple', 'text-white', 'shadow-md', 'hover:text-black');
            activeButton.classList.remove('text-gray-700');
        });

        // Hide all categories
        categories.forEach(cat => {
            cat.classList.remove('active');
            cat.style.display = 'none';
        });

        // Show target category
        const targetCats = document.querySelectorAll(`.price-category[data-category="${targetCategory}"]`);
        targetCats.forEach(targetCat => {
            targetCat.style.display = 'block';
            setTimeout(() => {
                targetCat.classList.add('active');
            }, 10);
        });

        // Update mobile selector text
        if (mobileText && activeButtons.length > 0) {
            const categoryName = activeButtons[0].querySelector('span').textContent.trim();
            mobileText.textContent = categoryName;
        }

        // Close mobile dropdown
        closeMobileDropdown();

        // Прокрутка к началу блока цен на мобильных устройствах ТОЛЬКО при явном переключении категории
        if (userInitiated && window.innerWidth <= 768) {
            setTimeout(() => {
                scrollToPriceBlock();
            }, 150);
        }

        // Initialize group tabs for this category
        setTimeout(() => {
            initializeGroupTabs(targetCategory, userInitiated);
        }, 100);
    }

    // Function to initialize group tabs
    function initializeGroupTabs(category, userInitiated = false) {
        console.log('Initializing group tabs for:', category, 'userInitiated:', userInitiated);
        
        const categoryServices = document.querySelector(`.category-services[data-category="${category}"]`);
        if (categoryServices) {
            const groupServices = categoryServices.querySelectorAll('.group-services');
            
            // Hide all group services
            groupServices.forEach(serviceGroup => {
                serviceGroup.style.display = 'none';
            });
            
            // Show "all" services
            const allServices = categoryServices.querySelector('.group-services[data-group="all"]');
            if (allServices) {
                allServices.style.display = 'block';
            }
            
            // Reset group buttons
            const categoryGroupButtons = document.querySelectorAll(`.group-tab-btn[data-category="${category}"]`);
            categoryGroupButtons.forEach(btn => {
                btn.classList.remove('bg-enot-light-purple', 'text-white', 'shadow-sm');
                btn.classList.add('text-gray-700');
            });
            
            // Activate "all" button
            const allButton = document.querySelector(`.group-tab-btn[data-category="${category}"][data-group="all"]`);
            if (allButton) {
                allButton.classList.add('bg-enot-light-purple', 'text-white', 'shadow-sm');
                allButton.classList.remove('text-gray-700');
            }

            // Re-initialize event listeners for group buttons in this category
            reinitializeGroupTabListeners(category);
        }
    }

    // Function to re-initialize group tab listeners for a specific category
    function reinitializeGroupTabListeners(category) {
        console.log('Re-initializing group tab listeners for category:', category);
        
        const categoryGroupButtons = document.querySelectorAll(`.group-tab-btn[data-category="${category}"]`);
        console.log('Found group buttons for category:', categoryGroupButtons.length);
        
        categoryGroupButtons.forEach(button => {
            // Remove any existing listeners
            button.removeEventListener('click', handleGroupTabClick);
            
            // Add new listener
            button.addEventListener('click', handleGroupTabClick);
            console.log('Added listener to group button:', button.textContent.trim());
        });
    }

    // Separate handler for group tab clicks
    function handleGroupTabClick(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const category = this.getAttribute('data-category');
        const group = this.getAttribute('data-group');
        
        console.log('Group tab clicked:', { category, group, button: this });
        
        switchGroupTab(category, group);
    }

    // Function to switch group tabs
    function switchGroupTab(category, group, userInitiated = true) {
        console.log('Switching to group:', group, 'in category:', category, 'userInitiated:', userInitiated);

        // Update group buttons
        const categoryGroupButtons = document.querySelectorAll(`.group-tab-btn[data-category="${category}"]`);
        console.log('Found category group buttons:', categoryGroupButtons.length);
        
        categoryGroupButtons.forEach(btn => {
            btn.classList.remove('bg-enot-light-purple', 'text-white', 'shadow-sm');
            btn.classList.add('text-gray-700');
        });

        const activeButton = document.querySelector(`.group-tab-btn[data-category="${category}"][data-group="${group}"]`);
        console.log('Active button found:', activeButton);
        
        if (activeButton) {
            activeButton.classList.add('bg-enot-light-purple', 'text-white', 'shadow-sm');
            activeButton.classList.remove('text-gray-700');
        }

        // Update group services
        const categoryServices = document.querySelector(`.category-services[data-category="${category}"]`);
        console.log('Category services container found:', categoryServices);
        
        if (categoryServices) {
            const groupServices = categoryServices.querySelectorAll('.group-services');
            console.log('Found group services:', groupServices.length);
            
            groupServices.forEach(serviceGroup => {
                serviceGroup.style.display = 'none';
                console.log('Hiding group services:', serviceGroup.getAttribute('data-group'));
            });

            const targetGroupServices = categoryServices.querySelector(`.group-services[data-group="${group}"]`);
            console.log('Target group services found:', targetGroupServices);
            
            if (targetGroupServices) {
                targetGroupServices.style.display = 'block';
                console.log('Showing group services for group:', group);
            } else {
                console.log('Target group services not found for group:', group);
            }
        } else {
            console.log('Category services container not found for category:', category);
        }

        // Прокрутка к началу блока цен на мобильных устройствах ТОЛЬКО при явном переключении группы
        if (userInitiated && window.innerWidth <= 768) {
            setTimeout(() => {
                scrollToPriceBlock();
            }, 150);
        }
    }

    // Search functions
    // Функция для плавной прокрутки к началу блока цен
    function scrollToPriceBlock() {
        const priceContainer = document.getElementById('price-box-container');
        console.log('Price container found:', priceContainer);
        
        if (priceContainer) {
            // Получаем позицию элемента относительно документа
            const rect = priceContainer.getBoundingClientRect();
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const elementTop = rect.top + scrollTop;
            
            // Учитываем высоту навигатора (примерно 70px) + отступ
            const navbarHeight = 70;
            const offset = navbarHeight + 20; // 20px дополнительный отступ
            const targetPosition = elementTop - offset;
            
            console.log('Scrolling details:', {
                elementTop: elementTop,
                navbarHeight: navbarHeight,
                targetPosition: targetPosition,
                currentScrollTop: scrollTop
            });
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        } else {
            console.log('Price container not found, trying alternative selectors...');
            
            // Попробуем альтернативные селекторы
            const alternativeSelectors = [
                '.py-20.bg-gradient-to-br',
                '.price-section',
                '#price-box',
                '[id*="price"]'
            ];
            
            for (const selector of alternativeSelectors) {
                const element = document.querySelector(selector);
                if (element) {
                    console.log('Found element with selector:', selector, element);
                    const rect = element.getBoundingClientRect();
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    const elementTop = rect.top + scrollTop;
                    const targetPosition = elementTop - 90; // 70px навигатор + 20px отступ
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    return;
                }
            }
            
            console.log('No suitable element found for scrolling');
        }
    }

    // Функция для отображения цены с учетом скидки
    function getServicePriceHTML(service) {
        const originalPrice = service.price || 0;
        const hasPrice = originalPrice > 0;
        
        if (!hasPrice) {
            return `<div class="text-sm text-gray-400 italic">Ціна за запитом</div>`;
        }
        
        let discountedPrice = originalPrice;
        let hasDiscount = false;
        let discountPercent = 0;
        
        // Проверяем скидку на категорию
        if (service.categories && service.categories.length > 0) {
            for (const category of service.categories) {
                if (typeof category === 'object' && category.discount_active && category.discount_percent > 0) {
                    discountedPrice = originalPrice - (originalPrice * category.discount_percent / 100);
                    hasDiscount = true;
                    discountPercent = category.discount_percent;
                    break;
                }
            }
        }
        
        if (hasDiscount) {
            return `
                <div class="space-y-1">
                    <div class="text-lg font-bold text-enot-light-purple">${Math.round(discountedPrice)}₴</div>
                    <div class="text-sm text-gray-400 line-through">${originalPrice}₴</div>
                    <div class="text-xs text-green-600 font-semibold">
                        -${discountPercent}% знижка
                    </div>
                </div>
            `;
        } else {
            return `<div class="text-lg font-bold text-enot-light-purple">${originalPrice}₴</div>`;
        }
    }

    function performSearch(query, category = '', group = 'all', isMobile = false) {
        console.log('performSearch called:', { query, category, group, isMobile });
        
        if (!query || query.trim().length < 1) { // Снижаем минимальную длину
            hideSearchResults(isMobile);
            hideSuggestions(isMobile);
            return;
        }

        currentSearchQuery = query;
        currentCategory = category;
        currentGroup = group;

        const params = new URLSearchParams({
            q: query,
            category: category,
            group: group
        });

        fetch(`/api/search-services?${params}`)
            .then(response => response.json())
            .then(data => {
                displaySearchResults(data, isMobile);
                displaySuggestions(data.suggestions, isMobile);
                
                // Прокрутка к началу блока цен на мобильных устройствах
                if (isMobile || window.innerWidth <= 768) {
                    setTimeout(() => {
                        scrollToPriceBlock();
                    }, 100);
                }
            })
            .catch(error => {
                console.error('Search error:', error);
                showSearchError(isMobile);
            });
    }

    function displaySuggestions(suggestions, isMobile = false) {
        const suggestionsContainer = isMobile ? 
            document.getElementById('mobile-search-suggestions') : 
            document.getElementById('search-suggestions');
        const suggestionsList = isMobile ? 
            document.getElementById('mobile-suggestions-list') : 
            document.getElementById('suggestions-list');

        if (!suggestionsContainer || !suggestionsList) return;

        if (suggestions && suggestions.length > 0) {
            suggestionsList.innerHTML = '';
            suggestions.forEach(suggestion => {
                const suggestionElement = document.createElement('span');
                suggestionElement.className = 'inline-block bg-gray-100 hover:bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs cursor-pointer transition-colors duration-200';
                suggestionElement.textContent = suggestion;
                suggestionElement.addEventListener('click', () => {
                    const input = isMobile ? mobileSearchInput : searchInput;
                    input.value = suggestion;
                    // Поиск по всем услугам, а не только по выбранной категории
                    performSearch(suggestion, '', currentGroup, isMobile);
                });
                suggestionsList.appendChild(suggestionElement);
            });
            suggestionsContainer.classList.remove('hidden');
        } else {
            suggestionsContainer.classList.add('hidden');
        }
    }

    function hideSuggestions(isMobile = false) {
        const suggestionsContainer = isMobile ? 
            document.getElementById('mobile-search-suggestions') : 
            document.getElementById('search-suggestions');
        
        if (suggestionsContainer) {
            suggestionsContainer.classList.add('hidden');
        }
    }

    function displaySearchResults(data, isMobile = false) {
        const resultsContainer = isMobile ? mobileSearchResultsContainer : searchResultsContainer;
        const resultsList = isMobile ? mobileSearchResultsList : searchResultsList;
        const totalCount = isMobile ? mobileSearchTotalCount : searchTotalCount;
        const resultsCount = isMobile ? mobileSearchResultsCount : searchResultsCount;

        if (data.services.length === 0) {
            showNoResults(isMobile);
            return;
        }

        // Update counts
        totalCount.textContent = data.total;
        if (resultsCount) {
            resultsCount.textContent = `Знайдено ${data.total} послуг`;
            resultsCount.classList.remove('hidden');
        }

        // Build results HTML
        let resultsHTML = '';
        data.services.forEach((service, index) => {
                    const categoriesText = service.categories.length > 0 ?
                        (typeof service.categories[0] === 'object' ?
                            service.categories.map(cat => cat.name || cat).join(', ') :
                            service.categories.join(', ')) :
                        'Професійна обробка';
                    const groupsText = service.groups.length > 0 ?
                        (typeof service.groups[0] === 'object' ?
                            service.groups.map(g => g.name || g).join(', ') :
                            service.groups.join(', ')) :
                        '';
            const relevanceScore = service.relevance_score || 0;
            
            // Определяем цвет релевантности
            let relevanceColor = 'text-gray-500';
            let relevanceText = 'Низька';
            if (relevanceScore >= 80) {
                relevanceColor = 'text-green-600';
                relevanceText = 'Висока';
            } else if (relevanceScore >= 60) {
                relevanceColor = 'text-yellow-600';
                relevanceText = 'Середня';
            } else if (relevanceScore >= 40) {
                relevanceColor = 'text-orange-600';
                relevanceText = 'Низька';
            }
            
            resultsHTML += `
                <div class="service-item px-8 py-6 hover:bg-gray-50 transition-colors duration-200 group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-enot-light-purple/10 rounded-lg flex items-center justify-center group-hover:bg-enot-light-purple/20 transition-colors duration-200">
                                <span class="text-enot-light-purple font-semibold text-sm leading-none flex items-center justify-center w-full h-full">${index + 1}</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-1">
                                    <h4 class="text-sm font-semibold text-gray-800 group-hover:text-enot-light-purple transition-colors duration-200">
                                        ${service.name}</h4>
                                    <span class="text-xs ${relevanceColor} bg-gray-100 px-2 py-1 rounded-full">
                                        ${relevanceText} (${Math.round(relevanceScore)}%)
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Категорія: ${categoriesText}
                                    ${groupsText ? `<br>Група: ${groupsText}` : ''}
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            ${getServicePriceHTML(service)}
                            <div class="text-xs text-gray-500">за одиницю</div>
                        </div>
                    </div>
                </div>
            `;
        });

        resultsList.innerHTML = resultsHTML;
        resultsContainer.classList.remove('hidden');
        
        // Hide regular content
        const priceContent = document.querySelector('.price-content');
        if (priceContent) {
            priceContent.style.display = 'none';
        }

        isSearchActive = true;
    }

    function showNoResults(isMobile = false) {
        const resultsContainer = isMobile ? mobileSearchResultsContainer : searchResultsContainer;
        const resultsList = isMobile ? mobileSearchResultsList : searchResultsList;
        const totalCount = isMobile ? mobileSearchTotalCount : searchTotalCount;

        totalCount.textContent = '0';
        resultsList.innerHTML = `
            <div class="px-8 py-16 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-gray-400 text-xl"></i>
                </div>
                <p class="text-gray-500">Послуги не знайдено</p>
                <p class="text-gray-400 text-sm mt-2">Спробуйте змінити пошуковий запит</p>
            </div>
        `;
        resultsContainer.classList.remove('hidden');
        
        // Hide regular content
        const priceContent = document.querySelector('.price-content');
        if (priceContent) {
            priceContent.style.display = 'none';
        }

        isSearchActive = true;
    }

    function showSearchError(isMobile = false) {
        const resultsContainer = isMobile ? mobileSearchResultsContainer : searchResultsContainer;
        const resultsList = isMobile ? mobileSearchResultsList : searchResultsList;

        resultsList.innerHTML = `
            <div class="px-8 py-16 text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
                </div>
                <p class="text-red-500">Помилка пошуку</p>
                <p class="text-gray-400 text-sm mt-2">Спробуйте пізніше</p>
            </div>
        `;
        resultsContainer.classList.remove('hidden');
        
        // Hide regular content
        const priceContent = document.querySelector('.price-content');
        if (priceContent) {
            priceContent.style.display = 'none';
        }

        isSearchActive = true;
    }

    function hideSearchResults(isMobile = false) {
        const resultsContainer = isMobile ? mobileSearchResultsContainer : searchResultsContainer;
        const resultsCount = isMobile ? mobileSearchResultsCount : searchResultsCount;

        resultsContainer.classList.add('hidden');
        if (resultsCount) {
            resultsCount.classList.add('hidden');
        }
        
        // Show regular content
        const priceContent = document.querySelector('.price-content');
        if (priceContent) {
            priceContent.style.display = 'block';
        }

        isSearchActive = false;
    }

    function clearSearch(isMobile = false) {
        const input = isMobile ? mobileSearchInput : searchInput;
        const clearBtn = isMobile ? mobileClearSearchBtn : clearSearchBtn;
        const resultsCount = isMobile ? mobileSearchResultsCount : searchResultsCount;

        input.value = '';
        clearBtn.classList.add('hidden');
        if (resultsCount) {
            resultsCount.classList.add('hidden');
        }
        hideSearchResults(isMobile);
        currentSearchQuery = '';
        
        // Restart placeholder animation
        startPlaceholderAnimation(isMobile);
    }

    // Animated placeholder functions
    function loadPlaceholderServices() {
        fetch('/api/placeholder-services')
            .then(response => response.json())
            .then(data => {
                placeholderServices = data.services;
                startPlaceholderAnimation(false);
                startPlaceholderAnimation(true);
            })
            .catch(error => {
                console.error('Error loading placeholder services:', error);
                // Fallback to static placeholder
                setStaticPlaceholder(false);
                setStaticPlaceholder(true);
            });
    }

    function startPlaceholderAnimation(isMobile = false) {
        const placeholderText = isMobile ? 
            document.getElementById('mobile-placeholder-text') : 
            document.getElementById('placeholder-text');
        const cursor = isMobile ? 
            document.getElementById('mobile-typing-cursor') : 
            document.getElementById('typing-cursor');
        const input = isMobile ? mobileSearchInput : searchInput;

        if (!placeholderText || !cursor || !input) return;

        // Don't animate if input has focus or value
        if (input.value || input === document.activeElement) {
            placeholderText.textContent = '';
            cursor.style.display = 'none';
            return;
        }

        // Clear any existing interval
        if (placeholderInterval) {
            clearInterval(placeholderInterval);
        }

        currentPlaceholderIndex = 0;
        currentCharIndex = 0;
        isTyping = true;
        isDeleting = false;

        cursor.style.display = 'inline';
        cursor.classList.add('animate-pulse');

        function typeText() {
            if (placeholderServices.length === 0) return;

            const currentService = placeholderServices[currentPlaceholderIndex];
            const fullText = `${currentService.name}`;
            
            if (isDeleting) {
                placeholderText.textContent = fullText.substring(0, currentCharIndex - 1);
                currentCharIndex--;
                
                if (currentCharIndex === 0) {
                    isDeleting = false;
                    isTyping = true;
                    currentPlaceholderIndex = (currentPlaceholderIndex + 1) % placeholderServices.length;
                }
            } else {
                placeholderText.textContent = fullText.substring(0, currentCharIndex + 1);
                currentCharIndex++;
                
                if (currentCharIndex === fullText.length) {
                    isTyping = false;
                    setTimeout(() => {
                        isDeleting = true;
                    }, 2000); // Pause before deleting
                }
            }
        }

        placeholderInterval = setInterval(typeText, isDeleting ? 50 : 100);
    }

    function stopPlaceholderAnimation(isMobile = false) {
        if (placeholderInterval) {
            clearInterval(placeholderInterval);
            placeholderInterval = null;
        }
        
        const placeholderText = isMobile ? 
            document.getElementById('mobile-placeholder-text') : 
            document.getElementById('placeholder-text');
        const cursor = isMobile ? 
            document.getElementById('mobile-typing-cursor') : 
            document.getElementById('typing-cursor');

        if (placeholderText) placeholderText.textContent = '';
        if (cursor) {
            cursor.style.display = 'none';
            cursor.classList.remove('animate-pulse');
        }
    }

    function setStaticPlaceholder(isMobile = false) {
        const placeholderText = isMobile ? 
            document.getElementById('mobile-placeholder-text') : 
            document.getElementById('placeholder-text');
        const cursor = isMobile ? 
            document.getElementById('mobile-typing-cursor') : 
            document.getElementById('typing-cursor');

        if (placeholderText) placeholderText.textContent = 'Пошук послуг...';
        if (cursor) {
            cursor.style.display = 'none';
        }
    }

    // Sticky mobile menu functions
    function showStickyMenu() {
        const stickyMenu = document.getElementById('sticky-mobile-menu');
        if (stickyMenu && !stickyMenuVisible) {
            stickyMenu.classList.remove('translate-y-full');
            stickyMenu.classList.add('translate-y-0');
            stickyMenuVisible = true;
        }
    }

    function hideStickyMenu() {
        const stickyMenu = document.getElementById('sticky-mobile-menu');
        if (stickyMenu && stickyMenuVisible) {
            stickyMenu.classList.add('translate-y-full');
            stickyMenu.classList.remove('translate-y-0');
            stickyMenuVisible = false;
        }
    }

    function handleScroll() {
        const currentScrollY = window.scrollY;
        
        // Проверяем видимость прайс-бокса
        const isPriceBoxVisible = checkPriceBoxVisibility();
        
        // Если прайс-бокс не виден, скрываем меню
        if (!isPriceBoxVisible) {
            hideStickyMenu();
            return;
        }
        
        // Проверяем видимость шапки текущей активной категории
        const isHeaderVisible = checkCategoryHeaderVisibility();
        
        // Показываем меню если:
        // 1. Прокрутили достаточно далеко И шапка не видна
        // 2. ИЛИ есть активный поиск (чтобы меню не исчезало при поиске)
        if ((currentScrollY > scrollThreshold && !isHeaderVisible) || isSearchActive) {
            showStickyMenu();
        } else {
            hideStickyMenu();
        }
        
        lastScrollY = currentScrollY;
    }

    function checkPriceBoxVisibility() {
        if (!priceBoxContainer) return false;
        
        const rect = priceBoxContainer.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        
        // Прайс-бокс считается видимым если его верхняя часть находится в видимой области
        // или если его нижняя часть видна (пользователь прокрутил до него)
        return rect.top < windowHeight && rect.bottom > 0;
    }

    function checkCategoryHeaderVisibility() {
        if (!currentActiveCategory) return false;
        
        // Кэшируем элементы для лучшей производительности
        const desktopHeader = document.getElementById(`category-header-${currentActiveCategory}`);
        const mobileHeader = document.getElementById(`mobile-category-header-${currentActiveCategory}`);
        
        // Проверяем desktop версию (приоритет для desktop)
        if (desktopHeader && isElementInViewport(desktopHeader)) {
            return true;
        }
        
        // Проверяем mobile версию только если desktop не найден или не виден
        if (mobileHeader && isElementInViewport(mobileHeader)) {
            return true;
        }
        
        return false;
    }

    function isElementInViewport(element) {
        const rect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        
        // Элемент считается видимым если его верхняя часть находится в видимой области
        // с небольшим отступом (50px) для лучшего UX
        return rect.top >= -50 && rect.top <= windowHeight - 50;
    }

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function syncStickyMenuWithMain() {
        // Синхронизируем поиск
        const stickySearchInput = document.getElementById('sticky-mobile-search');
        const mainSearchInput = document.getElementById('mobile-service-search');
        const stickyPlaceholder = document.getElementById('sticky-mobile-animated-placeholder');
        const stickyClearBtn = document.getElementById('sticky-mobile-clear-search');
        
        if (stickySearchInput && mainSearchInput) {
            stickySearchInput.value = mainSearchInput.value;
            
            // Управляем видимостью плейсхолдера и кнопки очистки
            if (mainSearchInput.value.trim()) {
                if (stickyPlaceholder) stickyPlaceholder.classList.add('hidden');
                if (stickyClearBtn) stickyClearBtn.classList.remove('hidden');
            } else {
                if (stickyPlaceholder) stickyPlaceholder.classList.remove('hidden');
                if (stickyClearBtn) stickyClearBtn.classList.add('hidden');
            }
        }

        // Синхронизируем категорию
        const stickyCategoryText = document.getElementById('sticky-mobile-category-text');
        const mainCategoryText = document.getElementById('mobile-category-text');
        
        if (stickyCategoryText && mainCategoryText) {
            stickyCategoryText.textContent = mainCategoryText.textContent;
        }
    }

    function resetSearch(isMobile = false) {
        // Clear search inputs
        if (isMobile) {
            mobileSearchInput.value = '';
            mobileClearSearchBtn.classList.add('hidden');
            
            // Сбрасываем закрепленное меню
            const stickySearchInput = document.getElementById('sticky-mobile-search');
            const stickyPlaceholder = document.getElementById('sticky-mobile-animated-placeholder');
            const stickyClearBtn = document.getElementById('sticky-mobile-clear-search');
            
            if (stickySearchInput) stickySearchInput.value = '';
            if (stickyPlaceholder) stickyPlaceholder.classList.remove('hidden');
            if (stickyClearBtn) stickyClearBtn.classList.add('hidden');
        } else {
            searchInput.value = '';
            clearSearchBtn.classList.add('hidden');
        }
        
        // Hide search results
        hideSearchResults(isMobile);
        
        // Reset search state
        currentSearchQuery = '';
        isSearchActive = false;
        
        // Show regular content
        const priceContent = document.querySelector('.price-content');
        if (priceContent) {
            priceContent.style.display = 'block';
        }
        
        // Reset category and group to current selection
        const activeTab = document.querySelector('.price-tab-btn.bg-enot-light-purple');
        if (activeTab) {
            currentCategory = activeTab.getAttribute('data-category');
        }
        
        const activeGroupBtn = document.querySelector('.group-tab-btn.bg-enot-light-purple');
        if (activeGroupBtn) {
            currentGroup = activeGroupBtn.getAttribute('data-group') || 'all';
        }

        // Прокрутка к началу блока цен на мобильных устройствах при сбросе поиска
        if (isMobile || window.innerWidth <= 768) {
            setTimeout(() => {
                scrollToPriceBlock();
            }, 100);
        }
    }

    // Mobile dropdown functions
    function toggleMobileDropdown() {
        if (mobileDropdown.classList.contains('hidden')) {
            openMobileDropdown();
        } else {
            closeMobileDropdown();
        }
    }

    function openMobileDropdown() {
        mobileDropdown.classList.remove('hidden');
        if (mobileIcon) {
            mobileIcon.classList.add('rotate');
        }
    }

    function closeMobileDropdown() {
        mobileDropdown.classList.add('hidden');
        if (mobileIcon) {
            mobileIcon.classList.remove('rotate');
        }
    }

    // Event listeners
    tabButtons.forEach(button => {
                button.addEventListener('click', function () {
            const targetCategory = this.getAttribute('data-category');
            switchTab(targetCategory, true); // userInitiated = true при клике
        });
    });

    if (mobileSelector) {
                mobileSelector.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMobileDropdown();
        });
    }

    mobileOptions.forEach(option => {
                option.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetCategory = this.getAttribute('data-category');
            const categoryName = this.getAttribute('data-name');
            
            if (mobileText) {
                mobileText.textContent = categoryName;
            }
            
            closeMobileDropdown();
            switchTab(targetCategory, true); // userInitiated = true при клике
        });
    });

    // Initialize group tab listeners for all buttons
    groupTabButtons.forEach(button => {
        button.addEventListener('click', handleGroupTabClick);
        console.log('Initial listener added to group button:', button.textContent.trim());
    });

    // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
        if (mobileDropdown && mobileSelector &&
            !mobileDropdown.contains(e.target) &&
            !mobileSelector.contains(e.target)) {
            closeMobileDropdown();
        }
    });

    // Search event listeners
    if (searchInput) {
                searchInput.addEventListener('input', function () {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            // Stop placeholder animation when user types
            stopPlaceholderAnimation(false);
            
            if (query.length >= 1) { // Снижаем минимальную длину
                clearSearchBtn.classList.remove('hidden');
                searchTimeout = setTimeout(() => {
                    // Поиск по всем услугам, а не только по выбранной категории
                    performSearch(query, '', currentGroup, false);
                }, 200); // Ускоряем поиск
            } else {
                clearSearchBtn.classList.add('hidden');
                hideSuggestions(false);
                // If field is empty, reset search completely
                if (query.length === 0) {
                    resetSearch(false);
                } else {
                    hideSearchResults(false);
                }
            }
        });

                searchInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = this.value.trim();
                if (query.length >= 2) {
                    // Поиск по всем услугам, а не только по выбранной категории
                    performSearch(query, '', currentGroup, false);
                }
            }
        });

                searchInput.addEventListener('focus', function () {
            stopPlaceholderAnimation(false);
        });

                searchInput.addEventListener('blur', function () {
            if (!this.value) {
                startPlaceholderAnimation(false);
            }
        });
    }

    if (clearSearchBtn) {
                clearSearchBtn.addEventListener('click', function () {
            resetSearch(false);
        });
    }

    if (resetSearchBtn) {
                resetSearchBtn.addEventListener('click', function () {
            resetSearch(false);
        });
    }

    // Mobile search event listeners
    if (mobileSearchInput) {
        console.log('Mobile search input found, adding event listeners');
                mobileSearchInput.addEventListener('input', function () {
            console.log('Mobile search input event triggered:', this.value);
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            // Stop placeholder animation when user types
            stopPlaceholderAnimation(true);
            
            if (query.length >= 1) { // Снижаем минимальную длину
                mobileClearSearchBtn.classList.remove('hidden');
                searchTimeout = setTimeout(() => {
                    // Поиск по всем услугам, а не только по выбранной категории
                    performSearch(query, '', currentGroup, true);
                }, 200); // Ускоряем поиск
            } else {
                mobileClearSearchBtn.classList.add('hidden');
                hideSuggestions(true);
                // If field is empty, reset search completely
                if (query.length === 0) {
                    resetSearch(true);
                } else {
                    hideSearchResults(true);
                }
            }
        });

                mobileSearchInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = this.value.trim();
                if (query.length >= 2) {
                    // Поиск по всем услугам, а не только по выбранной категории
                    performSearch(query, '', currentGroup, true);
                }
            }
        });

                mobileSearchInput.addEventListener('focus', function () {
            stopPlaceholderAnimation(true);
        });

                mobileSearchInput.addEventListener('blur', function () {
            if (!this.value) {
                startPlaceholderAnimation(true);
            }
        });
    }

    if (mobileClearSearchBtn) {
                mobileClearSearchBtn.addEventListener('click', function () {
            resetSearch(true);
        });
    }

    if (mobileResetSearchBtn) {
                mobileResetSearchBtn.addEventListener('click', function () {
            resetSearch(true);
        });
    }

    // Update search when switching categories
    const originalSwitchTab = switchTab;
            switchTab = function (targetCategory, userInitiated = false) {
        currentCategory = targetCategory;
        currentActiveCategory = targetCategory; // Обновляем активную категорию для отслеживания
        
        // Reset search when switching categories
        if (isSearchActive) {
            resetSearch(false);
        }
        
        // Передаем параметр userInitiated в оригинальную функцию
        originalSwitchTab(targetCategory, userInitiated);
    };

    // Update search when switching groups
    const originalSwitchGroupTab = switchGroupTab;
            switchGroupTab = function (category, group, userInitiated = true) {
        currentGroup = group;
        
        // Reset search when switching groups
        if (isSearchActive) {
            resetSearch(false);
        }
        
        // Передаем параметр userInitiated в оригинальную функцию
        originalSwitchGroupTab(category, group, userInitiated);
    };

    // Initialize price box container
    priceBoxContainer = document.getElementById('price-box-container');

    // Initialize first tab
    if (tabButtons.length > 0 && categories.length > 0) {
        // Находим активную кнопку (с классом bg-enot-light-purple)
        const activeButton = document.querySelector('.price-tab-btn.bg-enot-light-purple');
        
        if (activeButton) {
            const activeCategory = activeButton.getAttribute('data-category');
            const activeCategoryName = activeButton.querySelector('span').textContent.trim();

            currentActiveCategory = activeCategory; // Инициализируем активную категорию
            switchTab(activeCategory, false); // userInitiated = false при инициализации
            
            if (mobileText) {
                mobileText.textContent = activeCategoryName;
            }
        } else {
            // Fallback к первой кнопке если активная не найдена
            const firstButton = tabButtons[0];
            const firstCategory = firstButton.getAttribute('data-category');
            const firstCategoryName = firstButton.querySelector('span').textContent.trim();

            currentActiveCategory = firstCategory;
            switchTab(firstCategory, false); // userInitiated = false при инициализации
            
            if (mobileText) {
                mobileText.textContent = firstCategoryName;
            }
        }
    }

    // Initialize animated placeholder
    loadPlaceholderServices();

    // Sticky mobile menu event listeners
    const stickyMobileSearchInput = document.getElementById('sticky-mobile-search');
    const stickyMobileClearSearchBtn = document.getElementById('sticky-mobile-clear-search');
    const stickyMobileCategorySelector = document.getElementById('sticky-mobile-category-selector');
    const stickyMobileCategoryDropdown = document.getElementById('sticky-mobile-category-dropdown');
    const stickyMobileCategoryIcon = document.getElementById('sticky-mobile-category-icon');
    const stickyMobileCategoryText = document.getElementById('sticky-mobile-category-text');
    const stickyMobileCategoryOptions = document.querySelectorAll('.sticky-mobile-category-option');
    const stickyMobileResetBtn = document.getElementById('sticky-mobile-reset-btn');
    const stickyMobileScrollTopBtn = document.getElementById('sticky-mobile-scroll-top');

    // Sticky search functionality
    if (stickyMobileSearchInput) {
                stickyMobileSearchInput.addEventListener('input', function () {
            const query = this.value.trim();
            const stickyPlaceholder = document.getElementById('sticky-mobile-animated-placeholder');
            
            // Управляем видимостью плейсхолдера
            if (query.length > 0) {
                if (stickyPlaceholder) stickyPlaceholder.classList.add('hidden');
            } else {
                if (stickyPlaceholder) stickyPlaceholder.classList.remove('hidden');
            }
            
            // Синхронизируем с основным поиском
            if (mobileSearchInput) {
                mobileSearchInput.value = query;
            }
            
            if (query.length >= 1) {
                stickyMobileClearSearchBtn.classList.remove('hidden');
                // Поиск по всем услугам, а не только по выбранной категории
                performSearch(query, '', currentGroup, true);
            } else {
                stickyMobileClearSearchBtn.classList.add('hidden');
                hideSuggestions(true);
                if (query.length === 0) {
                    resetSearch(true);
                } else {
                    hideSearchResults(true);
                }
            }
        });

                stickyMobileSearchInput.addEventListener('focus', function () {
            const stickyPlaceholder = document.getElementById('sticky-mobile-animated-placeholder');
            if (stickyPlaceholder) stickyPlaceholder.classList.add('hidden');
            stopPlaceholderAnimation(true);
        });

                stickyMobileSearchInput.addEventListener('blur', function () {
            const stickyPlaceholder = document.getElementById('sticky-mobile-animated-placeholder');
            if (!this.value) {
                if (stickyPlaceholder) stickyPlaceholder.classList.remove('hidden');
                startPlaceholderAnimation(true);
            }
        });
    }

    if (stickyMobileClearSearchBtn) {
                stickyMobileClearSearchBtn.addEventListener('click', function () {
            const stickyPlaceholder = document.getElementById('sticky-mobile-animated-placeholder');
            resetSearch(true);
            if (mobileSearchInput) {
                mobileSearchInput.value = '';
            }
            if (stickyPlaceholder) stickyPlaceholder.classList.remove('hidden');
        });
    }

    // Sticky category functionality
    if (stickyMobileCategorySelector) {
                stickyMobileCategorySelector.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (stickyMobileCategoryDropdown.classList.contains('hidden')) {
                stickyMobileCategoryDropdown.classList.remove('hidden');
                if (stickyMobileCategoryIcon) {
                    stickyMobileCategoryIcon.classList.add('rotate');
                }
            } else {
                stickyMobileCategoryDropdown.classList.add('hidden');
                if (stickyMobileCategoryIcon) {
                    stickyMobileCategoryIcon.classList.remove('rotate');
                }
            }
        });
    }

    // Sticky category options
    stickyMobileCategoryOptions.forEach(option => {
                option.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetCategory = this.getAttribute('data-category');
            const categoryName = this.getAttribute('data-name');
            
            // Синхронизируем с основным селектором
            if (mobileText) {
                mobileText.textContent = categoryName;
            }
            if (stickyMobileCategoryText) {
                stickyMobileCategoryText.textContent = categoryName;
            }
            
            // Переключаем категорию
            switchTab(targetCategory, true); // userInitiated = true при клике
            
            // Закрываем dropdown
            stickyMobileCategoryDropdown.classList.add('hidden');
            if (stickyMobileCategoryIcon) {
                stickyMobileCategoryIcon.classList.remove('rotate');
            }
        });
    });

    // Quick action buttons
    if (stickyMobileResetBtn) {
                stickyMobileResetBtn.addEventListener('click', function () {
            resetSearch(true);
            if (mobileSearchInput) {
                mobileSearchInput.value = '';
            }
        });
    }

    if (stickyMobileScrollTopBtn) {
                stickyMobileScrollTopBtn.addEventListener('click', function () {
            scrollToTop();
        });
    }

    // Optimized scroll event listener
    let isScrolling = false;
            window.addEventListener('scroll', function () {
        if (!isScrolling) {
                    requestAnimationFrame(function () {
                handleScroll();
                isScrolling = false;
            });
            isScrolling = true;
        }
    });

    // Close sticky dropdown when clicking outside
            document.addEventListener('click', function (e) {
        if (stickyMobileCategoryDropdown && stickyMobileCategorySelector &&
            !stickyMobileCategoryDropdown.contains(e.target) &&
            !stickyMobileCategorySelector.contains(e.target)) {
            stickyMobileCategoryDropdown.classList.add('hidden');
            if (stickyMobileCategoryIcon) {
                stickyMobileCategoryIcon.classList.remove('rotate');
            }
        }
    });

    // Sync sticky menu when main menu changes
    // Note: originalSwitchTab is already declared above, so we just update the function
    const currentSwitchTab = switchTab;
            switchTab = function (targetCategory, userInitiated = false) {
        currentCategory = targetCategory;
        currentActiveCategory = targetCategory; // Обновляем активную категорию для отслеживания
        
        if (isSearchActive && currentSearchQuery) {
            performSearch(currentSearchQuery, '', currentGroup, false);
        }
        
        // Синхронизируем закрепленное меню
        syncStickyMenuWithMain();
        
        // Передаем параметр userInitiated в оригинальную функцию
        currentSwitchTab(targetCategory, userInitiated);
    };

    // Автоматический поиск при загрузке страницы с параметром search
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('search');
    
    if (searchQuery && searchQuery.trim()) {
        console.log('Auto-search triggered with query:', searchQuery);
        
        // Заполняем поле поиска
        if (searchInput) {
            searchInput.value = searchQuery.trim();
        }
        if (mobileSearchInput) {
            mobileSearchInput.value = searchQuery.trim();
        }
        
        // Выполняем поиск
        setTimeout(() => {
            // Поиск по всем услугам, а не только по выбранной категории
            performSearch(searchQuery.trim(), '', currentGroup, false);
        }, 100);
    }
});
</script>
@endsection

<style>
/* Mobile dropdown styles */
#mobile-category-dropdown {
    transition: all 0.3s ease-in-out;
    transform: translateY(-10px);
    opacity: 0;
    visibility: hidden;
}

#mobile-category-dropdown:not(.hidden) {
    transform: translateY(0);
    opacity: 1;
    visibility: visible;
}

#mobile-category-icon.rotate {
    transform: rotate(180deg);
}

.mobile-category-option:hover {
    background-color: #f3f4f6 !important;
}

/* Category styles */
.price-category {
    display: none;
}

.price-category.active {
    display: block;
}

/* Smooth transitions */
    .price-tab-btn,
    .group-tab-btn {
    transition: all 0.3s ease-in-out;
}

.price-tab-btn.active {
        background-color: #b0a8fe !important;
    color: white !important;
}

.service-item {
    transition: all 0.2s ease-in-out;
}

.service-item:hover {
    background-color: #f9fafb !important;
    transform: translateX(4px);
}

/* Search styles */
    #service-search,
    #mobile-service-search {
    transition: all 0.3s ease-in-out;
}

    #service-search:focus,
    #mobile-service-search:focus {
    transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(176, 168, 254, 0.15);
}

    #clear-search,
    #mobile-clear-search {
    transition: all 0.2s ease-in-out;
}

    #clear-search:hover,
    #mobile-clear-search:hover {
    transform: scale(1.1);
}

    #reset-search-btn,
    #mobile-reset-search-btn {
    transition: all 0.2s ease-in-out;
}

    #reset-search-btn:hover,
    #mobile-reset-search-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Animated placeholder styles */
    #animated-placeholder,
    #mobile-animated-placeholder {
    transition: all 0.3s ease-in-out;
}

    #typing-cursor,
    #mobile-typing-cursor {
    animation: blink 1s infinite;
        color: #b0a8fe;
}

@keyframes blink {

        0%,
        50% {
            opacity: 1;
        }

        51%,
        100% {
            opacity: 0;
        }
}

/* Search suggestions styles */
    #search-suggestions,
    #mobile-search-suggestions {
    animation: fadeInDown 0.3s ease-out;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.suggestion-tag {
    transition: all 0.2s ease-in-out;
}

.suggestion-tag:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Relevance indicators */
.relevance-high {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.relevance-medium {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.relevance-low {
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: white;
}

.relevance-very-low {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
}

/* Enhanced search suggestions */
    #search-suggestions .suggestion-tag,
    #mobile-search-suggestions .suggestion-tag {
    position: relative;
    overflow: hidden;
}

    #search-suggestions .suggestion-tag::before,
    #mobile-search-suggestions .suggestion-tag::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.5s;
}

    #search-suggestions .suggestion-tag:hover::before,
    #mobile-search-suggestions .suggestion-tag:hover::before {
    left: 100%;
}

/* Sticky mobile menu styles */
#sticky-mobile-menu {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
}

#sticky-mobile-menu .border-t {
    border-color: rgba(229, 231, 235, 0.8);
}

#sticky-mobile-category-dropdown {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(229, 231, 235, 0.8);
}

#sticky-mobile-category-dropdown .sticky-mobile-category-option:hover {
    background-color: rgba(249, 250, 251, 0.8) !important;
}

/* Sticky menu animations */
#sticky-mobile-menu {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

#sticky-mobile-menu.translate-y-full {
    transform: translateY(100%);
}

#sticky-mobile-menu.translate-y-0 {
    transform: translateY(0);
}

/* Quick action buttons */
    #sticky-mobile-reset-btn,
    #sticky-mobile-scroll-top {
    transition: all 0.2s ease-in-out;
    position: relative;
    overflow: hidden;
}

    #sticky-mobile-reset-btn:hover,
    #sticky-mobile-scroll-top:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#sticky-mobile-scroll-top {
        background: linear-gradient(135deg, #b0a8fe, #c47e93);
}

#sticky-mobile-scroll-top:hover {
        background: linear-gradient(135deg, #c47e93, #b0a8fe);
}

/* Sticky search input focus effect */
#sticky-mobile-search:focus {
    transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(176, 168, 254, 0.15);
}

/* Mobile-specific adjustments */
@media (max-width: 1024px) {
    body {
            padding-bottom: 0;
            /* Remove any existing padding */
    }
    
    /* Ensure content doesn't get hidden behind sticky menu */
    .price-content {
        margin-bottom: 0;
    }
}

/* Sticky menu visibility states */
.sticky-menu-hidden {
    transform: translateY(100%) !important;
}

.sticky-menu-visible {
    transform: translateY(0) !important;
}

.search-results-item {
    animation: fadeInUp 0.3s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .service-item {
        padding: 1rem !important;
    }
}

@media (max-width: 768px) {
    .service-item {
        padding: 0.75rem !important;
    }
    
    .service-item h4 {
        font-size: 1rem !important;
    }
    
    .service-item .text-2xl {
        font-size: 1.5rem !important;
    }
    
    #mobile-search-results-container .service-item {
        padding: 1rem !important;
    }
    ß}
</style>