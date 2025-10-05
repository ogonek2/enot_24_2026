<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-secondary mb-4">
                <i class="fas fa-list text-primary mr-3"></i>
                Наші послуги
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Повний спектр послуг екочистки для вашого комфорту
            </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-12 items-center flex flex-col-reverse lg:flex-row">
            {{-- Image --}}
            <div class="animate-fade-in-left">
                <div class="relative">
                    <img src="{{ asset('storage/source/images/services/slide_img_01.png') }}"
                         alt="Екочистка одягу та домашнього текстилю"
                         class="w-full h-auto rounded-2xl shadow-2xl">
                    {{-- Floating Elements --}}
                    <div class="absolute -top-4 -right-4 bg-primary text-white p-4 rounded-full shadow-lg animate-bounce-slow">
                        <i class="fas fa-leaf text-2xl"></i>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-success text-white p-4 rounded-full shadow-lg animate-pulse-slow">
                        <i class="fas fa-check text-2xl"></i>
                    </div>
                </div>
            </div>
            
            {{-- Services --}}
            <div class="space-y-8 animate-fade-in-right">
                {{-- Home & Hotel Textiles --}}
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-home text-primary text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary">Домашній та готельний текстиль</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Постільна білизна</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Наматрасники</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Штори та тюлі</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Чистка ковдр та наматрасників</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Прасування одягу</span>
                        </li>
                    </ul>
                </div>
                
                {{-- Special Clothing --}}
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-primary/10 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-tshirt text-primary text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary">Спецодяг, шкіра та хутро</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Чистка одягу зі шкіри та дублянок</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Чистка хутра, шуб, та хутряних виробів</span>
                        </li>
                    </ul>
                </div>
                
                {{-- B2B Services --}}
                <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-primary/20 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-building text-primary text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary">B2B послуги</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Прання</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Аквачистка</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Прасування</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Хімчистка</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <span class="text-gray-700">Чистка</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        {{-- CTA Section --}}
        <div class="mt-16 text-center">
            <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-4">Готові замовити послугу?</h3>
                <p class="text-lg opacity-90 mb-6">Зв'яжіться з нами або викличте кур'єра для консультації</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-primary hover:bg-gray-100 px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl modal_fade" data-modal="feedbackmd">
                        <i class="fas fa-phone mr-2"></i>
                        Замовити зараз
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
