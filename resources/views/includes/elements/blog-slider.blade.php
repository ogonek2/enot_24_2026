@php
    $blogSliderPosts = $latestBlogPosts ?? collect();
@endphp
@if($blogSliderPosts->count() > 0)
<div class="container mx-auto px-4 md:px-6 py-8 md:py-12">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Блог</h2>
            <p class="text-gray-600 mt-1">Останні публікації</p>
        </div>
        <a href="{{ route('blog.index') }}" class="text-primary font-semibold hover:underline inline-flex items-center gap-2">
            Усі статті <i class="fas fa-arrow-right text-sm"></i>
        </a>
    </div>
    <div class="swiper blog-slider-swiper relative pb-10">
        <div class="swiper-wrapper">
            @foreach($blogSliderPosts as $bpost)
                <div class="swiper-slide h-auto">
                    <a href="{{ route('blog.show', $bpost->slug) }}" class="block h-full bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                        <div class="aspect-[16/10] bg-gray-100 shrink-0">
                            @if($bpost->featured_image)
                                <img src="{{ asset('storage/' . $bpost->featured_image) }}" alt="" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/15 to-secondary/15">
                                    <i class="fas fa-newspaper text-4xl text-primary/30"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <time class="text-xs text-gray-500 mb-1">{{ $bpost->published_at?->format('d.m.Y') }}</time>
                            <h3 class="font-bold text-gray-900 line-clamp-2 flex-grow">{{ $bpost->title }}</h3>
                            <span class="text-primary text-sm font-semibold mt-3">Читати</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination blog-slider-pagination"></div>
    </div>
</div>
@endif
