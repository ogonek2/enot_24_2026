{{-- Success Modal Overlay --}}
<div class="modal success fixed inset-0 hidden items-center justify-center" id="successModal" style="z-index: 10200;">
    {{-- Backdrop --}}
    <div class="success-overlay absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity duration-300 z-40"></div>
    
    {{-- Modal Container --}}
    <div class="success-modal-container relative z-50 w-full max-w-md mx-4 pointer-events-none">
        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl w-full pointer-events-auto transform transition-all duration-500 scale-90 opacity-0 success-modal-content relative overflow-hidden">
            {{-- Animated Background Elements --}}
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-full -translate-y-16 translate-x-16 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-secondary/10 to-primary/10 rounded-full translate-y-12 -translate-x-12 animate-pulse" style="animation-delay: 0.5s;"></div>
            
            {{-- Content --}}
            <div class="relative z-10 text-center">
                {{-- Success Icon with Animation --}}
                <div class="mb-6 flex justify-center">
                    <div class="relative">
                        <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg transform scale-0 animate-scale-in">
                            <i class="fas fa-check text-white text-4xl"></i>
                        </div>
                        {{-- Ripple Effect --}}
                        <div class="absolute inset-0 rounded-full bg-green-400 animate-ripple opacity-75"></div>
                        <div class="absolute inset-0 rounded-full bg-green-400 animate-ripple opacity-50" style="animation-delay: 0.3s;"></div>
                        <div class="absolute inset-0 rounded-full bg-green-400 animate-ripple opacity-25" style="animation-delay: 0.6s;"></div>
                    </div>
                </div>
                
                {{-- Title --}}
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Дякуємо!
                </h2>
                
                {{-- Message --}}
                <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed">
                    Ваша заявка успішно відправлена.<br>
                    Ми зв'яжемося з вами найближчим часом!
                </p>
                
                {{-- Fun Message about Raccoons --}}
                <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl p-6 mb-8">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <span class="text-2xl">🦝</span>
                    </div>
                    <p class="text-sm text-gray-700 italic">
                        Наші єнотики вже почали обробляти вашу заявку!
                    </p>
                </div>
                
                {{-- Close Button --}}
                <button 
                    id="closeSuccessModal"
                    class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-white font-semibold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
                    type="button">
                    <i class="fas fa-check mr-2"></i>
                    Зрозуміло
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Success Modal Styles */
.success-modal-content {
    transform: scale(0.9);
    opacity: 0;
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.5s ease;
}

.success.active .success-modal-content {
    transform: scale(1) !important;
    opacity: 1 !important;
}

.success-overlay {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.success.active .success-overlay {
    opacity: 1 !important;
}

/* Success Icon Animations */
@keyframes scale-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes ripple {
    0% {
        transform: scale(1);
        opacity: 0.75;
    }
    100% {
        transform: scale(2.5);
        opacity: 0;
    }
}

.animate-scale-in {
    animation: scale-in 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.animate-ripple {
    animation: ripple 1.5s ease-out infinite;
}

/* Initial hidden state */
.success.hidden {
    display: none !important;
}

.success:not(.hidden) {
    display: flex !important;
}
</style>

