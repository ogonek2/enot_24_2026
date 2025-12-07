// Modern UI JavaScript for Enhanced User Experience

class ModernUI {
    constructor() {
        this.init();
    }

    init() {
        this.setupAnimations();
        this.setupSmoothScrolling();
        this.setupFloatingElements();
        this.setupFormEnhancements();
        this.setupLoadingStates();
        this.setupTooltips();
        this.setupParallaxEffects();
        this.setupMobileMenu();
    }

    // Animation System - Disabled
    setupAnimations() {
        // Remove all animation classes and make elements visible immediately
        document.querySelectorAll('.animate-fade-in-up, .animate-fade-in-left, .animate-fade-in-right').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
            el.style.visibility = 'visible';
            el.style.transition = 'none';
            el.classList.remove('animate-fade-in-up', 'animate-fade-in-left', 'animate-fade-in-right');
        });

        // Remove animation delays from grid items
        document.querySelectorAll('.grid > div').forEach((item) => {
            item.style.animationDelay = '0s';
        });
    }

    // Smooth Scrolling
    setupSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Floating Elements Animation
    setupFloatingElements() {
        const floatingElements = document.querySelectorAll('.animate-bounce-slow, .animate-pulse-slow');
        
        floatingElements.forEach(element => {
            // Add random floating animation
            const randomDelay = Math.random() * 2;
            const randomDuration = 2 + Math.random() * 2;
            
            element.style.animationDelay = `${randomDelay}s`;
            element.style.animationDuration = `${randomDuration}s`;
        });
    }

    // Form Enhancements
    setupFormEnhancements() {
        // Enhanced input focus effects
        document.querySelectorAll('input, textarea, select').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });

        // Form validation with visual feedback
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const inputs = this.querySelectorAll('input[required], textarea[required]');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('error');
                        isValid = false;
                    } else {
                        input.classList.remove('error');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    this.classList.add('shake');
                    setTimeout(() => this.classList.remove('shake'), 500);
                }
            });
        });
    }

    // Loading States - DISABLED
    setupLoadingStates() {
        // Loading states disabled - no loading indicators
        return;

        // Image loading disabled - images show immediately
        // No fade-in effect for images
    }

    // Tooltips
    setupTooltips() {
        document.querySelectorAll('[data-tooltip]').forEach(element => {
            element.addEventListener('mouseenter', function() {
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.textContent = this.getAttribute('data-tooltip');
                document.body.appendChild(tooltip);

                const rect = this.getBoundingClientRect();
                tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
                tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';
            });

            element.addEventListener('mouseleave', function() {
                const tooltip = document.querySelector('.tooltip');
                if (tooltip) {
                    tooltip.remove();
                }
            });
        });
    }

    // Parallax Effects
    setupParallaxEffects() {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax');
            
            parallaxElements.forEach(element => {
                const speed = element.dataset.speed || 0.5;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    }

    // Mobile Menu
    setupMobileMenu() {
        console.log('Setting up mobile menu...');
        
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        console.log('Mobile menu button:', mobileMenuButton);
        console.log('Mobile menu:', mobileMenu);
        
        if (mobileMenuButton && mobileMenu) {
            let isOpen = false;
            
            // Mark as initialized
            mobileMenuButton.setAttribute('data-initialized', 'true');
            
            // Ensure menu starts closed
            mobileMenu.classList.add('-translate-y-full');
            mobileMenu.classList.remove('translate-y-0');
            
            mobileMenuButton.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                console.log('Mobile menu button clicked, isOpen:', isOpen);
                
                isOpen = !isOpen;
                
                if (isOpen) {
                    console.log('Opening mobile menu');
                    mobileMenu.classList.remove('-translate-y-full');
                    mobileMenu.classList.add('translate-y-0');
                    document.body.style.overflow = 'hidden';
                    
                    // Animate hamburger lines
                    const lines = mobileMenuButton.querySelectorAll('span');
                    if (lines.length >= 3) {
                        lines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                        lines[1].style.opacity = '0';
                        lines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
                    }
                } else {
                    console.log('Closing mobile menu');
                    mobileMenu.classList.remove('translate-y-0');
                    mobileMenu.classList.add('-translate-y-full');
                    document.body.style.overflow = '';
                    
                    // Reset hamburger lines
                    const lines = mobileMenuButton.querySelectorAll('span');
                    if (lines.length >= 3) {
                        lines[0].style.transform = '';
                        lines[1].style.opacity = '';
                        lines[2].style.transform = '';
                    }
                }
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (isOpen && !mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                    console.log('Closing menu - clicked outside');
                    isOpen = false;
                    mobileMenu.classList.remove('translate-y-0');
                    mobileMenu.classList.add('-translate-y-full');
                    document.body.style.overflow = '';
                    
                    // Reset hamburger lines
                    const lines = mobileMenuButton.querySelectorAll('span');
                    if (lines.length >= 3) {
                        lines[0].style.transform = '';
                        lines[1].style.opacity = '';
                        lines[2].style.transform = '';
                    }
                }
            });
            
            // Close menu on window resize to desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024 && isOpen) {
                    console.log('Closing menu - resized to desktop');
                    isOpen = false;
                    mobileMenu.classList.remove('translate-y-0');
                    mobileMenu.classList.add('-translate-y-full');
                    document.body.style.overflow = '';
                    
                    // Reset hamburger lines
                    const lines = mobileMenuButton.querySelectorAll('span');
                    if (lines.length >= 3) {
                        lines[0].style.transform = '';
                        lines[1].style.opacity = '';
                        lines[2].style.transform = '';
                    }
                }
            });
            
            console.log('Mobile menu setup complete');
        } else {
            console.error('Mobile menu elements not found!');
        }
    }

    // Utility Methods
    static showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    static showModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('active');
            document.body.classList.add('modal-open');
        }
    }

    static hideModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            document.body.classList.remove('modal-open');
        }
    }

    // Reinitialize animations for dynamically loaded content - Disabled
    static reinitializeAnimations() {
        // Remove all animation classes and make elements visible immediately
        document.querySelectorAll('.animate-fade-in-up, .animate-fade-in-left, .animate-fade-in-right').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
            el.style.visibility = 'visible';
            el.style.transition = 'none';
            el.classList.remove('animate-fade-in-up', 'animate-fade-in-left', 'animate-fade-in-right');
        });
    }

    // Reinitialize images disabled - images show immediately
    static reinitializeImages() {
        // No image reinitialization needed
        return;
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing ModernUI...');
    new ModernUI();
});

// Alternative initialization for cases where DOMContentLoaded already fired
if (document.readyState === 'loading') {
    // DOM is still loading, wait for DOMContentLoaded
} else {
    // DOM is already loaded
    console.log('DOM already loaded, initializing ModernUI immediately...');
    new ModernUI();
}

// Global function to reinitialize animations
window.reinitializeAnimations = () => {
    ModernUI.reinitializeAnimations();
};

// Global function to reinitialize images - DISABLED
window.reinitializeImages = () => {
    // Images show immediately, no reinitialization needed
    return;
};

// Simple mobile menu fallback function
window.setupMobileMenuFallback = () => {
    console.log('Setting up mobile menu fallback...');
    
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        let isOpen = false;
        
        // Ensure menu starts closed
        mobileMenu.style.transform = 'translateY(-100%)';
        
        mobileMenuButton.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            isOpen = !isOpen;
            
            if (isOpen) {
                mobileMenu.style.transform = 'translateY(0)';
                document.body.style.overflow = 'hidden';
            } else {
                mobileMenu.style.transform = 'translateY(-100%)';
                document.body.style.overflow = '';
            }
        });
        
        console.log('Mobile menu fallback setup complete');
    } else {
        console.error('Mobile menu elements not found for fallback!');
    }
};

// Try fallback if main setup fails
setTimeout(() => {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    if (mobileMenuButton && !mobileMenuButton.hasAttribute('data-initialized')) {
        console.log('Main mobile menu setup failed, trying fallback...');
        window.setupMobileMenuFallback();
    }
}, 1000);

// Add CSS for enhanced UI elements
const style = document.createElement('style');
style.textContent = `
    /* Enhanced Form Styles */
    .focused input, .focused textarea, .focused select {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(48, 193, 240, 0.1);
    }

    .error {
        border-color: var(--error) !important;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
    }

    .shake {
        animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* Loading States - DISABLED */
    .loading {
        /* Loading states disabled */
    }

    /* Image loading styles removed - images now show immediately */
    img {
        opacity: 1;
    }

    /* Tooltips */
    .tooltip {
        position: absolute;
        background: rgba(0, 0, 0, 0.9);
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 14px;
        z-index: 1000;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .tooltip::after {
        content: '';
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border: 5px solid transparent;
        border-top-color: rgba(0, 0, 0, 0.9);
    }

    /* Notifications */
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    }

    .notification.show {
        transform: translateX(0);
    }

    .notification-success {
        border-left: 4px solid var(--success);
    }

    .notification-error {
        border-left: 4px solid var(--error);
    }

    .notification-content {
        display: flex;
        align-items: center;
        padding: 16px;
        gap: 12px;
    }

    .notification-success .notification-content i {
        color: var(--success);
    }

    .notification-error .notification-content i {
        color: var(--error);
    }

    /* Modal Enhancements */
    .modal-open {
        overflow: hidden;
    }

    /* Parallax Elements */
    .parallax {
        will-change: transform;
    }

    /* Enhanced Hover Effects */
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Pulse Animation */
    .pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    /* Disable all animations - make everything visible immediately */
    .animate-fade-in-up,
    .animate-fade-in-left,
    .animate-fade-in-right {
        opacity: 1 !important;
        transform: none !important;
        visibility: visible !important;
        animation: none !important;
        transition: none !important;
    }

    /* Mobile Menu Styles */
    #mobile-menu {
        overflow-y: auto;
        z-index: 9999 !important;
        position: fixed !important;
        background: white !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    }

    /* Ensure menu is visible when open */
    #mobile-menu.translate-y-0 {
        transform: translateY(0) !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    #mobile-menu.-translate-y-full {
        transform: translateY(-100%) !important;
        opacity: 0 !important;
        visibility: hidden !important;
    }

    /* Smooth scrollbar for mobile menu */
    #mobile-menu::-webkit-scrollbar {
        width: 4px;
    }

    #mobile-menu::-webkit-scrollbar-track {
        background: transparent;
    }

    #mobile-menu::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 2px;
    }

    #mobile-menu::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 0, 0, 0.3);
    }
`;
document.head.appendChild(style);
