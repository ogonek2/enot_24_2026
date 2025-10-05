<div class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-secondary mb-4">Наші послуги</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Виберіть потрібну послугу або викличте кур'єра для консультації
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Прасування --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up">
                <div class=" w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <img src="{{ asset('storage/source/svg/icons/tags/praska.svg') }}" alt="Прасування" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Прасування</h3>
                <div class="space-y-3">
                    <a href="{{ route('category_page', 'prasuvannya-rechey') }}" target="_blank" class="block w-full border-2 border-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Перейти
                    </a>
                </div>
            </div>

            {{-- Аквачистка --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <img src="{{ asset('storage/source/svg/icons/tags/aqua_clean.svg') }}" alt="Аквачистка" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Аквачистка</h3>
                <div class="space-y-3">
                    <a href="{{ route('category_page', 'akvachystka') }}" target="_blank" class="block w-full border-2 border-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Перейти
                    </a>
                </div>
            </div>

            {{-- Для бізнесу --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <img src="{{ asset('storage/source/svg/icons/tags/B2B.svg') }}" alt="Для бізнесу" class="w-120 h-20">
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Для бізнесу</h3>
                <div class="space-y-3">
                    <a href="{{ route('b2b_page') }}" target="_blank" class="block w-full border-2 border-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Перейти
                    </a>
                </div>
            </div>

            {{-- Хімчистка --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <img src="{{ asset('storage/source/svg/icons/tags/clean.svg') }}" alt="Хімчистка" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Хімчистка</h3>
                <div class="space-y-3">
                    <a href="{{ route('category_page', 'khimchystka') }}" target="_blank" class="block w-full border-2 border-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Перейти
                    </a>
                </div>
            </div>
             {{-- Реставрація взуття --}}
             <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <img src="{{ asset('storage/source/svg/icons/tags/shoes.svg') }}" alt="Реставрація взуття" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Реставрація взуття</h3>
                <div class="space-y-3">
                    <a href="{{ route('category_page', 'chystka-ta-restavratsiya-vzuttya') }}" target="_blank" class="block w-full border-2 border-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Перейти
                    </a>
                </div>
            </div>
             {{-- Одяг зі шкіри та хутра --}}
             <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <img src="{{ asset('storage/source/svg/icons/tags/jacket.svg') }}" alt="Одяг зі шкіри та хутра" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Одяг зі шкіри та хутра</h3>
                <div class="space-y-3">
                    <a href="{{ route('category_page', 'odyag-zi-shkiry-ta-khutra') }}" target="_blank" class="block w-full border-2 border-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Перейти
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
