<template>
    <section class="recommendations-section relative w-full overflow-hidden py-12">
        <!-- Background decorative blobs -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-enot-pink/5 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-enot-pink/10 rounded-full blur-[100px]"></div>
        </div>

        <div class="container mx-auto relative z-10 px-4">
            <!-- Header -->
            <transition name="fade-down">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-5xl font-bold text-enot-pink mb-4">
                        Рекомендації по догляду
                    </h2>
                    <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                        Корисні поради для правильного догляду за вашим одягом
                    </p>
                </div>
            </transition>

            <!-- Swiper Container -->
            <div class="swiper recommendations-swiper">
                <div class="swiper-wrapper">
                    <div 
                        v-for="(slide, slideIndex) in slides" 
                        :key="slideIndex"
                        class="swiper-slide"
                    >
                        <div class="recommendations-slide-wrapper">
                            <div class="recommendations-slide">
                                <!-- Central Image -->
                            <transition name="scale-fade" appear>
                                <div class="central-image-wrapper">
                                    <div class="central-image-container">
                                        <img 
                                            :src="getSlideImage(slideIndex)" 
                                            alt="Одяг" 
                                            class="central-image"
                                        />
                                            
                                            <!-- Pulse effects on image for desktop interactivity -->
                                            <div 
                                                v-for="(pulse, index) in pulseEffects" 
                                                :key="index"
                                                class="pulse-effect"
                                                :class="pulse.class"
                                                :style="{ animationDelay: pulse.delay }"
                                            >
                                                <div class="pulse-inner"></div>
                                                <div class="pulse-shadow"></div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- Recommendation Cards -->
                                <div class="recommendations-cards">
                                    <transition-group name="slide-up" appear>
                                        <div 
                                            v-for="(rec, index) in slide" 
                                            :key="rec.id || index"
                                            class="care-card"
                                            :class="getCardPosition(index)"
                                            :style="{ transitionDelay: `${index * 0.1}s` }"
                                        >
                                            <div class="box-content bg-enot-light-purple">
                                                <div class="box-header">
                                                    <img 
                                                        :src="getIconPath(rec.icon)" 
                                                        alt="Енот-24" 
                                                        class="raccoon-icon"
                                                    />
                                                    <span class="box-title text-white">{{ rec.title || 'Енот-24 рекомендує' }}</span>
                                                </div>
                                                <p class="box-text text-black">{{ rec.text }}</p>
                                            </div>
                                        </div>
                                    </transition-group>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="swiper-pagination mt-8"></div>
            </div>
            
            <!-- CTA Section -->
            <div class="mt-16 text-center">
                <div class="bg-enot-light-purple rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">Потрібна професійна допомога?</h3>
                    <p class="text-lg opacity-90 mb-6">Зверніться до наших експертів для консультації та замовлення послуг</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button class="bg-white text-primary hover:bg-gray-100 px-8 py-2 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl modal_fade" data-modal="feedbackmd">
                            <i class="fas fa-phone mr-2"></i>
                            Консультація
                        </button>
                        <a href="/courier" class="border-2 border-white text-white hover:bg-white hover:text-secondary px-8 py-2 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-truck mr-2"></i>
                            Викликати кур'єра
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'RecommendationsSlider',
    data() {
        return {
            slideImages: [
                '/storage/src/ill/image_13-removebg-preview 1.svg',
                '/storage/src/ill/image_13-removebg-preview 2.svg',
                '/storage/src/ill/image_13-removebg-preview 3.svg'
            ],
            recommendations: [
                {
                    id: 1,
                    title: 'Енот-24 рекомендує',
                    text: 'Вручну не можна прати замшу, шкіру, хутро, пір\'я та інші делікатні матеріали.',
                    icon: '1.svg'
                },
                {
                    id: 2,
                    title: 'Енот-24 рекомендує',
                    text: 'Іноді побутові засоби можуть вивести пляму, але зіпсувати річ. Наприклад, відбілювач видалить червоне вино з жовтої сукні, проте знебарвить тканину. Щоб зберегти улюблені речі - краще звернутися до професійної чистки.',
                    icon: '2.svg'
                },
                {
                    id: 3,
                    title: 'Енот-24 рекомендує',
                    text: 'Деякі тканини (наприклад, штучний шовк) сідають при пранні та потребують особливого догляду.',
                    icon: '3.svg'
                },
                {
                    id: 4,
                    title: 'Енот-24 рекомендує',
                    text: 'Уважно вивчіть ярлики на одязі. Здавати річ у хімчистку можна, тільки якщо це дозволено виробником.',
                    icon: '4.svg'
                },
                {
                    id: 5,
                    title: 'Енот-24 рекомендує',
                    text: 'Не використовуйте машиине прання, якщо річ прикрашена мереживом, бісером, спеціальними складками або вишивкою.',
                    icon: '1.svg'
                },
                {
                    id: 6,
                    title: 'Енот-24 рекомендує',
                    text: 'Погано пришиті гудзики на пальто, затягування та розриви на тканині під час чищення можуть сприяти появі помітних дефектів.',
                    icon: '3.svg'
                },
                {
                    id: 7,
                    title: 'Енот-24 рекомендує',
                    text: 'Одяг із суміші натуральних волокон, шкіри та замші вимагає сухого чищення.',
                    icon: '5.svg'
                },
                {
                    id: 8,
                    title: 'Енот-24 рекомендує',
                    text: 'Перед пранням білизну потрібно правильно відсортувати, оптимально зробити це за позиціями.',
                    icon: '6.svg'
                },
                {
                    id: 9,
                    title: 'Енот-24 рекомендує',
                    text: 'Якщо на речі утворилася складна пляма, яку не беруть звичайні побутові засоби, допоможе лише професійна чистка.',
                    icon: '7.svg'
                }
            ],
            swiper: null,
            pulseEffects: [
                { class: 'top-[30%] left-[30%]', delay: '0s' },
                { class: 'bottom-[30%] left-[35%]', delay: '0.7s' },
                { class: 'top-[60%] right-[25%]', delay: '1s' }
            ]
        }
    },
    computed: {
        slides() {
            const slides = [];
            for (let i = 0; i < this.recommendations.length; i += 3) {
                slides.push(this.recommendations.slice(i, i + 3));
            }
            return slides;
        }
    },
    methods: {
        getSlideImage(slideIndex) {
            return this.slideImages[slideIndex] || this.slideImages[0];
        },
        getIconPath(icon) {
            return '/storage/src/logo/logo-enot24.png';
        },
        getCardPosition(index) {
            // Позиционирование карточек относительно центрального изображения
            const positions = [
                'card-top-left',
                'card-right-center',
                'card-bottom-left'
            ];
            return positions[index] || '';
        },
        initSwiper() {
            if (typeof Swiper !== 'undefined') {
                this.swiper = new Swiper('.recommendations-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        1024: {
                            slidesPerView: 1,
                            spaceBetween: 40
                        }
                    }
                });
            }
        }
    },
    mounted() {
        this.$nextTick(() => {
            setTimeout(() => {
                this.initSwiper();
            }, 100);
        });
    },
    beforeDestroy() {
        if (this.swiper) {
            this.swiper.destroy();
        }
    }
}
</script>

<style scoped>
.recommendations-section {
    position: relative;
}

.recommendations-slide {
    position: relative;
    width: 100%;
    min-height: 550px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Central Image */
.central-image-wrapper {
    position: relative;
    width: 100%;
    max-width: 280px;
    margin-bottom: 2rem;
    z-index: 10;
}

@media (min-width: 768px) {
    .central-image-wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 240px;
        margin-bottom: 0;
    }
}

@media (min-width: 1024px) {
    .central-image-wrapper {
        max-width: 480px;
    }
}

.central-image-container {
    position: relative;
    width: 100%;
    aspect-ratio: 3/4;
}

@media (min-width: 768px) {
    .central-image-container {
        aspect-ratio: 1/1;
    }
}

.central-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.1));
}

.pulse-effect {
    position: absolute;
    width: 16px;
    height: 16px;
    display: none;
}

@media (min-width: 768px) {
    .pulse-effect {
        display: block;
    }
}

.pulse-inner {
    position: absolute;
    inset: 0;
    background: white;
    border-radius: 50%;
    animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    opacity: 0.75;
}

.pulse-shadow {
    position: absolute;
    inset: 0;
    background: white;
    border-radius: 50%;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
}

/* Recommendation Cards */
.recommendations-cards {
    position: relative;
    width: 100%;
    z-index: 20;
}

/* Transition group должен быть flex-контейнером на мобильных */
.recommendations-cards > span {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    width: 100%;
}

/* Mobile: Flex column layout - карточки в колонку */
.care-card {
    position: relative;
    width: 100%;
    max-width: 100%;
}

/* Desktop: Absolute positioning with unique coordinates */
@media (min-width: 768px) {
    .recommendations-cards {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    /* На десктопе transition-group не должен быть flex */
    .recommendations-cards > span {
        display: block;
        width: 100%;
        height: 100%;
        gap: 0;
    }
    
    .care-card {
        position: absolute;
        width: auto;
        max-width: 220px;
    }
    
    /* Card 1: Top Left - 25% от левого края */
    .card-top-left {
        top: 0;
        left: 25%;
        right: auto;
        bottom: auto;
        transform: none;
    }
    
    /* Card 2: Right Center - вплотную к правой границе изображения */
    .card-right-center {
        top: 50%;
        right: calc(50% - 120px - 220px);
        left: auto;
        bottom: auto;
        transform: translateY(-50%);
    }
    
    /* Card 3: Bottom Left - 25% от левого края */
    .card-bottom-left {
        bottom: 15%;
        left: 25%;
        right: auto;
        top: auto;
        transform: none;
    }
}

@media (min-width: 1024px) {
    .care-card {
        max-width: 240px;
    }
    
    /* Card 1: Top Left - 25% от левого края */
    .card-top-left {
        top: 0;
        left: 25%;
    }
    
    /* Card 2: Right Center - вплотную к правой границе изображения */
    .card-right-center {
        top: 50%;
        right: calc(50% - 140px - 240px);
        transform: translateY(-50%);
    }
    
    /* Card 3: Bottom Left - 25% от левого края */
    .card-bottom-left {
        bottom: 12%;
        left: 25%;
    }
}

@media (min-width: 1280px) {
    .care-card {
        max-width: 260px;
    }
    
    /* Card 1: Top Left - 25% от левого края */
    .card-top-left {
        top: 0;
        left: 25%;
    }
    
    /* Card 2: Right Center - вплотную к правой границе изображения */
    .card-right-center {
        top: 50%;
        right: calc(50% - 140px - 260px);
        transform: translateY(-50%);
    }
    
    /* Card 3: Bottom Left - 25% от левого края */
    .card-bottom-left {
        bottom: 10%;
        left: 25%;
    }
}

.box-content {
    border-radius: 12px;
    padding: 1rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.box-content:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
}

.box-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.75rem;
}

.raccoon-icon {
    width: 28px;
    height: 28px;
    flex-shrink: 0;
}

.box-title {
    font-weight: 600;
    font-size: 0.8rem;
}

.box-text {
    line-height: 1.4;
    font-size: 0.8rem;
}

/* Vue Transitions */
.fade-down-enter-active,
.fade-down-leave-active {
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.fade-down-enter,
.fade-down-leave-to {
    opacity: 0;
    transform: translateY(-20px);
}

.scale-fade-enter-active {
    transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.scale-fade-enter {
    opacity: 0;
    transform: scale(0.9);
}

.slide-up-enter-active {
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.slide-up-enter {
    opacity: 0;
    transform: translateY(30px);
}

.slide-up-move {
    transition: transform 0.6s ease;
}

/* Swiper Pagination Customization */
.recommendations-swiper :deep(.swiper-wrapper) {
    overflow: visible;
}

.recommendations-swiper :deep(.swiper-slide) {
    overflow: visible;
}

.recommendations-swiper :deep(.swiper-pagination-bullet) {
    background: #E75A84;
    opacity: 0.3;
    width: 12px;
    height: 12px;
}

.recommendations-swiper :deep(.swiper-pagination-bullet-active) {
    opacity: 1;
    background: #E75A84;
    width: 24px;
    border-radius: 6px;
}

@keyframes ping {
    75%, 100% {
        transform: scale(2);
        opacity: 0;
    }
}
</style>
