<template>
    <div class="cart-component">
        <!-- Cart Icon Buttons - rendered via teleport/mount points -->
        <!-- Desktop button will be mounted to #cart-button-desktop -->
        <!-- Mobile button will be mounted to #cart-button-mobile -->
        
        <!-- Cart Overlay -->
        <transition name="fade">
            <div 
                v-if="isOpen"
                @click="toggleCart"
                class="fixed inset-0 bg-black bg-opacity-50 z-[9998]"></div>
        </transition>
        
        <!-- Cart Modal Window -->
        <transition name="slide-fade">
            <div 
                v-if="isOpen"
                class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl z-[9999] overflow-y-auto">
            <div class="p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Корзина</h2>
                    <button type="button" @click="toggleCart" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Cart Items -->
                <div class="space-y-4 mb-6">
                    <div v-if="cartItems.length === 0" class="text-center py-8 text-gray-500">
                        <i class="fas fa-shopping-cart text-4xl mb-3 text-gray-300"></i>
                        <p>Корзина порожня</p>
                    </div>
                    
                    <div 
                        v-for="item in cartItems" 
                        :key="item.key"
                        class="cart-item border-b border-gray-200 pb-4">
                        <div class="flex items-start gap-4">
                            <img 
                                v-if="item.category_icon" 
                                :src="`/storage/${item.category_icon}`" 
                                :alt="item.category_name" 
                                class="w-12 h-12 object-contain rounded-lg">
                            <div 
                                v-else
                                class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tag text-primary"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ item.service_name }}</h4>
                                <p class="text-xs text-gray-500 mb-1">{{ item.category_name }}</p>
                                <p class="text-xs text-gray-500">
                                    Тип: {{ item.cleaning_type === 'individual' ? 'Індивідуальна' : 'Потокова' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center gap-3">
                                <button 
                                    type="button" 
                                    @click="updateQuantity(item.key, -1)" 
                                    class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-minus text-gray-600 text-xs"></i>
                                </button>
                                <span class="font-semibold text-gray-800 w-8 text-center">{{ item.quantity }}</span>
                                <button 
                                    type="button" 
                                    @click="updateQuantity(item.key, 1)" 
                                    class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-plus text-gray-600 text-xs"></i>
                                </button>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-primary">{{ formatPrice(item.total) }}₴</div>
                                <div class="text-xs text-gray-500">{{ formatPrice(item.price) }}₴ за од.</div>
                            </div>
                            <button 
                                type="button" 
                                @click="removeFromCart(item.key)" 
                                class="text-red-500 hover:text-red-700 ml-4">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Cart Total -->
                <div v-if="cartItems.length > 0" class="border-t border-gray-200 pt-4 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-lg font-semibold text-gray-700">Разом:</span>
                        <span class="text-2xl font-bold text-primary">{{ formatPrice(cartTotal) }}₴</span>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <a 
                            :href="checkoutUrl" 
                            class="block w-full text-center py-3 px-6 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors duration-300">
                            Оформити замовлення
                        </a>
                        <button 
                            type="button" 
                            @click="requestConsultation" 
                            class="block w-full text-center py-3 px-6 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary/10 transition-colors duration-300">
                            Викликати консультацію
                        </button>
                    </div>
                </div>
                
                <!-- Clear Cart Button -->
                <button 
                    v-if="cartItems.length > 0"
                    type="button" 
                    @click="clearCart" 
                    class="w-full text-center py-2 px-4 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-300 text-sm font-semibold">
                    Очистити корзину
                </button>
            </div>
            </div>
        </transition>
        
        <!-- Consultation Modal -->
        <div 
            v-if="showConsultationModal"
            @click="closeConsultationModal"
            class="fixed inset-0 z-[10000] flex items-center justify-center bg-black bg-opacity-50">
            <div 
                @click.stop
                class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Викликати консультацію</h3>
                    <button type="button" @click="closeConsultationModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form @submit.prevent="submitConsultation">
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Номер телефону</label>
                        <input 
                            type="tel" 
                            v-model="consultationPhone"
                            required 
                            placeholder="+380991234567"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200">
                    </div>
                    
                    <div class="flex gap-3">
                        <button 
                            type="button" 
                            @click="closeConsultationModal" 
                            class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-lg font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                            Скасувати
                        </button>
                        <button 
                            type="submit" 
                            class="flex-1 px-4 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors">
                            Відправити
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CartComponent',
    data() {
        return {
            isOpen: false,
            cartItems: [],
            cartTotal: 0,
            cartCount: 0,
            showConsultationModal: false,
            consultationPhone: '',
            checkoutUrl: '/oformlennya-zamovlennya'
        };
    },
    mounted() {
        this.loadCart();
        // Listen for cart updates from other components - несколько способов для надежности
        this.$root.$on('cart-updated', this.loadCart);
        // Также слушаем глобальное событие через window
        window.addEventListener('cart-updated', this.loadCart);
        // Mount cart buttons to navigation
        this.mountButtons();
    },
    beforeDestroy() {
        this.$root.$off('cart-updated', this.loadCart);
        window.removeEventListener('cart-updated', this.loadCart);
    },
    methods: {
        formatPrice(price) {
            // Безопасное форматирование цены - преобразуем в число перед toFixed
            const numPrice = parseFloat(price) || 0;
            return numPrice.toFixed(0);
        },
        mountButtons() {
            // Mount desktop button using render function
            const desktopMount = document.getElementById('cart-button-desktop');
            if (desktopMount && !desktopMount.querySelector('button')) {
                const DesktopButton = Vue.extend({
                    render: function(h) {
                        const parent = this.$parent;
                        return h('button', {
                            attrs: {
                                type: 'button',
                                id: 'cart-button-desktop-btn'
                            },
                            class: 'cart-toggle-btn relative flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200',
                            on: {
                                click: () => parent.toggleCart()
                            }
                        }, [
                            h('i', { class: 'fas fa-shopping-cart text-gray-700 text-xl' }),
                            h('span', {
                                attrs: {
                                    id: 'cart-badge-desktop'
                                },
                                class: [
                                    'absolute -top-1 -right-1 bg-primary text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center',
                                    parent.cartCount > 0 ? '' : 'hidden'
                                ]
                            }, parent.cartCount > 0 ? parent.cartCount.toString() : '0')
                        ]);
                    },
                    mounted() {
                        // Сохраняем ссылку на родительский компонент
                        const parentComponent = this.$parent;
                        // Watch for cart count changes - реактивное обновление
                        const unwatch = parentComponent.$watch('cartCount', () => {
                            this.$forceUpdate();
                            // Также обновляем DOM напрямую для мгновенной реакции
                            if (parentComponent && typeof parentComponent.updateBadges === 'function') {
                                parentComponent.updateBadges();
                            }
                        }, { immediate: true });
                        
                        // Сохраняем unwatch для очистки
                        this._unwatch = unwatch;
                    },
                    beforeDestroy() {
                        if (this._unwatch) {
                            this._unwatch();
                        }
                    }
                });
                new DesktopButton({ parent: this }).$mount(desktopMount);
            }
            
            // Mount mobile button
            const mobileMount = document.getElementById('cart-button-mobile');
            if (mobileMount && !mobileMount.querySelector('button')) {
                const MobileButton = Vue.extend({
                    render: function(h) {
                        const parent = this.$parent;
                        return h('button', {
                            attrs: {
                                type: 'button',
                                id: 'cart-button-mobile-btn'
                            },
                            class: 'cart-toggle-btn relative flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200',
                            on: {
                                click: () => {
                                    parent.toggleCart();
                                    if (typeof window.toggleMobileMenu === 'function') {
                                        window.toggleMobileMenu();
                                    }
                                }
                            }
                        }, [
                            h('i', { class: 'fas fa-shopping-cart text-gray-700 text-lg' }),
                            h('span', {
                                attrs: {
                                    id: 'cart-badge-mobile'
                                },
                                class: [
                                    'absolute -top-1 -right-1 bg-primary text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center',
                                    parent.cartCount > 0 ? '' : 'hidden'
                                ]
                            }, parent.cartCount > 0 ? parent.cartCount.toString() : '0')
                        ]);
                    },
                    mounted() {
                        // Сохраняем ссылку на родительский компонент
                        const parentComponent = this.$parent;
                        // Watch for cart count changes - реактивное обновление
                        const unwatch = parentComponent.$watch('cartCount', () => {
                            this.$forceUpdate();
                            // Также обновляем DOM напрямую для мгновенной реакции
                            if (parentComponent && typeof parentComponent.updateBadges === 'function') {
                                parentComponent.updateBadges();
                            }
                        }, { immediate: true });
                        
                        // Сохраняем unwatch для очистки
                        this._unwatch = unwatch;
                    },
                    beforeDestroy() {
                        if (this._unwatch) {
                            this._unwatch();
                        }
                    }
                });
                new MobileButton({ parent: this }).$mount(mobileMount);
            }
        },
        toggleCart() {
            this.isOpen = !this.isOpen;
            if (this.isOpen) {
                this.loadCart();
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        },
        async loadCart() {
            try {
                const response = await axios.get('/api/cart');
                this.cartItems = response.data.items || [];
                this.cartTotal = response.data.total || 0;
                this.cartCount = response.data.count || 0;
                
                // Обновляем badges в навигации реактивно
                this.updateBadges();
            } catch (error) {
                console.error('Error loading cart:', error);
            }
        },
        updateBadges() {
            // Обновляем badges напрямую через DOM для мгновенной реакции
            const desktopBadge = document.getElementById('cart-badge-desktop');
            const mobileBadge = document.getElementById('cart-badge-mobile');
            
            if (desktopBadge) {
                desktopBadge.textContent = this.cartCount > 0 ? this.cartCount.toString() : '0';
                if (this.cartCount > 0) {
                    desktopBadge.classList.remove('hidden');
                } else {
                    desktopBadge.classList.add('hidden');
                }
            }
            
            if (mobileBadge) {
                mobileBadge.textContent = this.cartCount > 0 ? this.cartCount.toString() : '0';
                if (this.cartCount > 0) {
                    mobileBadge.classList.remove('hidden');
                } else {
                    mobileBadge.classList.add('hidden');
                }
            }
            
            // Также принудительно обновляем компоненты кнопок через Vue
            this.$nextTick(() => {
                this.$forceUpdate();
            });
        },
        async updateQuantity(key, change) {
            const item = this.cartItems.find(i => i.key === key);
            if (!item) return;
            
            const newQuantity = item.quantity + change;
            if (newQuantity < 1) {
                this.removeFromCart(key);
                return;
            }
            
            try {
                const response = await axios.put(`/api/cart/${key}`, { quantity: newQuantity });
                this.cartItems = response.data.items || [];
                this.cartTotal = response.data.total || 0;
                this.cartCount = response.data.count || 0;
                this.updateBadges();
            } catch (error) {
                console.error('Error updating cart:', error);
            }
        },
        async removeFromCart(key) {
            try {
                const response = await axios.delete(`/api/cart/${key}`);
                this.cartItems = response.data.items || [];
                this.cartTotal = response.data.total || 0;
                this.cartCount = response.data.count || 0;
                this.updateBadges();
            } catch (error) {
                console.error('Error removing from cart:', error);
            }
        },
        async clearCart() {
            if (!confirm('Ви впевнені, що хочете очистити корзину?')) {
                return;
            }
            
            try {
                await axios.post('/api/cart/clear');
                this.cartItems = [];
                this.cartTotal = 0;
                this.cartCount = 0;
                this.updateBadges();
                this.showNotification('Корзина очищена', 'success');
            } catch (error) {
                console.error('Error clearing cart:', error);
            }
        },
        requestConsultation() {
            this.showConsultationModal = true;
        },
        closeConsultationModal() {
            this.showConsultationModal = false;
            this.consultationPhone = '';
        },
        async submitConsultation() {
            try {
                const response = await axios.post('/api/order/consultation', {
                    phone: this.consultationPhone
                });
                
                if (response.data.success) {
                    this.closeConsultationModal();
                    this.showNotification('Заявка на консультацію відправлена', 'success');
                } else {
                    this.showNotification(response.data.message || 'Помилка відправки заявки', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showNotification('Помилка відправки заявки', 'error');
            }
        },
        showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-20 right-4 z-[10001] px-6 py-4 rounded-lg shadow-lg transition-all duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
    }
};
</script>

<style scoped>
.cart-item {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Cart Modal Animation */
.slide-fade-enter-active {
    transition: transform 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: transform 0.3s ease-in;
}

.slide-fade-enter {
    transform: translateX(100%);
}

.slide-fade-leave-to {
    transform: translateX(100%);
}

.slide-fade-enter-to,
.slide-fade-leave {
    transform: translateX(0);
}

/* Overlay Fade Animation */
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>

