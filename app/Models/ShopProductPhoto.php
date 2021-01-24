<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ShopProductPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ShopProduct::class);
    }

    public function getImage()
    {
        return asset("uploads/{$this->image}");
    }
}
