<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserWishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_product_id',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(ShopProduct::class);
    }
}
