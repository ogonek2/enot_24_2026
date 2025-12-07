<div id="navbar" class="fixed px-6 top-0 left-0 w-full py-5 transition-transform duration-300 ease-in-out" style="z-index: 1000;">
    <div class="container mx-auto flex-col">
        <div class="flex items-center hidden md:flex lg:flex justify-between gap-5 mb-2">
            <div class="items-center gap-5 hidden lg:flex">
                <div class="text-sm text-text-gray">Ми в соціальних мережах</div>
                <div class="flex items-center gap-2">
                    <a href="https://instagram.com/enot24cleaner" target="_blank">
                        <i class="fab fa-instagram text-enot-pink text-2xl"></i>
                    </a>
                    <a href="https://t.me/enot24ServiceBot" target="_blank">
                        <i class="fab fa-telegram text-enot-pink text-2xl"></i>
                    </a>
                </div>
            </div>
                        <div class="relative group hidden md:block lg:block">
                            <button class="text-base leading-5 text-text-gray hover:text-nav-purple transition-colors duration-300 flex items-center gap-1">
                                <i class="fa-solid fa-location-dot text-enot-pink text-lg"></i>
                                <span>Адреси та графік роботи</span>
                            </button>
                            {{-- Information Dropdown --}}
                            <div class="absolute top-full left-0 mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <div class="p-4 space-y-3">
                                    <a href="{{ route('locations_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-primary/10 transition-colors duration-300">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-map-marker-alt text-green-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Всі локації</p>
                                            <p class="text-xs text-gray-500">Наші офіси</p>
                                        </div>
                                    </a>
                                    <a href="{{ route('delivery_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-primary/10 transition-colors duration-300">
                                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-truck text-purple-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Доставка та кур'єр</p>
                                            <p class="text-xs text-gray-500">Швидка доставка</p>
                                        </div>
                                    </a>
                                    <a href="{{ route('contacts_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-primary/10 transition-colors duration-300">
                                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-address-card text-orange-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Контакти</p>
                                            <p class="text-xs text-gray-500">Зв'яжіться з нами</p>
                                        </div>
                                    </a>
                                    <div class="pt-3 border-t border-gray-200">
                                        <p class="text-xs font-semibold text-gray-700 mb-2">Про нас</p>
                                        <p class="text-xs text-gray-600 mb-3">
                                            ЄНОТ 24 - професійна хімчистка одягу та домашнього текстилю.
                                        </p>
                                        <div class="flex gap-2">
                                            <a href="#" class="w-9 h-9 bg-blue-500 rounded-lg flex items-center justify-center text-white hover:bg-blue-600 transition-colors duration-300">
                                                <i class="fab fa-facebook-f text-sm"></i>
                                            </a>
                                            <a href="#" class="w-9 h-9 bg-blue-400 rounded-lg flex items-center justify-center text-white hover:bg-blue-500 transition-colors duration-300">
                                                <i class="fab fa-telegram text-sm"></i>
                                            </a>
                                            <a href="https://instagram.com/enot24cleaner" target="_blank" class="w-9 h-9 bg-pink-500 rounded-lg flex items-center justify-center text-white hover:bg-pink-600 transition-colors duration-300">
                                                <i class="fab fa-instagram text-sm"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <div class="flex items-center gap-2">
                {{-- Bots --}}
                <div class="relative group">
                    <button class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors duration-200">
                        <i class="fa-regular fa-comment-dots text-enot-pink text-2xl"></i>
                    </button>
                    {{-- Bots Dropdown --}}
                    <div class="absolute top-full right-0 mt-2 w-72 bg-white rounded-xl shadow-2xl border border-gray-200 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="p-4 space-y-3">
                            <div class="flex gap-2 mb-3">
                                <button onclick="switchDesktopBot('telegram')" id="desktop-bot-btn-telegram" class="desktop-bot-btn active flex-1 py-2 px-3 rounded-lg font-semibold text-xs transition-all duration-300 bg-primary text-white">
                                    <i class="fab fa-telegram mr-1"></i>Telegram
                                </button>
                                <button onclick="switchDesktopBot('viber')" id="desktop-bot-btn-viber" class="desktop-bot-btn flex-1 py-2 px-3 rounded-lg font-semibold text-xs transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300">
                                    <i class="fab fa-viber mr-1"></i>Viber
                                </button>
                            </div>
                            <div id="desktop-bot-content-telegram" class="desktop-bot-content">
                                <a href="https://t.me/enot24_bot" target="_blank" class="flex items-center justify-between p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-300 mb-2">
                                    <div class="flex items-center gap-2">
                                        <i class="fab fa-telegram text-blue-500"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">@enot24ServiceBot</p>
                                            <p class="text-xs text-gray-500">Основний бот</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-external-link-alt text-gray-400 text-xs"></i>
                                </a>
                                <a href="https://t.me/servisenot24" target="_blank" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-headset text-primary"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Підтримка</p>
                                            <p class="text-xs text-gray-500">Допомога та консультації</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-external-link-alt text-gray-400 text-xs"></i>
                                </a>
                            </div>
                            <div id="desktop-bot-content-viber" class="desktop-bot-content hidden">
                                <a href="viber://pa?chatURI=enot24" class="flex items-center justify-between p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-300">
                                    <div class="flex items-center gap-2">
                                        <i class="fab fa-viber text-purple-500"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">ЄНОТ 24</p>
                                            <p class="text-xs text-gray-500">Натисніть для відкриття</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-external-link-alt text-gray-400 text-xs"></i>
                                </a>
                                <div class="bg-gray-50 rounded-lg p-2 mt-2">
                                    <p class="text-xs text-gray-600">
                                        <i class="fas fa-info-circle text-primary mr-1"></i>
                                        Відкриється в додатку Viber
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Cart Icon Button - will be rendered by Vue component --}}
                <div id="cart-button-desktop"></div>
                {{-- Contacts Dropdown --}}
                <div class="relative group">
                    <a href="tel:0678872233" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                        <i class="fa-solid fa-caret-down text-enot-pink text-lg"></i>
                        <p class="font-inter font-semibold text-base text-text-gray">067 887 22 33</p>
                    </a>
                    {{-- Contacts Dropdown --}}
                    <div class="absolute top-full right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="p-4 space-y-3">
                            <a href="tel:0678872233" class="flex items-center gap-3 p-3 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-lg hover:from-primary/20 hover:to-secondary/20 transition-all duration-300">
                                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Телефон</p>
                                    <p class="font-bold text-base text-gray-900">067 887 22 33</p>
                                </div>
                            </a>
                            <a href="tel:0443372233" class="flex items-center gap-3 p-3 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-lg hover:from-primary/20 hover:to-secondary/20 transition-all duration-300">
                                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Телефон</p>
                                    <p class="font-bold text-base text-gray-900">044 337 22 33</p>
                                </div>
                            </a>
                            <a href="mailto:office.enot24@gmail.com" class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-gray-600"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Email</p>
                                    <p class="font-semibold text-sm text-gray-900">office.enot24@gmail.com</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between gap-5">
            {{-- Left Section - Logo --}}
            <div class="flex items-center gap-10">
                <a href="/" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                    <img src="{{ asset('storage/src/logo/full_logo.svg') }}" alt="ЄНОТ 24" class="w-40 h-10">
                </a>
            </div>

            {{-- Middle Section - Navigation Links (Desktop) --}}
            <div class="hidden xl:flex items-center gap-6">
                <nav>
                    <ul class="flex items-center gap-5">
                        <li>
                            <a href="{{ route('services') }}"
                                class="text-base leading-5 text-text-gray hover:text-nav-purple transition-colors duration-300">
                                Послуги та ціни
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('b2b_page') }}"
                                class="text-base leading-5 text-text-gray hover:text-nav-purple transition-colors duration-300">
                                B2B
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('promotions') }}"
                                class="text-base leading-5 text-text-gray hover:text-nav-purple transition-colors duration-300">
                                Акції
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('delivery_page') }}"
                                class="text-base leading-5 text-text-gray hover:text-nav-purple transition-colors duration-300">
                                Доставка та кур'єр
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacts_page') }}"
                                class="text-base leading-5 text-text-gray hover:text-nav-purple transition-colors duration-300">
                                Контакти
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- Right Section - Contact and CTA (Desktop) --}}
            <div class="hidden xl:flex items-center gap-3">
                <div class="relative">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="navbar-search" 
                                    placeholder="Пошук послуг..." 
                                    class="w-56 pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-nav-purple focus:border-transparent transition-all duration-200 text-sm bg-white"
                                    autocomplete="off">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <button 
                                    id="navbar-clear-search"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            {{-- Search Results Dropdown --}}
                            <div id="navbar-search-results" class="hidden absolute top-full left-0 mt-2 w-96 bg-white rounded-lg shadow-xl border border-gray-200 z-50 max-h-96 overflow-y-auto">
                                <div id="navbar-search-results-list" class="p-2"></div>
                                <div id="navbar-search-loading" class="hidden p-4 text-center text-gray-500">
                                    <i class="fas fa-spinner fa-spin"></i> Пошук...
                                </div>
                                <div id="navbar-search-no-results" class="hidden p-4 text-center text-gray-500">
                                    Нічого не знайдено
                                </div>
                            </div>
                </div>
                {{-- Consultation Button --}}
                <button
                    class="modal_fade bg-enot-pink p-2 px-6 rounded-full text-white"
                    data-modal="feedbackmd">
                    Консультація
                </button>
            </div>

            {{-- Mobile Burger Menu --}}
            <button id="mobile-menu-toggle" class="xl:hidden burger-btn flex flex-col items-center justify-center gap-1.5 w-10 h-10 relative" 
                aria-label="Toggle menu">
                <span class="burger-line burger-line-1 w-6 h-0.5 bg-text-gray transition-all duration-300 transform origin-center"></span>
                <span class="burger-line burger-line-2 w-6 h-0.5 bg-text-gray transition-all duration-300"></span>
                <span class="burger-line burger-line-3 w-6 h-0.5 bg-text-gray transition-all duration-300 transform origin-center"></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Overlay - Outside navbar container --}}
    <div id="mobile-menu-overlay" class="mobile-menu-overlay fixed inset-0 bg-black/50 z-[1001] hidden xl:hidden opacity-0 transition-opacity duration-300"></div>

    {{-- Mobile Menu - Outside navbar container --}}
    <div id="mobile-menu" class="mobile-menu fixed top-0 left-0 right-0 bottom-0 bg-white z-[1002] hidden xl:hidden transform translate-x-full transition-transform duration-300 ease-out overflow-y-auto">
            <div class="p-4">
                @php
                    try {
                        // Попытка получить категории с кешированием
                        $mobileCategories = \Illuminate\Support\Facades\Cache::remember('mobile_categories', 300, function() {
                            return \App\Models\Category::with(['services'])
                                ->whereHas('services')
                                ->orderBy('category_type')
                                ->orderBy('name')
                                ->get();
                        });
                    } catch (\Exception $e) {
                        // Если произошла ошибка (таймаут, недоступность БД), используем пустой массив
                        \Log::error('Error loading categories in navigator: ' . $e->getMessage());
                        $mobileCategories = collect([]);
                    }
                @endphp

                {{-- Mobile Menu Header with Close Button --}}
                <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900">Меню</h2>
                    <div class="flex items-center gap-2">
                        {{-- Cart Icon in Mobile Menu - will be rendered by Vue component --}}
                        <div id="cart-button-mobile"></div>
                        <button onclick="toggleMobileMenu()" class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors duration-200 text-gray-600 hover:text-gray-900" aria-label="Закрити меню">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                {{-- Tabs Navigation --}}
                <div class="flex border-b border-gray-200 mb-4 overflow-x-auto">
                    <button onclick="switchMobileTab('navigation')" class="mobile-tab-btn active px-4 py-3 text-sm font-semibold text-gray-700 whitespace-nowrap border-b-2 border-primary transition-colors duration-200" data-tab="navigation">
                        <i class="fas fa-map mr-2"></i>Навігація
                    </button>
                    <button onclick="switchMobileTab('services')" class="mobile-tab-btn px-4 py-3 text-sm font-semibold text-gray-500 whitespace-nowrap border-b-2 border-transparent hover:text-gray-700 transition-colors duration-200" data-tab="services">
                        <i class="fas fa-list mr-2"></i>Послуги
                    </button>
                    <button onclick="switchMobileTab('info')" class="mobile-tab-btn px-4 py-3 text-sm font-semibold text-gray-500 whitespace-nowrap border-b-2 border-transparent hover:text-gray-700 transition-colors duration-200" data-tab="info">
                        <i class="fas fa-info-circle mr-2"></i>Інформація
                    </button>
                    <button onclick="switchMobileTab('bots')" class="mobile-tab-btn px-4 py-3 text-sm font-semibold text-gray-500 whitespace-nowrap border-b-2 border-transparent hover:text-gray-700 transition-colors duration-200" data-tab="bots">
                        <i class="fas fa-robot mr-2"></i>Боти
                    </button>
                    <button onclick="switchMobileTab('contacts')" class="mobile-tab-btn px-4 py-3 text-sm font-semibold text-gray-500 whitespace-nowrap border-b-2 border-transparent hover:text-gray-700 transition-colors duration-200" data-tab="contacts">
                        <i class="fas fa-phone mr-2"></i>Контакти
                    </button>
                </div>

                {{-- Tab Content: Navigation --}}
                <div id="mobile-tab-navigation" class="mobile-tab-content">
                    <div class="space-y-2">
                        <a href="{{ route('services') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/10 transition-colors duration-300">
                            <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-th-list text-primary"></i>
                            </div>
                            <span class="font-semibold text-gray-700">Всі послуги та ціни</span>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>
                        <a href="{{ route('promotions') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/10 transition-colors duration-300">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gift text-red-500"></i>
                            </div>
                            <span class="font-semibold text-gray-700">Акції</span>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>
                        <a href="{{ route('b2b_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/10 transition-colors duration-300">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-briefcase text-blue-500"></i>
                            </div>
                            <span class="font-semibold text-gray-700">B2B</span>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>
                        <a href="{{ route('locations_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/10 transition-colors duration-300">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-green-500"></i>
                            </div>
                            <span class="font-semibold text-gray-700">Локації</span>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>
                        <a href="{{ route('delivery_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/10 transition-colors duration-300">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-purple-500"></i>
                            </div>
                            <span class="font-semibold text-gray-700">Доставка та кур'єр</span>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>
                        <a href="{{ route('contacts_page') }}" class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl hover:bg-primary/10 transition-colors duration-300">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-address-card text-orange-500"></i>
                            </div>
                            <span class="font-semibold text-gray-700">Контакти</span>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>
                    </div>
                </div>

                {{-- Tab Content: Services --}}
                <div id="mobile-tab-services" class="mobile-tab-content hidden">
                    {{-- Search --}}
                    <div class="mb-4">
                        <div class="relative">
                            <input 
                                type="text" 
                                id="mobile-navbar-search" 
                                placeholder="Пошук послуг..." 
                                class="w-full pl-10 pr-4 py-2.5 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 text-sm bg-gray-50 focus:bg-white"
                                autocomplete="off">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <button 
                                id="mobile-navbar-clear-search"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        {{-- Mobile Search Results --}}
                        <div id="mobile-navbar-search-results" class="hidden mt-2 w-full bg-white rounded-lg shadow-xl border border-gray-200 z-50 max-h-64 overflow-y-auto">
                            <div id="mobile-navbar-search-results-list" class="p-2"></div>
                            <div id="mobile-navbar-search-loading" class="hidden p-4 text-center text-gray-500">
                                <i class="fas fa-spinner fa-spin"></i> Пошук...
                            </div>
                            <div id="mobile-navbar-search-no-results" class="hidden p-4 text-center text-gray-500">
                                Нічого не знайдено
                            </div>
                        </div>
                    </div>

                    {{-- Categories Grid --}}
                    <div class="grid grid-cols-2 gap-3">
                        @if($mobileCategories && $mobileCategories->count() > 0)
                            @foreach($mobileCategories as $category)
                            <a href="{{ route('category_page', $category->href) }}" 
                               class="flex flex-col items-center p-4 bg-gray-50 rounded-xl hover:bg-primary/10 transition-all duration-300 group">
                                @if($category->category_img)
                                    <img src="{{ asset('storage/' . $category->category_img) }}" 
                                         alt="{{ $category->name }}" 
                                         class="w-12 h-12 object-contain mb-2 group-hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center mb-2 group-hover:bg-primary/30 transition-colors duration-300">
                                        <i class="fas fa-tag text-primary text-xl"></i>
                                    </div>
                                @endif
                                <span class="text-xs font-semibold text-gray-700 text-center group-hover:text-primary transition-colors duration-300 line-clamp-2">
                                    {{ $category->name }}
                                </span>
                                @if($category->services->count() > 0)
                                    <span class="text-xs text-gray-400 mt-1">{{ $category->services->count() }} послуг</span>
                                @endif
                            </a>
                            @endforeach
                        @else
                            <div class="col-span-2 text-center py-4 text-gray-500 text-sm">
                                Категорії тимчасово недоступні
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Tab Content: Information --}}
                <div id="mobile-tab-info" class="mobile-tab-content hidden">
                    <div class="space-y-4">
                        {{-- Locations --}}
                        <div class="bg-gray-50 rounded-xl p-4">
                            <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                Локації
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('locations_page') }}" class="flex items-center justify-between p-2 bg-white rounded-lg hover:bg-primary/10 transition-colors duration-300">
                                    <span class="text-sm font-semibold text-gray-700">Всі локації</span>
                                    <i class="fas fa-arrow-right text-gray-400"></i>
                                </a>
                            </div>
                        </div>

                        {{-- Services Info --}}
                        <div class="bg-gray-50 rounded-xl p-4">
                            <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i class="fas fa-info-circle text-primary"></i>
                                Про нас
                            </h3>
                            <p class="text-sm text-gray-600 mb-3">
                                ЄНОТ 24 - професійна хімчистка одягу та домашнього текстилю. Ми надаємо якісні послуги з дотриманням всіх стандартів.
                            </p>
                            <a href="{{ route('delivery_page') }}" class="inline-flex items-center gap-2 text-primary font-semibold text-sm">
                                <i class="fas fa-truck"></i>
                                Доставка та кур'єр
                            </a>
                        </div>

                        {{-- Social Links --}}
                        <div class="bg-gray-50 rounded-xl p-4">
                            <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i class="fas fa-share-alt text-primary"></i>
                                Соціальні мережі
                            </h3>
                            <div class="flex gap-3">
                                <a href="#" class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white hover:bg-blue-600 transition-colors duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-blue-400 rounded-xl flex items-center justify-center text-white hover:bg-blue-500 transition-colors duration-300">
                                    <i class="fab fa-telegram"></i>
                                </a>
                                <a href="https://instagram.com/enot24cleaner" target="_blank" class="w-12 h-12 bg-pink-500 rounded-xl flex items-center justify-center text-white hover:bg-pink-600 transition-colors duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tab Content: Bots --}}
                <div id="mobile-tab-bots" class="mobile-tab-content hidden">
                    <div class="space-y-4">
                        {{-- Bot Switcher --}}
                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex gap-2 mb-4">
                                <button onclick="switchBot('telegram')" id="bot-btn-telegram" class="bot-switcher-btn active flex-1 py-3 px-4 rounded-lg font-semibold text-sm transition-all duration-300 bg-primary text-white">
                                    <i class="fab fa-telegram mr-2"></i>Telegram
                                </button>
                                <button onclick="switchBot('viber')" id="bot-btn-viber" class="bot-switcher-btn flex-1 py-3 px-4 rounded-lg font-semibold text-sm transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300">
                                    <i class="fab fa-viber mr-2"></i>Viber
                                </button>
                            </div>

                            {{-- Telegram Bot Content --}}
                            <div id="bot-content-telegram" class="bot-content">
                                <div class="bg-white rounded-lg p-4 space-y-3">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-16 h-16 bg-blue-400 rounded-xl flex items-center justify-center">
                                            <i class="fab fa-telegram text-white text-2xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Telegram бот</h4>
                                            <p class="text-xs text-gray-500">Швидкий доступ до послуг</p>
                                        </div>
                                    </div>
                                    <a href="https://t.me/enot24_bot" target="_blank" class="flex items-center justify-between p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-300">
                                        <div class="flex items-center gap-3">
                                            <i class="fab fa-telegram text-blue-500 text-xl"></i>
                                            <div>
                                                <p class="font-semibold text-gray-900">@enot24_bot</p>
                                                <p class="text-xs text-gray-500">Основний бот</p>
                                            </div>
                                        </div>
                                        <i class="fas fa-external-link-alt text-gray-400"></i>
                                    </a>
                                    <a href="https://t.me/servisenot24" target="_blank" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center gap-3">
                                            <i class="fas fa-headset text-primary text-xl"></i>
                                            <div>
                                                <p class="font-semibold text-gray-900">Підтримка</p>
                                                <p class="text-xs text-gray-500">Допомога та консультації</p>
                                            </div>
                                        </div>
                                        <i class="fas fa-external-link-alt text-gray-400"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Viber Bot Content --}}
                            <div id="bot-content-viber" class="bot-content hidden">
                                <div class="bg-white rounded-lg p-4 space-y-3">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center">
                                            <i class="fab fa-viber text-white text-2xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Viber бот</h4>
                                            <p class="text-xs text-gray-500">Зручний спосіб замовити послуги</p>
                                        </div>
                                    </div>
                                    <a href="viber://pa?chatURI=enot24" class="flex items-center justify-between p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-300">
                                        <div class="flex items-center gap-3">
                                            <i class="fab fa-viber text-purple-500 text-xl"></i>
                                            <div>
                                                <p class="font-semibold text-gray-900">ЄНОТ 24</p>
                                                <p class="text-xs text-gray-500">Натисніть для відкриття</p>
                                            </div>
                                        </div>
                                        <i class="fas fa-external-link-alt text-gray-400"></i>
                                    </a>
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        <p class="text-xs text-gray-600">
                                            <i class="fas fa-info-circle text-primary mr-1"></i>
                                            Відкриється в додатку Viber, якщо він встановлений на вашому пристрої
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tab Content: Contacts --}}
                <div id="mobile-tab-contacts" class="mobile-tab-content hidden">
                    <div class="space-y-4">
                        {{-- Phone --}}
                        <a href="tel:0678872233" class="flex items-center gap-4 p-4 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl hover:from-primary/20 hover:to-secondary/20 transition-all duration-300">
                            <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Телефон</p>
                                <p class="font-bold text-lg text-gray-900">067 887 2233</p>
                            </div>
                            <i class="fas fa-phone-alt ml-auto text-primary"></i>
                        </a>
                        <a href="tel:0443372233" class="flex items-center gap-4 p-4 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl hover:from-primary/20 hover:to-secondary/20 transition-all duration-300">
                            <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Телефон</p>
                                <p class="font-bold text-lg text-gray-900">044 337 22 33</p>
                            </div>
                            <i class="fas fa-phone-alt ml-auto text-primary"></i>
                        </a>

                        {{-- Email --}}
                        <a href="mailto:office.enot24@gmail.com" class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                            <div class="w-12 h-12 bg-gray-200 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-gray-600 text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Email</p>
                                <p class="font-semibold text-gray-900">office.enot24@gmail.com</p>
                            </div>
                            <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
                        </a>

                        {{-- Consultation Button --}}
                        <button
                            class="w-full modal_fade flex items-center justify-center gap-3 py-4 px-6 text-white rounded-xl font-semibold text-base transition-all duration-300 hover:opacity-90 transform hover:scale-105"
                            style="background-color: #7470BF;"
                            data-modal="feedbackmd"
                            onclick="toggleMobileMenu()">
                            <i class="fas fa-comments"></i>
                            Консультація
                        </button>

                        {{-- Social Links --}}
                        <div class="pt-4 border-t border-gray-200">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Соціальні мережі</p>
                            <div class="flex gap-3">
                                <a href="#" class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white hover:bg-blue-600 transition-colors duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-12 h-12 bg-blue-400 rounded-xl flex items-center justify-center text-white hover:bg-blue-500 transition-colors duration-300">
                                    <i class="fab fa-telegram"></i>
                                </a>
                                <a href="https://instagram.com/enot24cleaner" target="_blank" class="w-12 h-12 bg-pink-500 rounded-xl flex items-center justify-center text-white hover:bg-pink-600 transition-colors duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="h-20 py-10 lg:py-12 w-full"></div>

<script>
(function() {
    // Desktop search elements
    const navbarSearchInput = document.getElementById('navbar-search');
    const navbarClearBtn = document.getElementById('navbar-clear-search');
    const navbarResultsContainer = document.getElementById('navbar-search-results');
    const navbarResultsList = document.getElementById('navbar-search-results-list');
    const navbarLoading = document.getElementById('navbar-search-loading');
    const navbarNoResults = document.getElementById('navbar-search-no-results');

    // Mobile search elements
    const mobileNavbarSearchInput = document.getElementById('mobile-navbar-search');
    const mobileNavbarClearBtn = document.getElementById('mobile-navbar-clear-search');
    const mobileNavbarResultsContainer = document.getElementById('mobile-navbar-search-results');
    const mobileNavbarResultsList = document.getElementById('mobile-navbar-search-results-list');
    const mobileNavbarLoading = document.getElementById('mobile-navbar-search-loading');
    const mobileNavbarNoResults = document.getElementById('mobile-navbar-search-no-results');

    let searchTimeout;
    const DEBOUNCE_DELAY = 300;

    // Initialize search for desktop
    if (navbarSearchInput) {
        navbarSearchInput.addEventListener('input', (e) => {
            handleSearch(e.target.value, false);
        });

        navbarSearchInput.addEventListener('focus', () => {
            if (navbarSearchInput.value.trim().length > 0) {
                handleSearch(navbarSearchInput.value, false);
            }
        });

        if (navbarClearBtn) {
            navbarClearBtn.addEventListener('click', () => {
                clearSearch(false);
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#navbar-search') && !e.target.closest('#navbar-search-results')) {
                hideResults(false);
            }
        });
    }

    // Initialize search for mobile
    if (mobileNavbarSearchInput) {
        mobileNavbarSearchInput.addEventListener('input', (e) => {
            handleSearch(e.target.value, true);
        });

        mobileNavbarSearchInput.addEventListener('focus', () => {
            if (mobileNavbarSearchInput.value.trim().length > 0) {
                handleSearch(mobileNavbarSearchInput.value, true);
            }
        });

        if (mobileNavbarClearBtn) {
            mobileNavbarClearBtn.addEventListener('click', () => {
                clearSearch(true);
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#mobile-navbar-search') && !e.target.closest('#mobile-navbar-search-results')) {
                hideResults(true);
            }
        });
    }

    function handleSearch(query, isMobile) {
        const searchInput = isMobile ? mobileNavbarSearchInput : navbarSearchInput;
        const clearBtn = isMobile ? mobileNavbarClearBtn : navbarClearBtn;
        
        query = query.trim();

        // Show/hide clear button
        if (clearBtn) {
            if (query.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
        }

        // Clear previous timeout
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        // Hide results if query is empty
        if (query.length < 1) {
            hideResults(isMobile);
            return;
        }

        // Show loading state
        showLoading(isMobile);

        // Debounce search
        searchTimeout = setTimeout(() => {
            performNavbarSearch(query, isMobile);
        }, DEBOUNCE_DELAY);
    }

    function performNavbarSearch(query, isMobile) {
        const params = new URLSearchParams({
            q: query
            // No category or group filters - search all services
        });

        fetch(`/api/search-services?${params}`)
            .then(response => response.json())
            .then(data => {
                hideLoading(isMobile);
                displayNavbarResults(data, isMobile);
            })
            .catch(error => {
                console.error('Navbar search error:', error);
                hideLoading(isMobile);
                showNoResults(isMobile);
            });
    }

    function displayNavbarResults(data, isMobile) {
        const resultsList = isMobile ? mobileNavbarResultsList : navbarResultsList;
        const resultsContainer = isMobile ? mobileNavbarResultsContainer : navbarResultsContainer;
        const noResults = isMobile ? mobileNavbarNoResults : navbarNoResults;

        if (!resultsList || !resultsContainer) return;

        if (data.services.length === 0) {
            showNoResults(isMobile);
            return;
        }

        // Hide no results message
        if (noResults) {
            noResults.classList.add('hidden');
        }

        // Build results HTML (limit to 10 results)
        let resultsHTML = '';
        const servicesToShow = data.services.slice(0, 10);
        
        servicesToShow.forEach((service) => {
            const category = service.categories && service.categories.length > 0 
                ? (typeof service.categories[0] === 'object' ? service.categories[0].name : service.categories[0])
                : 'Послуга';
            
            const categoryHref = service.categories && service.categories.length > 0 && typeof service.categories[0] === 'object'
                ? service.categories[0].href
                : '';

            const price = service.price ? Number(service.price).toLocaleString('uk-UA') : '0';
            
            resultsHTML += `
                <a href="${categoryHref ? `/poslugi-ta-cini/${categoryHref}` : '#services'}" 
                   class="block p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200 border-b border-gray-100 last:border-b-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-800 truncate">
                                ${escapeHtml(service.name)}
                            </h4>
                            <p class="text-xs text-gray-500 mt-1">${escapeHtml(category)}</p>
                        </div>
                        <div class="flex-shrink-0 text-right">
                            <span class="text-sm font-bold text-primary">${price} грн</span>
                        </div>
                    </div>
                </a>
            `;
        });

        // Show total count if more than 10
        if (data.services.length > 10) {
            resultsHTML += `
                <div class="p-3 text-center border-t border-gray-200">
                    <a href="/poslugi-ta-cini#services" class="text-sm text-primary hover:underline">
                        Показати всі ${data.total} результатів
                    </a>
                </div>
            `;
        }

        resultsList.innerHTML = resultsHTML;
        resultsContainer.classList.remove('hidden');
    }

    function showLoading(isMobile) {
        const loading = isMobile ? mobileNavbarLoading : navbarLoading;
        const resultsContainer = isMobile ? mobileNavbarResultsContainer : navbarResultsContainer;
        const resultsList = isMobile ? mobileNavbarResultsList : navbarResultsList;
        const noResults = isMobile ? mobileNavbarNoResults : navbarNoResults;

        if (loading) loading.classList.remove('hidden');
        if (resultsList) resultsList.innerHTML = '';
        if (noResults) noResults.classList.add('hidden');
        if (resultsContainer) resultsContainer.classList.remove('hidden');
    }

    function hideLoading(isMobile) {
        const loading = isMobile ? mobileNavbarLoading : navbarLoading;
        if (loading) loading.classList.add('hidden');
    }

    function showNoResults(isMobile) {
        const noResults = isMobile ? mobileNavbarNoResults : navbarNoResults;
        const resultsContainer = isMobile ? mobileNavbarResultsContainer : navbarResultsContainer;
        const resultsList = isMobile ? mobileNavbarResultsList : navbarResultsList;
        const loading = isMobile ? mobileNavbarLoading : navbarLoading;

        if (resultsList) resultsList.innerHTML = '';
        if (loading) loading.classList.add('hidden');
        if (noResults) noResults.classList.remove('hidden');
        if (resultsContainer) resultsContainer.classList.remove('hidden');
    }

    function hideResults(isMobile) {
        const resultsContainer = isMobile ? mobileNavbarResultsContainer : navbarResultsContainer;
        if (resultsContainer) resultsContainer.classList.add('hidden');
    }

    function clearSearch(isMobile) {
        const searchInput = isMobile ? mobileNavbarSearchInput : navbarSearchInput;
        const clearBtn = isMobile ? mobileNavbarClearBtn : navbarClearBtn;

        if (searchInput) searchInput.value = '';
        if (clearBtn) clearBtn.classList.add('hidden');
        hideResults(isMobile);
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
})();
</script>

<script>
(function() {
    // Hide/show navbar on scroll
    const navbar = document.getElementById('navbar');
    let lastScrollTop = 0;
    let scrollThreshold = 10; // Minimum scroll distance to trigger hide/show
    let isNavbarVisible = true;
    let ticking = false;

    function handleScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollDifference = Math.abs(scrollTop - lastScrollTop);

                // Only trigger if scroll difference is significant
                if (scrollDifference > scrollThreshold) {
                    if (scrollTop > lastScrollTop && scrollTop > 100) {
                        // Scrolling down - hide navbar
                        if (isNavbarVisible) {
                            navbar.style.transform = 'translateY(-100%)';
                            isNavbarVisible = false;
                        }
                    } else if (scrollTop < lastScrollTop) {
                        // Scrolling up - show navbar
                        if (!isNavbarVisible) {
                            navbar.style.transform = 'translateY(0)';
                            navbar.style.backgroundColor = '#ffffff'; // Белый фон при появлении
                            isNavbarVisible = true;
                        }
                    }
                    
                    // Если навигатор виден и мы не в самом верху - добавляем белый фон
                    if (isNavbarVisible && scrollTop > 0) {
                        navbar.style.backgroundColor = '#ffffff';
                    } else if (scrollTop <= 0) {
                        // В самом верху страницы - убираем фон (или возвращаем исходный)
                        navbar.style.backgroundColor = '';
                    }
                    
                    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                }

                ticking = false;
            });

            ticking = true;
        }
    }

    // Listen to scroll events
    window.addEventListener('scroll', handleScroll, { passive: true });

    // Show navbar when at the top of the page
    window.addEventListener('scroll', () => {
        if (window.pageYOffset <= 0) {
            navbar.style.transform = 'translateY(0)';
            navbar.style.backgroundColor = ''; // Убираем белый фон в самом верху
            isNavbarVisible = true;
        } else if (isNavbarVisible) {
            // Если навигатор виден и мы не в самом верху - добавляем белый фон
            navbar.style.backgroundColor = '#ffffff';
        }
    }, { passive: true });

    // Устанавливаем отступ для контента в зависимости от высоты навбара
    function updateContentPadding() {
        const navbar = document.getElementById('navbar');
        const content = document.querySelector('.app-container-elements');
        
        if (navbar && content) {
            const navbarHeight = navbar.offsetHeight;
            content.style.paddingTop = (navbarHeight + 20) + 'px';
        }
    }

    // Вызываем при загрузке и изменении размера окна
    updateContentPadding();
    window.addEventListener('resize', updateContentPadding);
    
    // Также обновляем после небольшой задержки, чтобы убедиться что все загружено
    setTimeout(updateContentPadding, 100);
    setTimeout(updateContentPadding, 500);
})();
</script>

<script>
// Mobile Menu Toggle Functions - Declare FIRST to make them available globally immediately
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('mobile-menu-overlay');
    const burgerBtn = document.getElementById('mobile-menu-toggle');
    const body = document.body;
    
    if (!menu || !overlay || !burgerBtn) {
        console.error('Mobile menu elements not found', {menu, overlay, burgerBtn});
        return;
    }
    
    const isOpen = menu.classList.contains('open') || menu.style.display === 'block';
    
    if (isOpen) {
        // Close menu
        menu.classList.remove('open');
        overlay.classList.remove('open');
        burgerBtn.classList.remove('active');
        body.classList.remove('mobile-menu-open');
        menu.style.transform = 'translateX(100%)';
        
        setTimeout(() => {
            menu.classList.add('hidden');
            overlay.classList.add('hidden');
            menu.style.display = 'none';
            overlay.style.display = 'none';
            menu.style.transform = '';
            overlay.style.opacity = '';
        }, 300);
    } else {
        // Open menu
        overlay.classList.remove('hidden');
        overlay.style.display = 'block';
        menu.classList.remove('hidden');
        menu.style.display = 'block';
        menu.style.transform = 'translateX(100%)';
        overlay.style.opacity = '0';
        
        // Force reflow
        void menu.offsetHeight;
        void overlay.offsetHeight;
        
        // Trigger animation
        setTimeout(() => {
            overlay.classList.add('open');
            overlay.style.opacity = '1';
            menu.classList.add('open');
            menu.style.transform = 'translateX(0)';
            burgerBtn.classList.add('active');
            body.classList.add('mobile-menu-open');
        }, 10);
    }
}

// Switch Mobile Tab
function switchMobileTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.mobile-tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Remove active class from all buttons
    document.querySelectorAll('.mobile-tab-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.add('text-gray-500');
        btn.classList.remove('text-gray-700');
        btn.classList.add('border-transparent');
        btn.classList.remove('border-primary');
    });
    
    // Show selected tab
    const selectedTab = document.getElementById('mobile-tab-' + tabName);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }
    
    // Add active class to selected button
    const selectedBtn = document.querySelector(`[data-tab="${tabName}"]`);
    if (selectedBtn) {
        selectedBtn.classList.add('active');
        selectedBtn.classList.remove('text-gray-500');
        selectedBtn.classList.add('text-gray-700');
        selectedBtn.classList.remove('border-transparent');
        selectedBtn.classList.add('border-primary');
    }
}

// Switch Bot (Telegram/Viber)
function switchBot(botType) {
    // Hide all bot contents
    document.querySelectorAll('.bot-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Remove active class from all bot buttons
    document.querySelectorAll('.bot-switcher-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.remove('bg-primary', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    
    // Show selected bot content
    const selectedContent = document.getElementById('bot-content-' + botType);
    if (selectedContent) {
        selectedContent.classList.remove('hidden');
    }
    
    // Add active class to selected button
    const selectedBtn = document.getElementById('bot-btn-' + botType);
    if (selectedBtn) {
        selectedBtn.classList.add('active');
        selectedBtn.classList.remove('bg-gray-200', 'text-gray-700');
        selectedBtn.classList.add('bg-primary', 'text-white');
    }
}

// Switch Desktop Bot (Telegram/Viber)
function switchDesktopBot(botType) {
    // Hide all bot contents
    document.querySelectorAll('.desktop-bot-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Remove active class from all bot buttons
    document.querySelectorAll('.desktop-bot-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.remove('bg-primary', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    
    // Show selected bot content
    const selectedContent = document.getElementById('desktop-bot-content-' + botType);
    if (selectedContent) {
        selectedContent.classList.remove('hidden');
    }
    
    // Add active class to selected button
    const selectedBtn = document.getElementById('desktop-bot-btn-' + botType);
    if (selectedBtn) {
        selectedBtn.classList.add('active');
        selectedBtn.classList.remove('bg-gray-200', 'text-gray-700');
        selectedBtn.classList.add('bg-primary', 'text-white');
    }
}

// Make functions globally available IMMEDIATELY
window.toggleMobileMenu = toggleMobileMenu;
window.switchMobileTab = switchMobileTab;
window.switchBot = switchBot;
window.switchDesktopBot = switchDesktopBot;

// Initialize mobile menu - both DOMContentLoaded and immediate execution
function initMobileMenu() {
    const burgerBtn = document.getElementById('mobile-menu-toggle');
    const overlay = document.getElementById('mobile-menu-overlay');
    const menu = document.getElementById('mobile-menu');
    
    if (burgerBtn) {
        // Remove any existing listeners by cloning
        const newBtn = burgerBtn.cloneNode(true);
        burgerBtn.parentNode.replaceChild(newBtn, burgerBtn);
        
        newBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMobileMenu();
        });
    }
    
    if (overlay) {
        overlay.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleMobileMenu();
        });
    }
    
    if (menu) {
        menu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
    
    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const menu = document.getElementById('mobile-menu');
            if (menu && (menu.classList.contains('open') || menu.style.display === 'block')) {
                toggleMobileMenu();
            }
        }
    });
}

// Try to initialize immediately and also on DOMContentLoaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
} else {
    initMobileMenu();
}
</script>

<style>
/* Burger Menu Animation */
.burger-btn.active .burger-line-1 {
    transform: rotate(45deg) translate(5px, 5px);
}

.burger-btn.active .burger-line-2 {
    opacity: 0;
}

.burger-btn.active .burger-line-3 {
    transform: rotate(-45deg) translate(7px, -6px);
}

/* Mobile Menu Styles */
#mobile-menu {
    display: none !important;
    position: fixed !important;
    top:0;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    width: 100vw !important;
    height: 100vh;
    background: white !important;
    z-index: 1002 !important;
    transform: translateX(100%) !important;
    transition: transform 0.3s ease-out !important;
}

#mobile-menu.open {
    display: block !important;
    transform: translateX(0) !important;
}

#mobile-menu-overlay {
    display: none !important;
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    background: rgba(0, 0, 0, 0.5) !important;
    z-index: 1001 !important;
    opacity: 0 !important;
    transition: opacity 0.3s ease-out !important;
}

#mobile-menu-overlay.open {
    display: block !important;
    opacity: 1 !important;
}

body.mobile-menu-open {
    overflow: hidden;
}

/* Mobile Tab Styles */
.mobile-tab-content {
    display: block;
}

.mobile-tab-content.hidden {
    display: none !important;
}

.mobile-tab-btn.active {
    color: #7470BF !important;
    border-bottom-color: #7470BF !important;
}

/* Bot Switcher Styles */
.bot-content {
    display: block;
}

.bot-content.hidden {
    display: none !important;
}

.bot-switcher-btn.active {
    background-color: #7470BF !important;
    color: white !important;
}

/* Desktop Dropdown Styles */
.desktop-bot-content {
    display: block;
}

.desktop-bot-content.hidden {
    display: none !important;
}

.desktop-bot-btn.active {
    background-color: #7470BF !important;
    color: white !important;
}

/* Keep dropdowns open on hover */
.group:hover .group-hover\:opacity-100 {
    opacity: 1 !important;
}

.group:hover .group-hover\:visible {
    visibility: visible !important;
}
</style>