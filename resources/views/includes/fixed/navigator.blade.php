<!-- Simple Navigation Bar -->
<nav id="main-navbar"
    style="
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    border-bottom: 1px solid #e5e7eb;
">
    <div class="container mx-auto px-4"
        style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 70px;
    ">
        <!-- Logo -->
        <div style="display: flex; align-items: center;">
            <a href="/"
                style="
                display: flex;
                align-items: center;
                text-decoration: none;
                color: #1f2937;
                font-weight: bold;
                font-size: 20px;
            ">
                <img src="{{ asset('storage/source/logo_hear.svg') }}" alt="Logo" class="w-auto h-12">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <div id="desktop-nav"
            style="
            display: none;
            align-items: center;
            gap: 30px;
        ">
            <a href="{{ route('services') }}"
                style="
                color: #6b7280;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            "
                onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#6b7280'">
                Послуги та ціни
            </a>
            <a href="{{ route('b2b_page') }}"
                style="
                color: #6b7280;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            "
                onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#6b7280'">
                B2B
            </a>
            <a href="{{ route('delivery_page') }}"
                style="
                color: #6b7280;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            "
                onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#6b7280'">
                Доставка
            </a>
            <a href="{{ route('courier_page') }}"
                style="
                color: #6b7280;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            "
                onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#6b7280'">
                Викликати кур'єра
            </a>
            <!-- Search Field -->
            <div class="relative">
                <input type="text" id="nav-service-search" placeholder="Пошук послуг..."
                    class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 text-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>

                <!-- Search Results Dropdown -->
                <div id="nav-search-results"
                    class="absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-50 hidden max-h-96 overflow-y-auto">
                    <div id="nav-search-results-list" class="divide-y divide-gray-200">
                        <!-- Search results will be populated here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Side -->
        <div style="display: flex; align-items: center; gap: 20px;">
            <!-- Phone (Desktop) -->
            <div id="desktop-phone"
                style="
                display: none;
                align-items: center;
                gap: 8px;
                color: #6b7280;
            ">
                <i class="fas fa-phone" style="color: #3b82f6;"></i>
                <span style="font-weight: 500;">+38 (xxx) xxx-xx-xx</span>
            </div>

            <!-- CTA Button (Desktop) -->
            <button id="desktop-cta" class="modal_fade gradient-button" data-modal="feedbackmd"
                style="
                display: none;
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s;
                box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            "
                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                Замовити чистку
            </button>

            <!-- Mobile Menu Button -->
            <button id="nav-burger-toggle" class="nav-burger-btn"
                style="
                display: block;
                background: none;
                border: none;
                cursor: pointer;
                padding: 8px;
                color: #6b7280;
                outline: none;
            ">
                <div class="nav-burger-icon" style="width: 24px; height: 18px; position: relative;">
                    <span class="nav-burger-bar nav-burger-bar-1"
                        style="
                        display: block;
                        width: 100%;
                        height: 2px;
                        background: currentColor;
                        position: absolute;
                        top: 0;
                        transition: all 0.3s ease;
                    "></span>
                    <span class="nav-burger-bar nav-burger-bar-2"
                        style="
                        display: block;
                        width: 100%;
                        height: 2px;
                        background: currentColor;
                        position: absolute;
                        top: 8px;
                        transition: all 0.3s ease;
                    "></span>
                    <span class="nav-burger-bar nav-burger-bar-3"
                        style="
                        display: block;
                        width: 100%;
                        height: 2px;
                        background: currentColor;
                        position: absolute;
                        top: 16px;
                        transition: all 0.3s ease;
                    "></span>
                </div>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="nav-mobile-panel" class="nav-mobile-menu"
    style="
    position: fixed;
    top: 70px;
    left: 0;
    right: 0;
    background: white;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid #e5e7eb;
    z-index: 9999;
    transform: translateY(-100%);
    transition: transform 0.3s ease;
    max-height: calc(100vh - 70px);
    overflow-y: auto;
    opacity: 0;
    visibility: hidden;
">
    <div style="padding: 30px 20px;">
        <!-- Navigation Links -->
        <div style="margin-bottom: 30px;">
            <a href="{{ route('services') }}"
                style="
                display: block;
                padding: 15px 20px;
                color: #374151;
                text-decoration: none;
                border-radius: 10px;
                margin-bottom: 10px;
                transition: all 0.2s;
                background: #f9fafb;
            "
                onmouseover="this.style.background='#e5e7eb'; this.style.color='#3b82f6'"
                onmouseout="this.style.background='#f9fafb'; this.style.color='#374151'">
                <i class="fas fa-list" style="margin-right: 15px; color: #3b82f6;"></i>
                Послуги та ціни
            </a>
            <a href="{{ route('b2b_page') }}"
                style="
                display: block;
                padding: 15px 20px;
                color: #374151;
                text-decoration: none;
                border-radius: 10px;
                margin-bottom: 10px;
                transition: all 0.2s;
                background: #f9fafb;
            "
                onmouseover="this.style.background='#e5e7eb'; this.style.color='#3b82f6'"
                onmouseout="this.style.background='#f9fafb'; this.style.color='#374151'">
                <i class="fas fa-building" style="margin-right: 15px; color: #3b82f6;"></i>
                B2B
            </a>
            <a href="{{ route('delivery_page') }}"
                style="
                display: block;
                padding: 15px 20px;
                color: #374151;
                text-decoration: none;
                border-radius: 10px;
                margin-bottom: 10px;
                transition: all 0.2s;
                background: #f9fafb;
            "
                onmouseover="this.style.background='#e5e7eb'; this.style.color='#3b82f6'"
                onmouseout="this.style.background='#f9fafb'; this.style.color='#374151'">
                <i class="fas fa-truck" style="margin-right: 15px; color: #3b82f6;"></i>
                Доставка
            </a>
            <a href="{{ route('courier_page') }}"
                style="
                display: block;
                padding: 15px 20px;
                color: #374151;
                text-decoration: none;
                border-radius: 10px;
                margin-bottom: 10px;
                transition: all 0.2s;
                background: #f9fafb;
            "
                onmouseover="this.style.background='#e5e7eb'; this.style.color='#3b82f6'"
                onmouseout="this.style.background='#f9fafb'; this.style.color='#374151'">
                <i class="fas fa-motorcycle" style="margin-right: 15px; color: #3b82f6;"></i>
                Викликати кур'єра
            </a>
        </div>

        <!-- Categories -->
        @if (get_categories()->filter(fn($category) => $category->services->isNotEmpty())->count() > 0)
            <div style="margin-bottom: 30px;">
                <h3
                    style="
                    font-size: 14px;
                    font-weight: 600;
                    color: #6b7280;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    margin-bottom: 15px;
                ">
                    Категорії послуг</h3>
                <div>
                    @foreach (get_categories()->filter(fn($category) => $category->services->isNotEmpty()) as $item)
                        <a href="{{ route('category_page', $item->href) }}" target="_blank"
                            style="
                            display: block;
                            padding: 12px 20px;
                            color: #6b7280;
                            text-decoration: none;
                            border-radius: 8px;
                            margin-bottom: 5px;
                            transition: all 0.2s;
                        "
                            onmouseover="this.style.background='#f3f4f6'; this.style.color='#3b82f6'"
                            onmouseout="this.style.background='transparent'; this.style.color='#6b7280'">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- CTA Button -->
        <div style="margin-bottom: 25px;">
            <button class="modal_fade" data-modal="feedbackmd"
                style="
                width: 100%;
                background: linear-gradient(135deg, #3b82f6, #06b6d4);
                color: white;
                padding: 18px 24px;
                border: none;
                border-radius: 25px;
                font-weight: 600;
                font-size: 16px;
                cursor: pointer;
                transition: all 0.3s;
                box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            "
                onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <i class="fas fa-broom" style="margin-right: 10px;"></i>
                Замовити чистку
            </button>
        </div>

        <!-- Contact Info -->
        <div
            style="
            border-top: 1px solid #e5e7eb;
            padding-top: 25px;
            text-align: center;
        ">
            <div
                style="
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                color: #6b7280;
            ">
                <i class="fas fa-phone" style="color: #3b82f6;"></i>
                <span style="font-weight: 500;">+38 (xxx) xxx-xx-xx</span>
            </div>
        </div>
    </div>
</div>

<!-- Add body padding for fixed navbar -->
<div style="height: 70px;"></div>

<script>
    // Completely new navigation script with unique IDs
    (function() {
        'use strict';

        console.log('New navigation script starting...');

        // Wait for DOM to be ready
        function domReady(fn) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fn);
            } else {
                fn();
            }
        }

        domReady(function() {
            console.log('DOM ready, initializing navigation...');

            // Get elements with new IDs
            const burgerBtn = document.getElementById('nav-burger-toggle');
            const mobilePanel = document.getElementById('nav-mobile-panel');
            const desktopNav = document.getElementById('desktop-nav');
            const desktopPhone = document.getElementById('desktop-phone');
            const desktopCta = document.getElementById('desktop-cta');

            console.log('Elements found:', {
                burgerBtn: !!burgerBtn,
                mobilePanel: !!mobilePanel,
                desktopNav: !!desktopNav,
                desktopPhone: !!desktopPhone,
                desktopCta: !!desktopCta
            });

            if (!burgerBtn || !mobilePanel) {
                console.error('Required elements not found!');
                return;
            }

            let isMenuOpen = false;

            // Screen size check function
            function updateLayout() {
                const isDesktop = window.innerWidth >= 1024;

                if (isDesktop) {
                    // Show desktop elements
                    if (desktopNav) desktopNav.style.display = 'flex';
                    if (desktopPhone) desktopPhone.style.display = 'flex';
                    if (desktopCta) desktopCta.style.display = 'block';
                    if (burgerBtn) burgerBtn.style.display = 'none';

                    // Close mobile menu if open
                    if (isMenuOpen) {
                        closeMenu();
                    }
                } else {
                    // Show mobile elements
                    if (desktopNav) desktopNav.style.display = 'none';
                    if (desktopPhone) desktopPhone.style.display = 'none';
                    if (desktopCta) desktopCta.style.display = 'none';
                    if (burgerBtn) burgerBtn.style.display = 'block';
                }
            }

            // Open mobile menu
            function openMenu() {
                console.log('Opening mobile menu...');

                if (!mobilePanel) return;

                // Show menu
                mobilePanel.style.transform = 'translateY(0)';
                mobilePanel.style.opacity = '1';
                mobilePanel.style.visibility = 'visible';
                document.body.style.overflow = 'hidden';

                isMenuOpen = true;

                // Animate burger icon
                animateBurger(true);

                console.log('Mobile menu opened');
            }

            // Close mobile menu
            function closeMenu() {
                console.log('Closing mobile menu...');

                if (!mobilePanel) return;

                // Hide menu
                mobilePanel.style.transform = 'translateY(-100%)';
                mobilePanel.style.opacity = '0';
                mobilePanel.style.visibility = 'hidden';
                document.body.style.overflow = '';

                isMenuOpen = false;

                // Reset burger icon
                animateBurger(false);

                console.log('Mobile menu closed');
            }

            // Animate burger icon
            function animateBurger(isOpen) {
                const bar1 = document.querySelector('.nav-burger-bar-1');
                const bar2 = document.querySelector('.nav-burger-bar-2');
                const bar3 = document.querySelector('.nav-burger-bar-3');

                if (!bar1 || !bar2 || !bar3) return;

                if (isOpen) {
                    // Transform to X
                    bar1.style.transform = 'rotate(45deg) translate(5px, 5px)';
                    bar2.style.opacity = '0';
                    bar3.style.transform = 'rotate(-45deg) translate(7px, -6px)';
                } else {
                    // Reset to hamburger
                    bar1.style.transform = '';
                    bar2.style.opacity = '';
                    bar3.style.transform = '';
                }
            }

            // Toggle menu
            function toggleMenu() {
                console.log('Toggle menu clicked, current state:', isMenuOpen);

                if (isMenuOpen) {
                    closeMenu();
                } else {
                    openMenu();
                }
            }

            // Event listeners
            burgerBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Burger button clicked');
                toggleMenu();
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (isMenuOpen &&
                    !burgerBtn.contains(e.target) &&
                    !mobilePanel.contains(e.target)) {
                    console.log('Clicked outside, closing menu');
                    closeMenu();
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                updateLayout();
            });

            // Navigation Search Functionality
            const navSearchInput = document.getElementById('nav-service-search');
            const navSearchResults = document.getElementById('nav-search-results');
            const navSearchResultsList = document.getElementById('nav-search-results-list');
            let searchTimeout;

            if (navSearchInput) {
                navSearchInput.addEventListener('input', function() {
                    const query = this.value.trim();

                    clearTimeout(searchTimeout);

                    if (query.length < 2) {
                        navSearchResults.classList.add('hidden');
                        return;
                    }

                    searchTimeout = setTimeout(() => {
                        searchServices(query);
                    }, 300);
                });

                // Hide results when clicking outside
                document.addEventListener('click', function(e) {
                    if (!navSearchInput.contains(e.target) && !navSearchResults.contains(e
                        .target)) {
                        navSearchResults.classList.add('hidden');
                    }
                });

                // Show results on focus if there's a query
                navSearchInput.addEventListener('focus', function() {
                    if (this.value.trim().length >= 2) {
                        navSearchResults.classList.remove('hidden');
                    }
                });
            }

            function searchServices(query) {
                fetch(`/api/search-services?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Search API response:', data); // Отладка
                        displayNavSearchResults(data.services || []);
                    })
                    .catch(error => {
                        console.error('Search error:', error);
                        navSearchResultsList.innerHTML =
                            '<div class="p-4 text-center text-gray-500">Помилка пошуку</div>';
                    });
            }

            function displayNavSearchResults(results) {
                console.log('Displaying results:', results); // Отладка

                if (results.length === 0) {
                    navSearchResultsList.innerHTML =
                        '<div class="p-4 text-center text-gray-500">Послуги не знайдено</div>';
                } else {
                    navSearchResultsList.innerHTML = results.map(service => {
                        console.log('Processing service:', service); // Отладка

                        // Правильно получаем название категории из массива categories (теперь это массив объектов)
                        let categoryName = 'Професійна обробка';

                        if (service.categories && Array.isArray(service.categories) && service.categories.length > 0) {
                            // Теперь categories - это массив объектов с полем name
                            categoryName = service.categories[0].name || 'Професійна обробка';
                        }

                        return `
                            <div class="p-3 hover:bg-gray-50 cursor-pointer transition-colors duration-200" onclick="navigateToServicesWithSearch('${navSearchInput.value}')">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium text-gray-900">${service.name}</div>
                                        <div class="text-sm text-gray-500">${categoryName}</div>
                                    </div>
                                    <div class="text-right">
                                        ${getNavServicePriceHTML(service)}
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('');
                }
                navSearchResults.classList.remove('hidden');
            }

            // Функция для перехода на страницу услуг с поисковым запросом
            window.navigateToServicesWithSearch = function(query) {
                if (query && query.trim()) {
                    window.location.href =
                    `/poslugi-ta-cini?search=${encodeURIComponent(query.trim())}`;
                } else {
                    window.location.href = '/poslugi-ta-cini';
                }
            };

            // Handle escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isMenuOpen) {
                    console.log('Escape pressed, closing menu');
                    closeMenu();
                }
            });

            // Initial setup
            updateLayout();

            console.log('Navigation initialization complete');
        });

        // Функция для отображения цены с учетом скидки в навигаторе
        function getNavServicePriceHTML(service) {
            const originalPrice = service.price;
            let discountedPrice = originalPrice;
            let hasDiscount = false;
            let discountPercent = 0;
            
            // Проверяем скидку на категорию
            if (service.categories && service.categories.length > 0) {
                for (const category of service.categories) {
                    if (category.discount_active && category.discount_percent > 0) {
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
                        <div class="font-bold text-primary">${Math.round(discountedPrice)}₴</div>
                        <div class="text-xs text-gray-400 line-through">${originalPrice}₴</div>
                        <div class="text-xs text-green-600 font-semibold">
                            -${discountPercent}%
                        </div>
                    </div>
                `;
            } else {
                return `<div class="font-bold text-primary">${originalPrice}₴</div>`;
            }
        }
    })();
</script>
