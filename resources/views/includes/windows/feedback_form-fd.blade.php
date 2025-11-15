{{-- Modal Overlay --}}
<div class="modal feedback fixed inset-0 hidden items-center justify-center" id="modalfade_feedbackmd" style="z-index: 10100;">
    {{-- Backdrop --}}
    <div class="overlay close-modal-md absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 z-40" data-modal="feedbackmd"></div>
    
    {{-- Modal Container --}}
    <div class="modal-container relative z-50 w-full max-w-lg mx-4 pointer-events-none">
        <div class="bg-white p-6 md:p-8 rounded-2xl shadow-2xl w-full pointer-events-auto transform transition-all duration-300 scale-95 opacity-0 modal-content">
            {{-- Modal Header --}}
            <div class="m-head relative">
                <button class="close-modal-md absolute top-0 right-0 w-10 h-10 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full transition-all duration-200 z-10" data-modal="feedbackmd" aria-label="Закрити">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
                <h1 class="text-3xl md:text-4xl font-bold text-black mb-2 pr-10">Консультація</h1>
                <p class="text-gray-500 text-base md:text-lg">Заповніть форму і ми з вами зв'яжимось!</p>
            </div>
            
            {{-- Modal Body --}}
            <div class="m-body">
                {{-- Success Message --}}
                <div class="success-message hidden bg-green-50 border border-green-200 rounded-xl p-4 mb-6" id="successMessage">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <p class="text-green-800 font-medium">Дякуємо! Ми зв'яжемося з вами найближчим часом.</p>
                    </div>
                </div>
                
                {{-- Form --}}
                <form id="feedbackForm" action="{{ route('feedback.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- Name Field --}}
                    <div class="enter-element">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Ім'я <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            placeholder="Ваше ім'я" 
                            required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 text-gray-800 placeholder-gray-400">
                        <div class="error-message hidden mt-2 text-sm text-red-600" id="nameError"></div>
                    </div>
                    
                    {{-- Phone Field --}}
                    <div class="enter-element">
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            Номер телефону <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            name="phone" 
                            id="phone" 
                            required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 text-gray-800 placeholder-gray-400">
                        <div class="error-message hidden mt-2 text-sm text-red-600" id="phoneError"></div>
                    </div>
                    
                    {{-- Message Field --}}
                    <div class="enter-element">
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                            Повідомлення
                        </label>
                        <textarea 
                            name="message" 
                            id="message" 
                            placeholder="Ваше повідомлення" 
                            rows="4"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-200 text-gray-800 placeholder-gray-400 resize-none"></textarea>
                        <div class="error-message hidden mt-2 text-sm text-red-600" id="messageError"></div>
                    </div>
                    
                    {{-- Submit Button --}}
                    <div class="btn-sb pt-2">
                        <button 
                            type="submit" 
                            id="submitBtn"
                            class="w-full bg-gradient-to-r from-primary to-secondary text-white font-semibold py-4 px-6 rounded-xl hover:from-primary/90 hover:to-secondary/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Зв'язатися
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Modal display - override Tailwind hidden */
.modal:not(.hidden) {
    display: flex !important;
}

.modal.hidden {
    display: none !important;
}

/* Ensure modal content is visible when modal is active */
.modal.active .modal-content {
    transform: scale(1) !important;
    opacity: 1 !important;
    visibility: visible !important;
}

.modal.active .overlay {
    opacity: 1 !important;
    visibility: visible !important;
}

/* Initial state - hidden */
.modal .modal-content {
    transform: scale(0.95);
    opacity: 0;
    visibility: hidden;
    transition: transform 0.3s ease, opacity 0.3s ease, visibility 0.3s ease;
}

.modal .overlay {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

/* Error states */
.enter-element input.error,
.enter-element textarea.error {
    border-color: #ef4444;
    background-color: #fef2f2;
}

.error-message.show {
    display: block !important;
}

.success-message.show {
    display: block !important;
}
</style>
