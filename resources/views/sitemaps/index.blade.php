<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($sitemaps as $item)
    <sitemap>
        <loc>{{ data_get($item, "loc") }}</loc>
        @if(!empty(data_get($item, "lastmod")))
        <lastmod>{{ \Illuminate\Support\Carbon::parse(data_get($item, "lastmod"))->toAtomString() }}</lastmod>
        @endif
    </sitemap>
@endforeach
</sitemapindex>
