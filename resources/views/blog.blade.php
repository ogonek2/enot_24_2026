@extends('layouts.app')

@section('title')
    Блог — корисні статті про прання та хімчистку | Єнот-24
@endsection

@php
    $siteName = 'ЄНОТ-24';
    $pageUrl = route('blog.index');
    $pageDescription = 'Корисні матеріали про догляд за одягом, килимами та текстилем. Поради від хімчистки Єнот-24 у Києві.';
@endphp

@section('seo_tags')
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="блог, хімчистка, прання, догляд за одягом, Єнот-24, Київ">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $pageUrl }}">
    <meta property="og:title" content="Блог | {{ $siteName }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:image" content="{{ asset('storage/src/logo/enot-white-bg.png') }}">
    <meta property="og:locale" content="uk_UA">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Блог | {{ $siteName }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $pageUrl }}">
@endsection


@section('content')
    <div class="pb-8 md:pb-12">
        <div class="container mx-auto px-4">
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Блог</h1>
                <p class="text-gray-600 text-lg">Корисні статті та поради від Єнот-24</p>
            </div>

            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($posts as $post)
                        <a href="{{ route('blog.show', $post->slug) }}" class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
                            <div class="aspect-[16/10] bg-gray-100 overflow-hidden">
                                @if($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/20 to-secondary/20">
                                        <i class="fas fa-newspaper text-5xl text-primary/40"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 flex flex-col flex-grow">
                                <time class="text-sm text-gray-500 mb-2" datetime="{{ $post->published_at?->toIso8601String() }}">
                                    {{ $post->published_at?->format('d.m.Y') }}
                                </time>
                                <h2 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors mb-2 line-clamp-2">
                                    {{ $post->title }}
                                </h2>
                                <p class="text-gray-600 text-sm line-clamp-3 flex-grow">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 140) }}
                                </p>
                                <span class="mt-4 text-primary font-semibold text-sm inline-flex items-center gap-1">
                                    Читати далі <i class="fas fa-arrow-right text-xs"></i>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-10">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                    <p class="text-gray-600 mb-6">Скоро тут з’являться статті.</p>
                    <a href="{{ route('services') }}" class="inline-block bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-xl font-semibold">До послуг</a>
                </div>
            @endif
        </div>
    </div>
@endsection
