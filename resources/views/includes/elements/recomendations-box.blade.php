<div class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-secondary mb-4">
                <i class="fas fa-lightbulb text-primary mr-3"></i>
                Рекомендації по догляду
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Корисні поради для правильного догляду за вашим одягом
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Recommendation 1 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/1.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Вручну не можна прати замшу, шкіру, хутро, пір'я та інші делікатні матеріали.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 2 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/2.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Іноді побутові засоби можуть вивести пляму, але зіпсувати річ. Наприклад, відбілювач видалить червоне вино з жовтої сукні, проте знебарвить тканину. Щоб зберегти улюблені речі - краще звернутися до професійної чистки.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 3 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/3.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Деякі тканини (наприклад, штучний шовк) сідають при пранні та потребують особливого догляду.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 4 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/4.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Уважно вивчіть ярлики на одязі. Здавати річ у хімчистку можна, тільки якщо це дозволено виробником.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 5 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/1.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Не використовуйте машиине прання, якщо річ прикрашена мереживом, бісером, спеціальними складками або вишивкою.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 6 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.5s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/3.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Погано пришиті гудзики на пальто, затягування та розриви на тканині під час чищення можуть сприяти появі помітних дефектів.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 7 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/5.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Одяг із суміші натуральних волокон, шкіри та замші вимагає сухого чищення.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 8 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.7s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/6.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Перед пранням білизну потрібно правильно відсортувати, оптимально зробити це за позиціями.
                        </p>
                    </div>
                </div>
            </div>
            
            {{-- Recommendation 9 --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.8s;">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('storage/source/svg/icons/recomendation/7.svg') }}" alt="" class="w-6 h-6">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 leading-relaxed">
                            Якщо на речі утворилася складна пляма, яку не беруть звичайні побутові засоби, допоможе лише професійна чистка.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- CTA Section --}}
        <div class="mt-16 text-center">
            <div class="gradient-button from-primary to-secondary rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-4">Потрібна професійна допомога?</h3>
                <p class="text-lg opacity-90 mb-6">Зверніться до наших експертів для консультації та замовлення послуг</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-primary hover:bg-gray-100 px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl modal_fade" data-modal="feedbackmd">
                        <i class="fas fa-phone mr-2"></i>
                        Консультація
                    </button>
                    <a href="{{ route('courier_page') }}" class="border-2 border-white text-white hover:bg-white hover:text-secondary px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-truck mr-2"></i>
                        Викликати кур'єра
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>