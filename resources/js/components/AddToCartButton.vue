<template>
    <div class="add-to-cart-container">
        <button 
            type="button"
            @click="openModal"
            class="add-to-cart-btn bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-all duration-300 flex items-center gap-2 font-semibold text-sm">
            <i class="fas fa-shopping-cart"></i>
            <span>Додати</span>
        </button>
    </div>
</template>

<script>
export default {
    name: 'AddToCartButton',
    props: {
        serviceId: {
            type: Number,
            required: true
        },
        serviceName: {
            type: String,
            default: ''
        },
        hasIndividual: {
            type: Boolean,
            default: false
        },
        price: {
            type: Number,
            default: 0
        },
        individualPrice: {
            type: Number,
            default: 0
        }
    },
    data() {
        return {
            showModal: false,
            cleaningType: 'stream',
            quantity: 1,
            modalInstance: null
        };
    },
    computed: {
        servicePrice() {
            return this.price || 0;
        },
        totalPrice() {
            const unitPrice = this.cleaningType === 'individual' && this.hasIndividual && this.individualPrice > 0
                ? this.individualPrice
                : this.servicePrice;
            return unitPrice * this.quantity;
        }
    },
    watch: {
        showModal(newVal) {
            if (newVal) {
                this.$nextTick(() => {
                    this.createModal();
                });
            } else {
                this.destroyModal();
            }
        }
    },
    methods: {
        openModal() {
            this.showModal = true;
            this.cleaningType = 'stream';
            this.quantity = 1;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.showModal = false;
            document.body.style.overflow = '';
        },
        increaseQuantity() {
            this.quantity++;
        },
        decreaseQuantity() {
            if (this.quantity > 1) {
                this.quantity--;
            }
        },
        createModal() {
            // Удаляем старую модалку если есть
            this.destroyModal();
            
            // Сохраняем ссылку на родительский компонент
            const parentComponent = this;
            
            // Создаем контейнер для модалки в body
            const modalContainer = document.createElement('div');
            modalContainer.id = `add-to-cart-modal-${this._uid}`;
            document.body.appendChild(modalContainer);
            
            // Создаем Vue экземпляр для модалки
            const Modal = {
                data() {
                    return {
                        showModal: parentComponent.showModal,
                        cleaningType: parentComponent.cleaningType,
                        quantity: parentComponent.quantity
                    };
                },
                template: `
                    <div 
                        v-if="showModal"
                        @click="closeModal"
                        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50">
                        <div 
                            @click.stop
                            class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-gray-800">Додати до корзини</h3>
                                <button type="button" @click="closeModal" class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                            
                            <form @submit.prevent="submitAddToCart">
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Тип чистки</label>
                                    <div class="space-y-2">
                                        <label 
                                            class="flex items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-primary transition-colors"
                                            :class="{ 'border-primary bg-gray-50': cleaningType === 'stream' }">
                                            <input 
                                                type="radio" 
                                                v-model="cleaningType" 
                                                value="stream" 
                                                class="mr-3 text-primary">
                                            <div class="flex-1">
                                                <span class="font-semibold text-gray-800">Потокова</span>
                                                <div class="text-sm text-gray-500">{{ getServicePrice() }}₴ за одиницю</div>
                                            </div>
                                        </label>
                                        <label 
                                            v-if="hasIndividualPrice()"
                                            class="flex items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-primary transition-colors"
                                            :class="{ 'border-primary bg-gray-50': cleaningType === 'individual' }">
                                            <input 
                                                type="radio" 
                                                v-model="cleaningType" 
                                                value="individual" 
                                                class="mr-3 text-primary">
                                            <div class="flex-1">
                                                <span class="font-semibold text-gray-800">Індивідуальна</span>
                                                <div class="text-sm text-gray-500">{{ getIndividualPrice() }}₴ за одиницю</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Кількість</label>
                                    <div class="flex items-center gap-3">
                                        <button 
                                            type="button" 
                                            @click="decreaseQuantity" 
                                            class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-minus text-gray-600"></i>
                                        </button>
                                        <input 
                                            type="number" 
                                            v-model.number="quantity" 
                                            min="1" 
                                            class="w-20 text-center border-2 border-gray-300 rounded-lg py-2 font-semibold">
                                        <button 
                                            type="button" 
                                            @click="increaseQuantity" 
                                            class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-plus text-gray-600"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-600">Разом:</span>
                                        <span class="text-2xl font-bold text-primary">{{ getTotalPrice() }}₴</span>
                                    </div>
                                </div>
                                
                                <div class="flex gap-3">
                                    <button 
                                        type="button" 
                                        @click="closeModal" 
                                        class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-lg font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                                        Скасувати
                                    </button>
                                    <button 
                                        type="submit" 
                                        class="flex-1 px-4 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors">
                                        Додати
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                `,
                watch: {
                    cleaningType: function(newVal) {
                        parentComponent.cleaningType = newVal;
                    },
                    quantity: function(newVal) {
                        parentComponent.quantity = newVal;
                    }
                },
                mounted() {
                    // Синхронизируем изменения из родительского компонента
                    const unwatchShowModal = parentComponent.$watch('showModal', (newVal) => {
                        this.showModal = newVal;
                        if (!newVal) {
                            this.$destroy();
                        }
                    });
                    const unwatchCleaningType = parentComponent.$watch('cleaningType', (newVal) => {
                        this.cleaningType = newVal;
                    });
                    const unwatchQuantity = parentComponent.$watch('quantity', (newVal) => {
                        this.quantity = newVal;
                    });
                    
                    // Сохраняем unwatch функции для очистки
                    this._unwatch = [unwatchShowModal, unwatchCleaningType, unwatchQuantity];
                },
                beforeDestroy() {
                    // Останавливаем watchers
                    if (this._unwatch) {
                        this._unwatch.forEach(fn => fn());
                    }
                },
                methods: {
                    closeModal() { parentComponent.closeModal(); },
                    decreaseQuantity() { parentComponent.decreaseQuantity(); },
                    increaseQuantity() { parentComponent.increaseQuantity(); },
                    submitAddToCart() { parentComponent.submitAddToCart(); },
                    getServicePrice() {
                        return parentComponent.servicePrice || 0;
                    },
                    getIndividualPrice() {
                        return parentComponent.individualPrice || 0;
                    },
                    hasIndividualPrice() {
                        return parentComponent.hasIndividual && parentComponent.individualPrice > 0;
                    },
                    getTotalPrice() {
                        const unitPrice = this.cleaningType === 'individual' && parentComponent.hasIndividual && parentComponent.individualPrice > 0
                            ? parentComponent.individualPrice
                            : parentComponent.servicePrice;
                        return (unitPrice * this.quantity).toFixed(0);
                    }
                }
            };
            
            this.modalInstance = new Vue({
                el: modalContainer,
                render: h => h(Modal)
            });
        },
        destroyModal() {
            if (this.modalInstance) {
                this.modalInstance.$destroy();
                if (this.modalInstance.$el && this.modalInstance.$el.parentNode) {
                    this.modalInstance.$el.parentNode.removeChild(this.modalInstance.$el);
                }
                this.modalInstance = null;
            }
        },
        async submitAddToCart() {
            try {
                // Отправляем cleaning_type в формате, который ожидает контроллер: 'individual' или 'stream'
                const response = await axios.post('/api/cart/add', {
                    service_id: this.serviceId,
                    quantity: this.quantity,
                    cleaning_type: this.cleaningType // Уже 'individual' или 'stream'
                });
                
                if (response.data.success) {
                    this.closeModal();
                    // Эмитируем событие обновления корзины - используем несколько способов для надежности
                    this.$root.$emit('cart-updated');
                    // Также эмитируем через window для компонентов вне Vue дерева
                    window.dispatchEvent(new CustomEvent('cart-updated'));
                    this.showNotification('Товар додано до корзини', 'success');
                } else {
                    this.showNotification(response.data.message || 'Помилка додавання товару', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                if (error.response && error.response.data && error.response.data.message) {
                    this.showNotification(error.response.data.message, 'error');
                } else {
                    this.showNotification('Помилка додавання товару', 'error');
                }
            }
        },
        showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-20 right-4 z-[10000] px-6 py-4 rounded-lg shadow-lg transition-all duration-300 ${
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
    },
    beforeDestroy() {
        this.destroyModal();
    }
};
</script>

<style scoped>
input[type="radio"]:checked + div {
    border-color: #7470BF;
}
</style>
