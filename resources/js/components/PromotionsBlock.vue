<template>
    <section class="w-full py-12 overflow-hidden">
        <div class="container mx-auto px-4">
            <transition name="fade-down" appear>
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-enot-pink mb-3">
                        Акції та спеціальні пропозиції
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Не пропустіть вигідні акції та знижки від ЄНОТ 24
                    </p>
                </div>
            </transition>

            <!-- Grid Layout - Dynamic -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div 
                    v-for="(promotion, index) in promotions" 
                    :key="promotion.id || index"
                    :class="getGridClasses(index)"
                >
                    <transition name="scale-fade" appear>
                        <PromoCard
                            :title="getPromotionTitle(promotion)"
                            :discount="getPromotionDiscount(promotion)"
                            :promotion="promotion"
                            :location="getLocation(promotion)"
                            :delay="index * 0.1"
                            :class="getCardHeightClass(index)"
                        />
                    </transition>
                </div>
            </div>

            <!-- Floating Call Button (Mobile Only) -->
            <transition name="scale-fade" appear>
                <div class="fixed bottom-6 right-6 z-50 md:hidden">
                    <button 
                        @click="openConsultation"
                        class="w-14 h-14 bg-enot-pink text-white rounded-full shadow-lg flex items-center justify-center hover:bg-enot-pink/90 active:scale-90 transition-all"
                    >
                        <i class="fas fa-phone text-xl"></i>
                    </button>
                </div>
            </transition>
        </div>
    </section>
</template>

<script>
import PromoCard from './PromoCard.vue';

export default {
    name: 'PromotionsBlock',
    components: {
        PromoCard
    },
    props: {
        promotions: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        getGridClasses(index) {
            // На мобильных - все карточки на всю ширину (grid-cols-1 автоматически)
            // На планшетах и десктопе используем специальную логику для первых карточек
            if (index === 0) {
                // Первая карточка - занимает 2 ряда на десктопе, 1 колонку на планшете
                return 'md:col-span-1 lg:col-span-1 lg:row-span-2';
            }
            if (index === 1) {
                // Вторая карточка - занимает 2 колонки на планшете и десктопе
                return 'md:col-span-2 lg:col-span-2';
            }
            // Остальные карточки - по одной колонке, автоматически распределяются по сетке
            return '';
        },
        getCardHeightClass(index) {
            // Первая карточка - больше высота на десктопе
            if (index === 0) {
                return 'h-full min-h-[280px] md:min-h-[320px] lg:min-h-[400px]';
            }
            return 'h-full min-h-[200px] md:min-h-[240px]';
        },
        getPromotionTitle(promotion) {
            if (promotion && promotion.name) {
                return promotion.name;
            }
            return 'Акція';
        },
        getPromotionDiscount(promotion) {
            if (promotion && promotion.discount_action) {
                return promotion.discount_action;
            }
            return '-50%';
        },
        getLocation(promotion) {
            if (promotion && promotion.locations) {
                return promotion.locations;
            }
            return 'Всі';
        },
        openConsultation() {
            const trigger = document.querySelector('.modal_fade[data-modal="feedbackmd"]');
            if (trigger) {
                trigger.click();
            }
        }
    }
}
</script>

<style scoped>
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
    transition: opacity 0.6s ease, transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.scale-fade-enter {
    opacity: 0;
    transform: scale(0.9);
}

.scale-fade-move {
    transition: transform 0.6s ease;
}

/* Mobile: Full width cards - уже работает через grid-cols-1 */
</style>
