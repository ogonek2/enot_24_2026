<div class="py-20 gradient-button from-primary to-secondary">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center flex flex-col-reverse lg:flex-row">
            {{-- Content --}}
            <div class="text-white space-y-6 animate-fade-in-left">
                <h2 class="text-4xl lg:text-5xl font-bold leading-tight">
                    Бажаєте замовити <span class="text-primary">кур'єра</span><br>
                    або залишились питання?
                </h2>
                <p class="text-lg text-gray-200 leading-relaxed">
                    Протягом 10 хвилин після отримання замовлення з вами зв'яжеться наш менеджер для уточнення
                    деталей та узгодження умов — за умови, що замовлення надійшло в робочий час. Якщо звернення
                    отримано в неробочий час, ми сконтактуємо з вами наступного робочого дня в період з 10:00 до
                    20:00.
                </p>
                
                {{-- Quick Benefits --}}
                <div class="grid grid-cols-2 gap-4 pt-6">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-sm"></i>
                        </div>
                        <span class="text-sm">10 хвилин</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fas fa-phone text-sm"></i>
                        </div>
                        <span class="text-sm">Швидкий зв'язок</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fas fa-truck text-sm"></i>
                        </div>
                        <span class="text-sm">Безкоштовно</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-tie text-sm"></i>
                        </div>
                        <span class="text-sm">Персональний менеджер</span>
                    </div>
                </div>
            </div>
            
            {{-- Form --}}
            <div class="animate-fade-in-right">
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <form id="courierForm" action="{{ route('feedback.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="courier_name" class="block text-sm font-semibold text-gray-700 mb-2">Ім'я*</label>
                                <input type="text" name="name" id="courier_name" placeholder="Ваше ім'я" required
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none transition-all duration-300">
                                <div class="error-message" id="courier_nameError"></div>
                            </div>
                            <div class="form-group">
                                <label for="courier_phone" class="block text-sm font-semibold text-gray-700 mb-2">Номер телефону*</label>
                                <input type="tel" name="phone" id="courier_phone" placeholder="+380 (XX) XXX XX XX" required
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none transition-all duration-300">
                                <div class="error-message" id="courier_phoneError"></div>
                            </div>
                            <div class="form-group">
                                <label for="courier_message" class="block text-sm font-semibold text-gray-700 mb-2">Повідомлення</label>
                                <textarea name="message" id="courier_message" placeholder="Ваше повідомлення" rows="3"
                                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none transition-all duration-300 resize-none"></textarea>
                                <div class="error-message" id="courier_messageError"></div>
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <button id="courierSubmitBtn" type="submit" class="w-full bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Зв'язатися
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
