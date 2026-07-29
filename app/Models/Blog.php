<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'status',
        'inserted_at',
        'heading',
        'slug',
        'content',
        'image1',
        'image2',
        'image3',
    ];

    public function imagePaths(): array
    {
        return collect([$this->image1, $this->image2, $this->image3])
            ->filter()
            ->map(fn ($image) => $this->resolveImagePath($image))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    public function image1Path(): ?string
    {
        return $this->resolveImagePath($this->image1);
    }

    private function resolveImagePath(?string $image): ?string
    {
        if (! $image) {
            return null;
        }

        $image = trim(str_replace('\\', '/', $image));
        $urlPath = parse_url($image, PHP_URL_PATH);
        $image = ltrim($urlPath ?: $image, '/');
        $image = preg_replace('#^public/#i', '', $image);

        if ($image !== '' && ! str_starts_with(strtolower($image), 'assets/')) {
            $image = 'assets/images/blog/' . $image;
        }

        return $image !== '' ? $image : null;
    }
}
