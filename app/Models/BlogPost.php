<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'tables_html',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at',
        'featured_image',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (BlogPost $post) {
            if (blank($post->slug) && filled($post->title)) {
                $post->slug = static::uniqueSlug(Service::generateHref($post->title), $post->id);
            }
        });
    }

    public static function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = $base ?: 'post';
        $n = 0;
        while (static::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn (Builder $q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . ++$n;
        }

        return $slug;
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function isPublished(): bool
    {
        return $this->published_at && $this->published_at->lte(now());
    }

    public function bodyHtml(): string
    {
        return (string) $this->content . (string) $this->tables_html;
    }
}
