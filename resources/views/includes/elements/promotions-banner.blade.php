<!-- Баннер-слайдер с акциями -->
<section class="py-4 sm:py-6 bg-gradient-to-r from-accent to-primary/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Заголовок секции -->
        <div class="text-center mb-4 sm:mb-6">
            <h2 class="text-xl sm:text-2xl font-bold text-secondary mb-1">
                🎁 Спеціальні пропозиції
            </h2>
            <p class="text-gray-600 text-xs sm:text-sm">
                Не пропустіть вигідні акції та знижки
            </p>
        </div>

        <!-- Слайдер акций -->
        <div class="promotions-swiper-container">
            <div class="swiper promotions-swiper">
                <div class="swiper-wrapper" id="promotions-slides">
                    <!-- Слайды будут загружены через JavaScript -->
                </div>
                
                <!-- Навигация -->
                <div class="swiper-button-next promotions-next"></div>
                <div class="swiper-button-prev promotions-prev"></div>
                
                <!-- Пагинация -->
                <div class="swiper-pagination promotions-pagination"></div>
            </div>
        </div>

        <!-- Кнопка для вызова модального окна консультации -->
        <div class="text-center mt-4 sm:mt-6">
            <button id="open-consultation-modal" 
                    class="bg-gradient-primary text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg font-semibold text-xs sm:text-sm hover:opacity-90 transition-all duration-200 shadow-md hover:shadow-lg">
                📞 Отримати консультацію
            </button>
        </div>
    </div>
</section>

<style>
/* Стили для слайдера акций */
.promotions-swiper {
    padding: 10px 0 40px 0;
}

.promotions-swiper .swiper-slide {
    height: auto;
    display: flex;
}

.promotion-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.promotion-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
}

.promotion-image {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.promotion-content {
    padding: 12px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.promotion-title {
    font-size: 14px;
    font-weight: bold;
    color: #1e3a8a;
    margin-bottom: 6px;
    line-height: 1.3;
}

.promotion-description {
    font-size: 12px;
    color: #6b7280;
    margin-bottom: 8px;
    flex-grow: 1;
    line-height: 1.4;
}

.promotion-offers {
    font-size: 11px;
    color: #374151;
    margin-bottom: 10px;
}

.promotion-offers ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.promotion-offers li {
    margin-bottom: 2px;
    display: flex;
    align-items: flex-start;
    line-height: 1.3;
}

.promotion-offers li::before {
    content: "•";
    color: #b0a8fe;
    font-weight: bold;
    margin-right: 6px;
    margin-top: 1px;
}

.promotion-button {
    background: linear-gradient(135deg, #b0a8fe, #c47e93);
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.promotion-button:hover {
    background: linear-gradient(135deg, #c47e93, #b0a8fe);
    transform: translateY(-1px);
}

/* Навигация слайдера */
.promotions-next,
.promotions-prev {
    color: #b0a8fe;
    background: white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.promotions-next:after,
.promotions-prev:after {
    font-size: 16px;
}

/* Пагинация */
.promotions-pagination .swiper-pagination-bullet {
    background: #b0a8fe;
    opacity: 0.3;
}

.promotions-pagination .swiper-pagination-bullet-active {
    opacity: 1;
}

/* Адаптивность */
@media (max-width: 640px) {
    .promotions-swiper {
        padding: 8px 0 35px 0;
    }
    
    .promotion-content {
        padding: 10px;
    }
    
    .promotion-title {
        font-size: 13px;
    }
    
    .promotion-description {
        font-size: 11px;
    }
    
    .promotion-offers {
        font-size: 10px;
    }
    
    .promotion-button {
        padding: 5px 10px;
        font-size: 10px;
    }
    
    .promotion-image {
        height: 100px;
    }
    
    .promotions-next,
    .promotions-prev {
        width: 30px;
        height: 30px;
    }
    
    .promotions-next:after,
    .promotions-prev:after {
        font-size: 12px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Загружаем акции для баннера
    loadPromotionsForBanner();
    
    // Обработчик кнопки консультации
    document.getElementById('open-consultation-modal').addEventListener('click', function() {
        // Прокручиваем к секции консультации
        const consultationSection = document.querySelector('.consultation-section');
        if (consultationSection) {
            consultationSection.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
    
    function loadPromotionsForBanner() {
        fetch('/api/promotions-banner')
            .then(response => response.json())
            .then(data => {
                if (data.promotions && data.promotions.length > 0) {
                    renderPromotionsSlider(data.promotions);
                    initPromotionsSwiper();
                } else {
                    // Скрываем секцию если нет акций
                    document.querySelector('.promotions-swiper-container').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Ошибка загрузки акций:', error);
                document.querySelector('.promotions-swiper-container').style.display = 'none';
            });
    }
    
    function renderPromotionsSlider(promotions) {
        const slidesContainer = document.getElementById('promotions-slides');
        
        slidesContainer.innerHTML = promotions.map(promotion => `
            <div class="swiper-slide">
                <div class="promotion-card">
                    ${promotion.image ? `
                        <img src="${promotion.image}" alt="${promotion.title}" class="promotion-image">
                    ` : ''}
                    <div class="promotion-content">
                        <h3 class="promotion-title">${promotion.title}</h3>
                        <p class="promotion-description">${promotion.description}</p>
                        ${promotion.offers ? `
                            <div class="promotion-offers">
                                <ul>
                                    ${promotion.offers.split('\n').filter(offer => offer.trim()).map(offer => 
                                        `<li>${offer.trim()}</li>`
                                    ).join('')}
                                </ul>
                            </div>
                        ` : ''}
                        <button class="promotion-button" onclick="openPromotionModal(${promotion.id})">
                            Дізнатися більше
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }
    
    function initPromotionsSwiper() {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.promotions-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.promotions-next',
                    prevEl: '.promotions-prev',
                },
                pagination: {
                    el: '.promotions-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                },
            });
        }
    }
    
    // Функция для открытия модального окна акции
    window.openPromotionModal = function(promotionId) {
        // Здесь можно добавить логику для показа детальной информации об акции
        // Пока что просто показываем основное модальное окно
        const modal = document.getElementById('promotion-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    };
});
</script>
