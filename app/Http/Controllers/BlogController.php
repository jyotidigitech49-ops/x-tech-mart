<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function list()
    {
        $blogs = Blog::query()
            ->where('status', 'A')
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'heading' => $blog->heading,
                    'slug' => $blog->slug,
                    'excerpt' => Str::limit(strip_tags($blog->content), 130),
                    'date' => $blog->inserted_at ? Carbon::parse($blog->inserted_at)->format('M d, Y') : null,
                    'url' => url('blogs', $blog->slug),
                    'image1' => $this->blogImageUrl($blog->image1),
                ];
            });

        // dd([
        //     'page' => 'All blogs page',
        //     'route' => url('/blogs'),
        //     'blogs' => Blog::query()
        //         ->where('status', 'A')
        //         ->orderBy('id', 'desc')
        //         ->get()
        //         ->map(fn (Blog $blog) => $this->blogImageDebugData($blog))
        //         ->values()
        //         ->all(),
        // ]);

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.blog.index', compact('blogs', 'bannerImage'));
    }

    public function index($url)
    {
        $blog = Blog::query()
            ->where('status', 'A')
            ->where('slug', $url)
            ->firstOrFail();

        $previousBlog = Blog::query()
            ->where('status', 'A')
            ->where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first(['heading', 'slug']);

        $nextBlog = Blog::query()
            ->where('status', 'A')
            ->where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first(['heading', 'slug']);

        $blogDetails = [
            'id' => $blog->id,
            'heading' => $blog->heading,
            'slug' => $blog->slug,
            'content' => $blog->content,
            'content_sections' => $this->articleSections((string) $blog->content),
            'excerpt' => Str::limit(strip_tags($blog->content), 180),
            'date' => $blog->inserted_at ? Carbon::parse($blog->inserted_at)->format('M d, Y') : null,
            'category' => 'News',
            'image1' => $this->blogImageUrl($blog->image1),
            'previous' => $previousBlog ? [
                'heading' => $previousBlog->heading,
                'url' => url('blogs', $previousBlog->slug),
            ] : null,
            'next' => $nextBlog ? [
                'heading' => $nextBlog->heading,
                'url' => url('blogs', $nextBlog->slug),
            ] : null,
        ];

        // dd([
        //     'page' => 'Blog details page',
        //     'route' => url('blogs', $blog->slug),
        //     'blog' => $this->blogImageDebugData($blog),
        // ]);

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.blog.blogdetails', compact('blogDetails', 'bannerImage'));
    }

    private function articleSections(string $content): array
    {
        if (trim($content) === '') {
            return [];
        }

        $document = new \DOMDocument('1.0', 'UTF-8');
        $previousState = libxml_use_internal_errors(true);
        $document->loadHTML(
            '<?xml encoding="UTF-8"><div id="article-content-root">' . $content . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previousState);

        $root = $document->getElementById('article-content-root');

        if (! $root) {
            return [['title' => 'Overview', 'content' => $content]];
        }

        $sections = [];
        $currentTitle = 'Overview';
        $currentContent = '';

        foreach (iterator_to_array($root->childNodes) as $node) {
            $tagName = $node instanceof \DOMElement ? strtolower($node->tagName) : null;

            if (in_array($tagName, ['h2', 'h3', 'h4'], true)) {
                if (trim(strip_tags($currentContent)) !== '') {
                    $sections[] = [
                        'title' => $currentTitle,
                        'content' => $currentContent,
                    ];
                }

                $currentTitle = trim($node->textContent) ?: 'Article Details';
                $currentContent = '';
                continue;
            }

            $currentContent .= $document->saveHTML($node);
        }

        if (trim(strip_tags($currentContent)) !== '') {
            $sections[] = [
                'title' => $currentTitle,
                'content' => $currentContent,
            ];
        }

        return $sections ?: [['title' => 'Overview', 'content' => $content]];
    }

    private function blogImageUrl(?string $image): ?string
    {
        if (! $image) {
            return null;
        }

        $path = trim(str_replace('\\', '/', $image));
        $urlPath = parse_url($path, PHP_URL_PATH);
        $path = ltrim($urlPath ?: $path, '/');
        $path = preg_replace('#^public/#i', '', $path);

        if ($path !== '' && ! str_starts_with(strtolower($path), 'assets/')) {
            $path = 'assets/images/blog/' . $path;
        }

        return $path ? asset($path) : null;
    }

    private function blogImageDebugData(Blog $blog): array
    {
        $images = collect([$blog->image1, $blog->image2, $blog->image3])
            ->filter()
            ->values();

        $resolved = $images->mapWithKeys(function ($image) {
            $path = trim(str_replace('\\', '/', (string) $image));
            $urlPath = parse_url($path, PHP_URL_PATH);
            $path = ltrim($urlPath ?: $path, '/');
            $path = preg_replace('#^public/#i', '', $path);

            if ($path !== '' && ! str_starts_with(strtolower($path), 'assets/')) {
                $path = 'assets/images/blog/' . $path;
            }

            return [$image => $path ? asset($path) : null];
        });

        return [
            'id' => $blog->id,
            'heading' => $blog->heading,
            'slug' => $blog->slug,
            'db_images' => $images->all(),
            'resolved_urls' => $resolved->filter()->values()->all(),
            'missing_images' => $resolved->filter(fn ($url) => $url === null)->keys()->all(),
        ];
    }
}
