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
                    <div style="display: flex; align-items: center;">
                        <a href="/"
                            style="
                            display: flex;
                            align-items: center;
                            text-decoration: none;
                            color: #1f2937;
                            font-weight: bold;
                            font-size: 20px;
                        ">
                            <img src="{{ asset('storage/source/logo_hear_white.svg') }}" alt="Logo" class="w-auto h-12">
                        </a>
                    </div>
                    
                    <p class="text-gray-300 leading-relaxed max-w-md">
                        Професійна екочистка одягу та домашнього текстилю з кур'єрською доставкою. 
                        Швидко, зручно, якісно!
                    </p>
                    
                    {{-- Social Links --}}
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-telegram text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-whatsapp text-sm"></i>
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
                                Наші послуги
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('b2b_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                B2B
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('courier_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Викликати кур'єра
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('delivery_page') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 flex items-center group">
                                <i class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Доставка
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
                            <a href="tel:+380xxxxxxxxx" class="flex items-center space-x-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
                                <div class="w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary/30 transition-colors duration-300">
                                    <i class="fas fa-phone text-primary text-sm"></i>
                                </div>
                                <span>+38 (xxx) xxx-xx-xx</span>
                            </a>
                            <a href="mailto:email@gmail.com" class="flex items-center space-x-3 text-gray-300 hover:text-primary transition-colors duration-300 group">
                                <div class="w-8 h-8 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary/30 transition-colors duration-300">
                                    <i class="fas fa-envelope text-primary text-sm"></i>
                                </div>
                                <span>email@gmail.com</span>
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
                        © {{ date('Y') }} praska.kiev.ua. Всі права захищені.
                    </div>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-primary transition-colors duration-300">Політика конфіденційності</a>
                        <a href="#" class="text-gray-400 hover:text-primary transition-colors duration-300">Умови використання</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
