@extends('layouts.app')

@php
    $siteName = config('app.name', 'Єнот-24');
    $pageTitle = ($post->meta_title ?: $post->title) . ' | Блог ' . $siteName;
    $pageDescription = $post->meta_description
        ? \Illuminate\Support\Str::limit($post->meta_description, 160)
        : \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 160);
    $pageUrl = route('blog.show', $post->slug);
    $keywords = $post->meta_keywords ?: 'хімчистка, прання, ' . $post->title . ', Єнот-24';
    $ogImage = $post->featured_image
        ? asset('storage/' . $post->featured_image)
        : asset('storage/src/logo/enot-white-bg.png');
@endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('seo_tags')
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ $pageUrl }}">
    <meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="{{ $post->title }}">
    <meta property="og:locale" content="uk_UA">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="article:published_time" content="{{ $post->published_at?->toIso8601String() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $pageUrl }}">
    <meta name="author" content="{{ $siteName }}">
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $post->title,
        'description' => $pageDescription,
        'datePublished' => $post->published_at?->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String(),
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $pageUrl],
        'image' => [$ogImage],
        'publisher' => [
            '@type' => 'Organization',
            'name' => $siteName,
            'logo' => ['@type' => 'ImageObject', 'url' => asset('storage/src/logo/logo-enot24.png')],
        ],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endsection

@section('content')
    <div class="pb-8 md:pb-12">
        <div class="container mx-auto px-4 md:px-6 max-w-4xl">
            <div class="mb-6">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span>Усі публікації</span>
                </a>
            </div>

            <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
                @if($post->featured_image)
                    <div class="aspect-[21/9] max-h-80 w-full overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                @endif
                <div class="p-6 md:p-10">
                    <time class="text-sm text-gray-500 block mb-3" datetime="{{ $post->published_at?->toIso8601String() }}">
                        {{ $post->published_at?->format('d.m.Y, H:i') }}
                    </time>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ $post->title }}</h1>
                    <div class="rich-text-content blog-article-body">
                        {!! $post->bodyHtml() !!}
                    </div>
                </div>
            </article>

            @if($relatedPosts->count() > 0)
                <div class="mt-10">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Інші статті</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        @foreach($relatedPosts as $rel)
                            <a href="{{ route('blog.show', $rel->slug) }}" class="bg-white rounded-xl shadow p-4 hover:shadow-md transition-shadow">
                                <span class="font-semibold text-gray-900 line-clamp-2">{{ $rel->title }}</span>
                                <span class="text-sm text-primary mt-2 inline-block">Читати →</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
