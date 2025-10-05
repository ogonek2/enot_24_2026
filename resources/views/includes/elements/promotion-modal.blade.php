<!-- Модальное окно для акций -->
<div id="promotion-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-2 sm:p-4">
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-2xl max-w-4xl w-full mx-2 sm:mx-4 relative overflow-hidden max-h-[95vh] overflow-y-auto">
            <!-- Кнопка закрытия -->
            <button id="close-promotion-modal" class="absolute top-2 right-2 sm:top-4 sm:right-4 z-10 text-blue-400 hover:text-blue-600 transition-colors">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <!-- Контент модального окна -->
            <div id="promotion-modal-content" class="flex flex-col lg:flex-row min-h-[400px] lg:min-h-[500px]">
                <!-- Левая часть - изображение и логотип -->
                <div class="w-full lg:w-1/2 relative bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center py-8 lg:py-0">
                    <!-- Фоновый круг -->
                    <div class="absolute top-0 left-0 w-32 h-32 sm:w-48 sm:h-48 lg:w-64 lg:h-64 bg-blue-600 rounded-full -translate-x-16 -translate-y-16 sm:-translate-x-24 sm:-translate-y-24 lg:-translate-x-32 lg:-translate-y-32 opacity-20"></div>
                    
                    <!-- Изображение акции -->
                    <div id="promotion-image-container" class="relative z-10 text-center">
                        <img id="promotion-image" src="" alt="" class="w-32 h-32 sm:w-48 sm:h-48 lg:w-64 lg:h-64 object-cover rounded-full mx-auto mb-4 shadow-lg hidden">
                        
                        <!-- Логотип -->
                        <div class="relative z-20">
                            <div class="w-auto h-8 sm:h-10 lg:h-12 flex items-center justify-center mx-auto opacity-50">
                                <img src="{{ asset('storage/source/logo_hear.svg') }}" alt="Logo" class="w-full h-full">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Правая часть - контент и форма -->
                <div class="w-full lg:w-1/2 p-4 sm:p-6 lg:p-8 flex flex-col justify-center">
                    <!-- Заголовок -->
                    <h3 id="promotion-title" class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-900 mb-3 sm:mb-4 leading-tight text-center lg:text-left">
                        ЗАМОВТЕ ЧИСТКУ ЗАРАЗ!
                    </h3>
                    
                    <!-- Описание -->
                    <p id="promotion-description" class="text-gray-600 mb-4 sm:mb-6 text-xs sm:text-sm text-center lg:text-left"></p>
                    
                    <!-- Форма обратной связи -->
                    <form id="promotion-contact-form" class="space-y-3 sm:space-y-4">
                        <div>
                            <input type="tel" id="promotion-phone" name="phone" placeholder="Введіть свій ТЕЛЕФОН" 
                                   class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-center text-sm sm:text-base lg:text-lg">
                        </div>
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-blue-700 transition-all duration-200 font-semibold text-sm sm:text-base lg:text-lg">
                            ОТРИМАТИ ЗНИЖКУ
                        </button>
                    </form>
                    
                    <!-- Дополнительные предложения (скрыты по умолчанию) -->
                    <div id="promotion-offers" class="mt-4 sm:mt-6 hidden">
                        <h4 class="font-semibold text-blue-900 mb-2 text-sm sm:text-base">Наші пропозиції:</h4>
                        <div id="promotion-offers-list" class="text-gray-600 text-xs sm:text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('promotion-modal');
    const closeBtn = document.getElementById('close-promotion-modal');
    const form = document.getElementById('promotion-contact-form');
    
    // Проверяем, нужно ли показывать модальное окно
    checkAndShowPromotionModal();
    
    // Закрытие модального окна
    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Обработка формы
    form.addEventListener('submit', handleFormSubmit);
    
    function checkAndShowPromotionModal() {
        // Проверяем кеш
        const cacheKey = 'promotion_modal_closed';
        const cachedData = localStorage.getItem(cacheKey);
        
        if (cachedData) {
            const { timestamp, cacheMinutes } = JSON.parse(cachedData);
            const now = Date.now();
            const cacheExpiry = timestamp + (cacheMinutes * 60 * 1000);
            
            if (now < cacheExpiry) {
                return; // Модальное окно не показываем
            }
        }
        
        // Загружаем данные акции
        fetch('/api/modal-promotion')
            .then(response => response.json())
            .then(data => {
                if (data.promotion) {
                    showPromotionModal(data.promotion);
                }
            })
            .catch(error => {
                console.error('Ошибка загрузки акции:', error);
            });
    }
    
    function showPromotionModal(promotion) {
        // Заполняем данные
        document.getElementById('promotion-title').textContent = promotion.title || 'ЗАМОВТЕ ЧИСТКУ ЗАРАЗ!';
        document.getElementById('promotion-description').textContent = promotion.description || '';
        
        // Изображение
        if (promotion.image) {
            document.getElementById('promotion-image').src = promotion.image;
            document.getElementById('promotion-image').classList.remove('hidden');
        }
        
        // Предложения (показываем только если есть)
        const offersDiv = document.getElementById('promotion-offers');
        const offersList = document.getElementById('promotion-offers-list');
        if (promotion.offers && promotion.offers.trim()) {
            const offers = promotion.offers.split('\n').filter(offer => offer.trim());
            if (offers.length > 0) {
                offersList.innerHTML = offers.map(offer => 
                    `<div class="flex items-start mb-1">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>${offer.trim()}</span>
                    </div>`
                ).join('');
                offersDiv.classList.remove('hidden');
            }
        }
        
        // Показываем модальное окно
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
        
        // Сохраняем в кеш
        fetch('/api/modal-promotion')
            .then(response => response.json())
            .then(data => {
                if (data.promotion) {
                    const cacheData = {
                        timestamp: Date.now(),
                        cacheMinutes: data.promotion.cache_minutes
                    };
                    localStorage.setItem('promotion_modal_closed', JSON.stringify(cacheData));
                }
            })
            .catch(error => {
                console.error('Ошибка сохранения кеша:', error);
            });
    }
    
    function handleFormSubmit(e) {
        e.preventDefault();
        
        const phone = document.getElementById('promotion-phone').value.trim();
        
        if (!phone) {
            alert('Будь ласка, введіть ваш телефон');
            return;
        }
        
        const data = {
            name: 'Клієнт з модального вікна',
            phone: phone,
            message: 'Заявка з модального вікна акції',
            source: 'promotion_modal'
        };
        
        // Отправляем данные
        fetch('/api/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Дякуємо! Ми зв\'яжемося з вами найближчим часом.');
                form.reset();
                closeModal();
            } else {
                alert('Помилка відправки заявки. Спробуйте ще раз.');
            }
        })
        .catch(error => {
            console.error('Ошибка отправки формы:', error);
            alert('Помилка відправки заявки. Спробуйте ще раз.');
        });
    }
});
</script>