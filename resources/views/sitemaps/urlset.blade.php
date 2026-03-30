<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($urls as $item)
    <url>
        <loc>{{ data_get($item, "loc") }}</loc>
        @if(!empty(data_get($item, "lastmod")))
        <lastmod>{{ \Illuminate\Support\Carbon::parse(data_get($item, "lastmod"))->toAtomString() }}</lastmod>
        @endif
        @if(!empty(data_get($item, "changefreq")))
        <changefreq>{{ data_get($item, "changefreq") }}</changefreq>
        @endif
        @if(!empty(data_get($item, "priority")))
        <priority>{{ data_get($item, "priority") }}</priority>
        @endif
    </url>
@endforeach
</urlset>
