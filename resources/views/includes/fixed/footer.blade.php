<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    </div>
    
    {{-- Floating Elements --}}
    <div class="absolute top-10 right-10 w-32 h-32 bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-24 h-24 bg-secondary/10 rounded-full blur-2xl"></div>
    
    <div class="relative z-10">
        {{-- Main Footer Content --}}
        <div class="container mx-auto px-4 py-16">
            <div class="grid lg:grid-cols-5 md:grid-cols-2 gap-8">
                {{-- Logo & Description --}}
                <div class="lg:col-span-2 space-y-6">
                     <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('welcome') }}" class="flex items-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('storage/src/logo/full_logo.svg') }}" alt="ЄНОТ 24" class="w-40 h-10">
                        </a>
                    </div>
                    
                    <p class="text-gray-300 leading-relaxed max-w-md">
                        Професійна хімчистка одягу та домашнього текстилю з кур'єрською доставкою. 
                        Швидко, зручно, якісно!
                    </p>
                    
                    {{-- Social Links --}}
                    <div class="flex space-x-4">
                        <a href="https://instagram.com/enot24cleaner" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-pink-500 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="https://t.me/enot24ServiceBot" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-blue-500 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-telegram text-sm"></i>
                        </a>
                        <a href="https://t.me/servisenot24" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-blue-400 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fas fa-headset text-sm"></i>
                        </a>
                        <a href="viber://pa?chatURI=enot24" class="w-10 h-10 bg-white/10 hover:bg-purple-600 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-viber text-sm"></i>
                        </a>
                    </div>
                </div>
                
                {{-- Navigation --}}
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-white mb-4">Навігація</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('services') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Послуги та ціни
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('b2b_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                B2B
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('promotions') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Акції
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('locations_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Локації
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('delivery_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Доставка та кур'єр
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacts_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Контакти
                            </a>
                        </li>
                    </ul>
                </div>
                
                {{-- Services --}}
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-white mb-4">Послуги</h4>
                    <ul class="space-y-3">
                        @foreach (get_categories()->filter(fn($category) => $category->services->isNotEmpty())->take(4) as $item)
                            <li>
                                <a href="{{ route('category_page', $item->href) }}" target="_blank" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                    <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                    {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Contact & Hours --}}
                <div class="space-y-6">
                    <div>
                        <h4 class="text-lg font-semibold text-white mb-4">Контакти</h4>
                        <div class="space-y-3">
                            <a href="tel:0678872233" class="flex items-center space-x-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
                                <div class="w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary/30 transition-colors duration-300">
                                    <i class="fas fa-phone text-primary text-sm"></i>
                                </div>
                                <span>067 887 22 33</span>
                            </a>
                            <a href="tel:0443372233" class="flex items-center space-x-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
                                <div class="w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary/30 transition-colors duration-300">
                                    <i class="fas fa-phone text-primary text-sm"></i>
                                </div>
                                <span>044 337 22 33</span>
                            </a>
                            <a href="mailto:office.enot24@gmail.com" class="flex items-center space-x-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
                                <div class="w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary/30 transition-colors duration-300">
                                    <i class="fas fa-envelope text-primary text-sm"></i>
                                </div>
                                <span class="text-sm break-all">office.enot24@gmail.com</span>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold text-white mb-4">Графік роботи</h4>
                        <div class="space-y-2 text-gray-300">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-clock text-primary text-sm"></i>
                                <span class="text-sm">10:00 - 20:00</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-calendar text-primary text-sm"></i>
                                <span class="text-sm">Без вихідних</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Bottom Bar --}}
        <div class="border-t border-gray-700/50">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-gray-400 text-sm">
                        © {{ date('Y') }} ЄНОТ 24. Всі права захищені.
                    </div>
                    <div class="flex space-x-6 text-sm">
                        <a href="{{ route('contacts_page') }}" class="text-gray-400 hover:text-primary transition-colors duration-300">Контакти</a>
                        <a href="{{ route('locations_page') }}" class="text-gray-400 hover:text-primary transition-colors duration-300">Локації</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
