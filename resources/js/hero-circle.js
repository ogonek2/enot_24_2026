/**
 * Hero Interactive Circle Script
 * Управляет интерактивным кругом в hero-секции
 */

(function() {
    'use strict';
    
    let circle = null;
    let heroBox = null;
    let animationFrameId = null;
    let isInitialized = false;
    
    function initHeroCircle() {
        // Предотвращаем повторную инициализацию
        if (isInitialized) {
            return;
        }
        
        try {
            circle = document.getElementById('hero-interactive-circle');
            if (!circle) {
                return;
            }
            
            // Находим родительский контейнер (hero-секция)
            heroBox = circle.closest('.bg-white');
            if (!heroBox) {
                // Пробуем найти другой родительский контейнер
                heroBox = circle.parentElement;
            }
            
            if (!heroBox) {
                console.warn('Hero box container not found');
                return;
            }
            
            // Скрываем на мобильных устройствах
            if (window.innerWidth < 1024) {
                circle.style.display = 'none';
                return;
            }
            
            // Показываем круг
            circle.style.display = 'flex';
            
            // Устанавливаем начальную позицию: по центру горизонтально, 100px снизу
            const circleRadius = 100; // Радиус круга (200px / 2)
            const initialX = heroBox.offsetWidth / 2; // Центр по горизонтали
            const initialY = heroBox.offsetHeight - 180 - circleRadius; // 100px снизу
            
            // Устанавливаем позицию
            circle.style.position = 'absolute';
            circle.style.left = initialX + 'px';
            circle.style.top = initialY + 'px';
            circle.style.transform = 'translate(-50%, -50%)';
            circle.style.right = 'auto';
            circle.style.bottom = 'auto';
            
            // Переменные для отслеживания позиции
            let currentX = initialX;
            let currentY = initialY;
            let targetX = initialX;
            let targetY = initialY;
            let mouseX = 0;
            let mouseY = 0;
            let isHovering = false;
            
            const followRadius = 70; // Радиус следования за курсором
            const followSpeed = 0.15; // Скорость следования (0-1)
            
            // Обработчик движения мыши
            function handleMouseMove(e) {
                if (!heroBox || !circle) return;
                
                const rect = heroBox.getBoundingClientRect();
                mouseX = e.clientX - rect.left;
                mouseY = e.clientY - rect.top;
                isHovering = true;
            }
            
            // Обработчик входа мыши в область
            function handleMouseEnter() {
                isHovering = true;
            }
            
            // Обработчик выхода мыши из области
            function handleMouseLeave() {
                isHovering = false;
                // Возвращаемся к начальной позиции
                targetX = initialX;
                targetY = initialY;
            }
            
            // Добавляем обработчики событий
            heroBox.addEventListener('mousemove', handleMouseMove, { passive: true });
            heroBox.addEventListener('mouseenter', handleMouseEnter, { passive: true });
            heroBox.addEventListener('mouseleave', handleMouseLeave, { passive: true });
            
            // Функция обновления позиции
            function updatePosition() {
                if (!circle || !heroBox) {
                    return;
                }
                
                // Вычисляем целевую позицию
                if (isHovering && mouseX > 0 && mouseY > 0) {
                    // Вычисляем расстояние от начальной позиции до курсора
                    const dx = mouseX - initialX;
                    const dy = mouseY - initialY;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance <= followRadius) {
                        // Курсор в пределах радиуса - следуем за ним
                        targetX = mouseX;
                        targetY = mouseY;
                    } else {
                        // Курсор за пределами радиуса - ограничиваем движение
                        const angle = Math.atan2(dy, dx);
                        targetX = initialX + Math.cos(angle) * followRadius;
                        targetY = initialY + Math.sin(angle) * followRadius;
                    }
                } else {
                    // Возвращаемся к начальной позиции
                    targetX = initialX;
                    targetY = initialY;
                }
                
                // Плавное движение к целевой позиции
                currentX += (targetX - currentX) * followSpeed;
                currentY += (targetY - currentY) * followSpeed;
                
                // Ограничиваем позицию границами контейнера
                const rect = heroBox.getBoundingClientRect();
                const minX = circleRadius;
                const maxX = rect.width - circleRadius;
                const minY = circleRadius;
                const maxY = rect.height - circleRadius;
                
                currentX = Math.max(minX, Math.min(maxX, currentX));
                currentY = Math.max(minY, Math.min(maxY, currentY));
                
                // Применяем позицию
                circle.style.left = currentX + 'px';
                circle.style.top = currentY + 'px';
                
                // Продолжаем анимацию
                animationFrameId = requestAnimationFrame(updatePosition);
            }
            
            // Обработчик клика
            circle.addEventListener('click', function(e) {
                e.stopPropagation();
                const modalId = circle.getAttribute('data-modal');
                if (modalId) {
                    const trigger = document.querySelector('.modal_fade[data-modal="' + modalId + '"]');
                    if (trigger) {
                        trigger.click();
                    }
                }
            });
            
            // Запускаем анимацию
            updatePosition();
            
            isInitialized = true;
            console.log('Hero circle initialized successfully');
            
        } catch (error) {
            console.error('Error initializing hero circle:', error);
        }
    }
    
    // Функция для очистки при размонтировании
    function cleanup() {
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
            animationFrameId = null;
        }
        isInitialized = false;
        circle = null;
        heroBox = null;
    }
    
    // Функция инициализации с проверками
    function tryInitCircle() {
        const circleElement = document.getElementById('hero-interactive-circle');
        if (circleElement && !isInitialized) {
            initHeroCircle();
            return true;
        }
        return false;
    }
    
    // Инициализация при загрузке DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            // Даем время другим скриптам загрузиться
            setTimeout(tryInitCircle, 500);
        });
    } else {
        // DOM уже загружен
        setTimeout(tryInitCircle, 500);
    }
    
    // Дополнительная попытка после полной загрузки страницы
    window.addEventListener('load', function() {
        setTimeout(tryInitCircle, 1000);
    });
    
    // Обработка изменения размера окна
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            cleanup();
            setTimeout(tryInitCircle, 100);
        }, 250);
    });
    
})();
