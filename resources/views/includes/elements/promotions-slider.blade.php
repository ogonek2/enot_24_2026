@if(isset($discounts) && $discounts->count() > 0)
<section class="mt-4">
    <div class="container mx-auto bg-white rounded-2xl p-8">
        <div class="text-left mb-4">
            <h2 class="text-3xl md:text-4xl font-sans text-secondary mb-2">Щотижневі акції:</h2>
            <p class="text-md font-sans text-gray-500">Не пропустіть вигідні акції та знижки</p>
        </div>

        <!-- Swiper Container -->
        <div class="promotions-main-swiper-container relative w-full">
            <div class="swiper promotions-main-swiper w-full">
                <div class="swiper-wrapper">
                    @foreach($discounts as $index => $discount)
                        <div class="swiper-slide" data-swiper-slide-index="{{ $index }}">
                            <a href="{{ route('promotion_page', $discount->id) }}" class="block" style="width: 100%;">
                                <div class="promotion-main-card group cursor-pointer w-full" 
                                     style="@if($discount->banner) background-image: url('{{ asset('storage/' . $discount->banner) }}'); background-size: cover; background-position: center; @endif">
                                    @if($discount->banner)
                                        <div class="promotion-main-overlay"></div>
                                    @else
                                        @php
                                            // Чередующиеся цвета фона если нет картинки
                                            $bgColors = [
                                                'bg-gradient-to-br from-accent to-primary/80',
                                                'bg-gradient-to-br from-primary/20 to-secondary/20',
                                            ];
                                            $bgColor = $bgColors[$index % 2];
                                        @endphp
                                        <div class="promotion-main-pattern {{ $bgColor }}"></div>
                                    @endif
                                    
                                    <!-- Стрелка в правом верхнем углу -->
                                    <div class="promotion-main-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    
                                    <div class="promotion-main-content relative z-10">
                                        <button class="promotion-main-button" type="button">
                                            ДЕТАЛЬНІШЕ
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                
                <!-- Navigation -->
                <div class="swiper-button-next promotions-main-next"></div>
                <div class="swiper-button-prev promotions-main-prev"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination promotions-main-pagination"></div>
            </div>
        </div>
    </div>
</section>

<style>
/* Promotions Slider Styles */
.promotions-main-swiper {
    overflow: hidden;
    width: 100%;
}

@media (min-width: 1024px) {
    .promotions-main-swiper {
        overflow: visible;
    }
}

.promotions-main-swiper .swiper-wrapper {
    align-items: stretch;
}

.promotions-main-swiper .swiper-slide {
    height: auto;
    display: flex;
    width: 100%;
}

@media (min-width: 1024px) {
    .promotions-main-swiper .swiper-slide {
        width: auto;
    }
}

.promotion-main-card {
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    position: relative;
    padding: 32px;
    background-color: #fdd9e5; /* Fallback цвет */
}

.promotion-main-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
}

.promotion-main-arrow {
    position: absolute;
    top: 24px;
    right: 24px;
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 20;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.promotion-main-arrow i {
    color: #b0a8fe;
    font-size: 18px;
    transition: transform 0.3s ease;
}

.promotion-main-card:hover .promotion-main-arrow {
    background: #b0a8fe;
    transform: scale(1.1);
}

.promotion-main-card:hover .promotion-main-arrow i {
    color: white;
    transform: translateX(3px);
}

.promotion-main-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.4));
    pointer-events: none;
    z-index: 1;
}

.promotion-main-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.6;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.4) 0%, transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.3) 0%, transparent 40%),
        radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.2) 0%, transparent 40%),
        radial-gradient(circle at 10% 80%, rgba(255, 255, 255, 0.3) 0%, transparent 30%),
        radial-gradient(circle at 90% 20%, rgba(255, 255, 255, 0.25) 0%, transparent 35%);
    pointer-events: none;
    z-index: 0;
}

.promotion-main-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0;
    width: 100%;
}

/* Ширина слайдов на десктопе будет задаваться через JavaScript */
@media (min-width: 1024px) {
    .promotions-main-swiper .swiper-slide {
        width: auto !important;
    }
}


.promotion-main-button {
    background: white;
    color: #1f2937;
    border: none;
    padding: 14px 28px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    width: fit-content;
}

.promotion-main-button:hover {
    background: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
}

/* Navigation */
.promotions-main-next,
.promotions-main-prev {
    color: #b0a8fe !important;
    background: white;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

@media (max-width: 1023px) {
    .promotions-main-next,
    .promotions-main-prev {
        display: none !important;
    }
}

.promotions-main-next:hover,
.promotions-main-prev:hover {
    background: #b0a8fe;
    color: white !important;
    transform: scale(1.1);
}

.promotions-main-next::after,
.promotions-main-prev::after {
    font-size: 20px;
    font-weight: 700;
}

/* Pagination */
.promotions-main-pagination {
    position: relative;
    margin-top: 30px;
}

.promotions-main-pagination .swiper-pagination-bullet {
    background: #b0a8fe;
    opacity: 0.3;
    width: 12px;
    height: 12px;
    transition: all 0.3s ease;
}

.promotions-main-pagination .swiper-pagination-bullet-active {
    opacity: 1;
    transform: scale(1.3);
}

/* Responsive */
@media (max-width: 768px) {
    .promotion-main-card {
        height: 350px;
        padding: 20px;
    }
    
    .promotion-main-arrow {
        width: 40px;
        height: 40px;
        top: 16px;
        right: 16px;
    }
    
    .promotion-main-arrow i {
        font-size: 16px;
    }
    
    .promotion-main-button {
        padding: 12px 20px;
        font-size: 12px;
    }
    
    .promotions-main-next,
    .promotions-main-prev {
        width: 36px;
        height: 36px;
    }
    
    .promotions-main-next::after,
    .promotions-main-prev::after {
        font-size: 16px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateSlideWidths(swiper) {
        if (window.innerWidth >= 1024 && swiper.slides.length > 0) {
            // Получаем ширину контейнера
            const containerWidth = swiper.width;
            const spaceBetween = 12;
            
            // Первый слайд должен быть равен двум обычным слайдам
            // Если показываем 3 слайда (первый двойной + 2 обычных):
            // totalWidth = firstSlideWidth + spaceBetween + normalSlideWidth + spaceBetween + normalSlideWidth
            // firstSlideWidth = 2 * normalSlideWidth
            // totalWidth = 2 * normalSlideWidth + spaceBetween + normalSlideWidth + spaceBetween + normalSlideWidth
            // totalWidth = 4 * normalSlideWidth + 2 * spaceBetween
            // normalSlideWidth = (totalWidth - 2 * spaceBetween) / 4
            // firstSlideWidth = 2 * normalSlideWidth
            
            const normalSlideWidth = (containerWidth - 2 * spaceBetween) / 4;
            const firstSlideWidth = normalSlideWidth * 2;
            
            swiper.slides.forEach((slide) => {
                const slideIndex = parseInt(slide.dataset.swiperSlideIndex || 0);
                if (slideIndex === 0) {
                    slide.style.width = firstSlideWidth + 'px';
                } else {
                    slide.style.width = normalSlideWidth + 'px';
                }
            });
            swiper.update();
        } else {
            // На мобильных - полная ширина
            swiper.slides.forEach(slide => {
                slide.style.width = '';
            });
            swiper.update();
        }
    }
    
    function initPromotionsMainSwiper() {
        if (typeof Swiper !== 'undefined' && document.querySelector('.promotions-main-swiper')) {
            const promotionsSwiper = new Swiper('.promotions-main-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: false, // Отключен loop для корректной работы первого большого слайда
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.promotions-main-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.promotions-main-next',
                    prevEl: '.promotions-main-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 'auto',
                        spaceBetween: 12,
                        slidesPerGroup: 1,
                    },
                },
                on: {
                    init: function() {
                        updateSlideWidths(this);
                    },
                    resize: function() {
                        updateSlideWidths(this);
                    },
                    slideChange: function() {
                        updateSlideWidths(this);
                    }
                },
                keyboard: {
                    enabled: true,
                },
                grabCursor: true,
            });
            
            console.log('Promotions Main Swiper initialized');
        } else if (typeof Swiper === 'undefined') {
            setTimeout(initPromotionsMainSwiper, 100);
        }
    }
    
    initPromotionsMainSwiper();
});

// Карточки кликабельны и переходят по ссылке через onclick
</script>
@endif

