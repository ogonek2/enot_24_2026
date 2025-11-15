@php
    $ctaHeaders = \App\Models\CtaHeader::where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->get();
@endphp

@if($ctaHeaders->count() > 0)
<div class="py-4">
    <div class="container mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-0 lg:gap-4">
            @foreach($ctaHeaders as $index => $ctaHeader)
            <a href="{{ $ctaHeader->resolved_url }}" target="_blank"
                class="group bg-white rounded-2xl overflow-hidden transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up"
                style="animation-delay: {{ $index * 0.1 }}s;">
                <div class="p-8 text-center flex flex-row lg:flex-col justify-start gap-4 items-center">
                    <div
                        class="rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        @if($ctaHeader->icon)
                            <img src="{{ asset('storage/' . $ctaHeader->icon) }}" alt="{{ $ctaHeader->title }}"
                                class="w-[70px] h-[70px] min-w-[70px] min-h-[70px]">
                        @else
                            <div class="w-[70px] h-[70px] min-w-[70px] min-h-[70px] rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                <i class="fas fa-tag text-3xl text-primary/50"></i>
                            </div>
                        @endif
                    </div>
                    <div class="text-left lg:text-center">
                        <h3
                            class="text-xl font-semibold text-secondary mb-2 group-hover:text-primary transition-colors">
                            {{ $ctaHeader->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $ctaHeader->subtitle }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif