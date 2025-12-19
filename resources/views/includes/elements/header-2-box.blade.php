@php
    $categories = \App\Helpers\CategoryHelper::getByType(1);
@endphp

<div class="py-10">
    <div class="container mx-auto">
            @if($categories->count() > 0)
                <div class="mb-8">
                    <div class="py-6">
                        <div class="text-center mb-8">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Інші категорії</h2>
                            <p class="text-gray-600">Оберіть іншу категорію послуг</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-4">
                            @foreach($categories as $otherCategory)
                                <a href="{{ route('category_page', $otherCategory->href) }}" 
                                   class="group bg-white/40 rounded-xl p-4 md:p-6 hover:border-primary hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex gap-4 md:flex-col md:items-center md:text-center">
                                        @if($otherCategory->category_img)
                                            <img src="{{ asset('storage/' . $otherCategory->category_img) }}" 
                                                 alt="{{ $otherCategory->name }}" 
                                                 class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                                <i class="fas fa-tag text-2xl md:text-3xl text-primary/50"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h3 class="text-base md:text-lg font-semibold text-gray-800 group-hover:text-primary transition-colors duration-300 mb-2">
                                                {{ $otherCategory->name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                {{ $otherCategory->getAllServices()->count() }} {{ $otherCategory->getAllServices()->count() === 1 ? 'послуга' : 'послуг' }}
                                            </p>
                                            @if($otherCategory->hasActiveDiscount())
                                                <span class="mt-2 inline-block bg-primary/10 text-primary text-xs font-semibold px-2 py-1 rounded-full">
                                                    -{{ $otherCategory->getDiscountPercent() }}%
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>