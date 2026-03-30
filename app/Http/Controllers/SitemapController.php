<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $xml = view('sitemaps.index', [
            'sitemaps' => [
                ['loc' => route('sitemap.pages'), 'lastmod' => now()],
                ['loc' => route('sitemap.posts'), 'lastmod' => $this->latestPostModifiedAt()],
            ],
        ])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function pages(): Response
    {
        $latestPostDate = $this->latestPostModifiedAt();

        $pages = [
            ['loc' => route('welcome'), 'changefreq' => 'daily', 'priority' => '1.0', 'lastmod' => null],
            ['loc' => route('services'), 'changefreq' => 'weekly', 'priority' => '0.9', 'lastmod' => null],
            ['loc' => route('blog.index'), 'changefreq' => 'daily', 'priority' => '0.9', 'lastmod' => $latestPostDate],
            ['loc' => route('promotions'), 'changefreq' => 'daily', 'priority' => '0.8', 'lastmod' => null],
            ['loc' => route('contacts_page'), 'changefreq' => 'monthly', 'priority' => '0.6', 'lastmod' => null],
            ['loc' => route('delivery_page'), 'changefreq' => 'monthly', 'priority' => '0.6', 'lastmod' => null],
            ['loc' => route('courier_page'), 'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => null],
            ['loc' => route('b2b_page'), 'changefreq' => 'weekly', 'priority' => '0.8', 'lastmod' => null],
            ['loc' => route('oferta'), 'changefreq' => 'yearly', 'priority' => '0.3', 'lastmod' => null],
            ['loc' => route('privacy_policy'), 'changefreq' => 'yearly', 'priority' => '0.3', 'lastmod' => null],
            ['loc' => route('umovy'), 'changefreq' => 'yearly', 'priority' => '0.3', 'lastmod' => null],
        ];

        $xml = view('sitemaps.urlset', ['urls' => $pages])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function posts(): Response
    {
        $posts = Cache::remember('sitemap.posts', now()->addMinutes(10), function () {
            return BlogPost::query()
                ->published()
                ->orderByDesc('published_at')
                ->get(['slug', 'updated_at', 'published_at']);
        });

        $urls = $posts->map(function (BlogPost $post) {
            return [
                'loc' => route('blog.show', $post->slug),
                'lastmod' => $post->updated_at ?? $post->published_at,
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        })->all();

        $xml = view('sitemaps.urlset', ['urls' => $urls])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    private function latestPostModifiedAt()
    {
        return Cache::remember('sitemap.posts.latest_modified', now()->addMinutes(10), function () {
            return BlogPost::query()
                ->published()
                ->orderByDesc('updated_at')
                ->value('updated_at');
        });
    }
}
