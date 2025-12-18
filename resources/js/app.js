/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Подключаем скрипт интерактивного круга в hero-секции
require('./hero-circle');

// Используем полную версию Vue с компилятором шаблонов (CommonJS версия для require)
// vue.js - это полная версия с компилятором шаблонов для CommonJS
window.Vue = require('vue/dist/vue.js');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Register Vue components
const files = require.context('./components', true, /\.vue$/i);
files.keys().forEach(key => {
    try {
        const component = files(key).default;
        if (!component) {
            console.warn('Component not found:', key);
            return;
        }
        
        const name = key.split('/').pop().split('.')[0];
        // Convert PascalCase to kebab-case for component registration
        // Better regex: insert hyphen before uppercase letters, except for the first one
        let kebabName = name
            .replace(/([a-z0-9])([A-Z])/g, '$1-$2')  // Add hyphen between lowercase/numbers and uppercase
            .replace(/([A-Z]+)([A-Z][a-z])/g, '$1-$2') // Handle consecutive uppercase letters
            .toLowerCase();
        
        // Ensure component name is valid (must start with a letter, not hyphen)
        // Remove leading hyphen if any
        if (kebabName.startsWith('-')) {
            kebabName = kebabName.substring(1);
        }
        
        if (Vue && typeof Vue.component === 'function') {
            Vue.component(kebabName, component);
            // Also register with original name (camelCase) for convenience
            if (kebabName !== name && !name.includes('-')) {
                Vue.component(name, component);
            }
            console.log('Registered Vue component:', kebabName);
        } else {
            console.error('Vue.component is not a function. Vue:', Vue);
        }
    } catch (error) {
        console.error('Error registering component:', key, error);
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Точечное монтирование Vue компонентов - минимальное влияние на сайт
// Vue монтируется только в свои контейнеры, не влияет на остальной HTML
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        mountVueComponents();
    });
} else {
    mountVueComponents();
}

function mountVueComponents() {
    const Vue = window.Vue;
    
    if (!Vue || typeof Vue !== 'function') {
        console.error('Vue is not available');
        return;
    }
    
    try {
        // Монтируем корзину через кастомный тег
        const cartContainers = document.querySelectorAll('vue-cart-container');
        cartContainers.forEach(container => {
            if (!container.dataset.vueMounted) {
                container.dataset.vueMounted = 'true';
                new Vue({
                    el: container,
                    template: '<cart-component></cart-component>'
                });
                console.log('Cart component mounted');
            }
        });
        
        // Монтируем слайдер отделений
        const branchesSliderApp = document.getElementById('branches-slider-app');
        if (branchesSliderApp && !branchesSliderApp.dataset.vueMounted) {
            branchesSliderApp.dataset.vueMounted = 'true';
            const branchesData = branchesSliderApp.dataset.branches 
                ? JSON.parse(branchesSliderApp.dataset.branches) 
                : [];
            const initialCity = branchesSliderApp.dataset.initialCity || 'Київ';
            
            new Vue({
                el: branchesSliderApp,
                template: '<branches-slider :branches="branches" :initial-city="initialCity"></branches-slider>',
                data: {
                    branches: branchesData,
                    initialCity: initialCity
                }
            });
            console.log('Branches slider component mounted');
        }
        
        // Монтируем слайдер рекомендаций
        const recommendationsSliderApp = document.getElementById('recommendations-slider-app');
        if (recommendationsSliderApp && !recommendationsSliderApp.dataset.vueMounted) {
            recommendationsSliderApp.dataset.vueMounted = 'true';
            new Vue({
                el: recommendationsSliderApp,
                template: '<recommendations-slider></recommendations-slider>'
            });
            console.log('Recommendations slider component mounted');
        }
        
        // Монтируем блок акций
        const promotionsBlockApp = document.getElementById('promotions-block-app');
        if (promotionsBlockApp && !promotionsBlockApp.dataset.vueMounted) {
            promotionsBlockApp.dataset.vueMounted = 'true';
            const promotionsData = promotionsBlockApp.dataset.promotions 
                ? JSON.parse(promotionsBlockApp.dataset.promotions) 
                : [];
            
            new Vue({
                el: promotionsBlockApp,
                template: '<promotions-block :promotions="promotions"></promotions-block>',
                data: {
                    promotions: promotionsData
                }
            });
            console.log('Promotions block component mounted');
        }
        
        // Монтируем кнопки добавления в корзину через data-атрибуты
        const addToCartWrappers = document.querySelectorAll('[data-vue-component="add-to-cart-button"]');
        addToCartWrappers.forEach(wrapper => {
            if (!wrapper.dataset.vueMounted) {
                wrapper.dataset.vueMounted = 'true';
                
                // Получаем props из data-атрибутов
                const props = {
                    serviceId: parseInt(wrapper.dataset.serviceId || '0'),
                    serviceName: wrapper.dataset.serviceName || '',
                    hasIndividual: wrapper.dataset.hasIndividual === 'true',
                    price: parseFloat(wrapper.dataset.price || '0'),
                    individualPrice: parseFloat(wrapper.dataset.individualPrice || '0')
                };
                
                // Монтируем Vue компонент прямо в wrapper
                new Vue({
                    el: wrapper,
                    template: `<add-to-cart-button 
                        :service-id="${props.serviceId}"
                        service-name="'${props.serviceName.replace(/'/g, "\\'")}'"
                        :has-individual="${props.hasIndividual}"
                        :price="${props.price}"
                        :individual-price="${props.individualPrice}">
                    </add-to-cart-button>`
                });
            }
        });
        
        console.log('Vue components mounted successfully');
    } catch (error) {
        console.error('Error mounting Vue components:', error);
    }
}
