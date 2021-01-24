<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class ShopProduct extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'product_name',
        'content',
        'status',
        'category_id',
        'sale_id',
        'keywords',
        'description',
        'size',
        'color',
        'brand',
        'price',
        'image',
        'hit',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ShopCategory::class);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(ShopSale::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(ShopOrder::class)
            ->withPivot('sale_id', 'qty', 'price', 'note')
            ->withTimestamps();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ShopReview::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ShopProductPhoto::class);
    }

    public function connection(): HasOne
    {
        return $this->hasOne(ShopConnection::class, 'product_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store("images/{$folder}");
        }

        return null;
    }

    public function getImage(): string
    {
        if (!$this->image) {
            return asset("no-image.png");
        }

        return asset("uploads/{$this->image}");
    }

    public function searchableAs(): string
    {
        return 'shop_products_index';
    }
}
