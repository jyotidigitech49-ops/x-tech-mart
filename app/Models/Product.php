<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'name',
        'slug',
        'cat_id',
        'short_description',
        'overview_description',
        'specification_description',
        'stock_status',
        'parent_cat',
        'featured',
        'price',
        'img1',
        'img2',
        'img3',
        'img4',
        'blog_ids',
    ];

    public function imagePaths(): array
    {
        return collect([$this->img1, $this->img2, $this->img3, $this->img4])
            ->filter()
            ->map(function ($image) {
                $image = trim(str_replace('\\', '/', (string) $image));
                $urlPath = parse_url($image, PHP_URL_PATH);
                $image = ltrim($urlPath ?: $image, '/');
                $image = preg_replace('#^public/#i', '', $image);

                if (! str_starts_with(strtolower($image), 'assets/')) {
                    $image = 'assets/images/product/' . $image;
                }

                return $image;
            })
            ->filter()
            ->unique()
            ->values()
            ->all();
    }
}
