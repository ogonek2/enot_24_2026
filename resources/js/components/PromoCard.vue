<template>
    <a 
        :href="getPromotionLink()" 
        :class="baseCardClasses" 
        :style="cardStyles"
        class="bg-class"
    >
        <!-- Background Pattern Image -->
        <!-- <div class="absolute bottom-[25%] right-[5%] w-[50%] opacity-100 pointer-events-none z-0">
            <div class="relative w-full h-full">
                <img 
                    src="/storage/src/ill/Pattern Pink.svg" 
                    alt="Pattern" 
                    class="w-full h-full object-contain object-bottom-right scale-[3]"
                />
            </div>
        </div> -->
        
        <div class="relative z-10 h-full flex flex-col justify-between">
            <!-- Top Section -->
            <div class="flex justify-between items-start mb-4">
                <div class="flex-1">
                    <h3 :style="titleStyles" :class="['text-2xl md:text-3xl lg:text-4xl font-bold mb-2 leading-tight', !promotion?.text_color ? textColorClass : '']" v-html="renderTitle()"></h3>
                    <div :style="discountStyles" :class="['text-4xl md:text-6xl lg:text-8xl font-bold opacity-90', !promotion?.discount_color ? textColorClass : '']">
                        {{ discount }}
                    </div>
                </div>
            </div>
            
            <!-- Bottom Section: Button and Location
            <div class="flex items-center justify-between gap-4 mt-auto">
                <button 
                    :style="buttonStyles"
                    class="px-4 py-2 rounded-lg font-semibold text-sm md:text-base transition-all duration-300 hover:opacity-90"
                    @click.prevent="handleButtonClick"
                >
                    Детальніше
                </button>
                <span :style="locationTextStyles" class="text-sm md:text-base font-medium">
                    Локації ({{ location }})
                </span>
            </div> -->
        </div>
    </a>
</template>

<script>
export default {
    name: 'PromoCard',
    props: {
        title: {
            type: [String, Object],
            default: 'Акція'
        },
        discount: {
            type: String,
            default: '-50%'
        },
        promotion: {
            type: Object,
            default: null
        },
        delay: {
            type: Number,
            default: 0
        },
        location: {
            type: String,
            default: 'Всі'
        }
    },
    computed: {
        baseCardClasses() {
            return 'relative rounded-2xl p-6 md:p-8 overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl block w-full';
        },
        cardStyles() {
            const backgroundColor = this.promotion?.color || '#ffffff';
            return {
                backgroundColor: backgroundColor,
                animationDelay: this.delay + 's'
            };
        },
        isLightColor() {
            const color = this.promotion?.color || '#ffffff';
            return this.isColorLight(color);
        },
        textColorClass() {
            return this.isLightColor ? 'text-gray-900' : 'text-white';
        },
        locationTextColorClass() {
            return this.isLightColor ? 'text-gray-600' : 'text-white/80';
        },
        badgeClasses() {
            return this.isLightColor 
                ? 'bg-gray-900 text-white' 
                : 'bg-white text-gray-900';
        },
        titleStyles() {
            if (this.promotion?.text_color) {
                return {
                    color: this.promotion.text_color
                };
            }
            return {};
        },
        discountStyles() {
            if (this.promotion?.discount_color) {
                return {
                    color: this.promotion.discount_color
                };
            }
            return {};
        },
        buttonStyles() {
            // Фон кнопки = цвет текста скидки (discount)
            const discountColor = this.promotion?.discount_color || (this.isLightColor ? '#1f2937' : '#ffffff');
            // Текст кнопки = цвет названия акции
            const titleColor = this.promotion?.text_color || (this.isLightColor ? '#1f2937' : '#ffffff');
            
            return {
                backgroundColor: discountColor,
                color: titleColor
            };
        },
        locationTextStyles() {
            // Цвет текста локации = цвет названия акции
            const titleColor = this.promotion?.text_color || (this.isLightColor ? '#1f2937' : '#ffffff');
            
            return {
                color: titleColor
            };
        }
    },
    methods: {
        isColorLight(color) {
            if (!color) return true;
            
            // Убираем # если есть и пробелы
            let hex = color.replace('#', '').trim();
            
            // Если цвет в формате rgb/rgba, конвертируем
            if (hex.startsWith('rgb')) {
                const matches = hex.match(/\d+/g);
                if (matches && matches.length >= 3) {
                    const r = parseInt(matches[0]);
                    const g = parseInt(matches[1]);
                    const b = parseInt(matches[2]);
                    const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                    return brightness > 128;
                }
                return true;
            }
            
            // Если hex цвет короткий (3 символа), расширяем
            if (hex.length === 3) {
                hex = hex.split('').map(char => char + char).join('');
            }
            
            // Проверяем что это валидный hex
            if (!/^[0-9A-Fa-f]{6}$/.test(hex)) {
                return true; // По умолчанию светлый
            }
            
            // Конвертируем hex в RGB
            const r = parseInt(hex.substr(0, 2), 16);
            const g = parseInt(hex.substr(2, 2), 16);
            const b = parseInt(hex.substr(4, 2), 16);
            
            // Вычисляем яркость по формуле
            // Y = 0.299*R + 0.587*G + 0.114*B
            const brightness = (r * 299 + g * 587 + b * 114) / 1000;
            
            // Если яркость больше 128, цвет светлый
            return brightness > 128;
        },
        getPromotionLink() {
            if (this.promotion && this.promotion.id) {
                return `/aktsii/${this.promotion.id}`;
            }
            return '#';
        },
        renderTitle() {
            if (typeof this.title === 'string') {
                return this.title.replace(/\n/g, '<br />');
            }
            return this.title;
        },
        handleButtonClick(e) {
            e.preventDefault();
            e.stopPropagation();
            const link = this.getPromotionLink();
            if (link && link !== '#') {
                window.location.href = link;
            }
        }
    }
}
</script>

<style scoped>
/* Smooth hover effects */
a {
    cursor: pointer;
}
.bg-class{
    background-image: url('/storage/src/ill/Pattern Pink.svg');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: right bottom;

}
</style>
