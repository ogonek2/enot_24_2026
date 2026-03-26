<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogDashboardController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::query()
            ->orderByDesc('updated_at')
            ->paginate(15);

        return view('dashboard.blog.index', compact('posts'));
    }

    public function create(): View
    {
        return view('dashboard.blog.form', [
            'post' => new BlogPost(),
            'action' => route('blog-dashboard.posts.store'),
            'method' => 'POST',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $post = new BlogPost();
        $this->savePost($request, $post);

        return redirect()
            ->route('blog-dashboard.posts.index')
            ->with('status', 'Статтю створено.');
    }

    public function edit(BlogPost $post): View
    {
        return view('dashboard.blog.form', [
            'post' => $post,
            'action' => route('blog-dashboard.posts.update', $post),
            'method' => 'PUT',
        ]);
    }

    public function update(Request $request, BlogPost $post): RedirectResponse
    {
        $this->savePost($request, $post);

        return redirect()
            ->route('blog-dashboard.posts.index')
            ->with('status', 'Статтю оновлено.');
    }

    private function savePost(Request $request, BlogPost $post): void
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug,' . $post->id],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'publish_mode' => ['required', 'in:now,schedule,draft'],
            'published_at' => ['nullable', 'date'],
            'featured_image' => ['nullable', 'image', 'max:3072'],
        ]);

        if (blank($data['slug'] ?? null)) {
            $baseSlug = Service::generateHref($data['title']);
            $data['slug'] = BlogPost::uniqueSlug($baseSlug, $post->id);
        } else {
            $data['slug'] = BlogPost::uniqueSlug($data['slug'], $post->id);
        }

        if (($data['publish_mode'] ?? 'draft') === 'now') {
            $data['published_at'] = now();
        } elseif (($data['publish_mode'] ?? 'draft') === 'draft') {
            $data['published_at'] = null;
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('src/blog', 'public');
        }

        unset($data['publish_mode']);

        $post->fill($data);
        $post->save();
    }
}
