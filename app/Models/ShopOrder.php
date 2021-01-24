<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'promocode_id',
        'delivery_id',
        'address_id',
        'pay_method',
        'sum',
        'status',
        'note',
    ];

    public function promocode(): BelongsTo
    {
        return $this->belongsTo(ShopPromocode::class);
    }

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(ShopDelivery::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(ShopProduct::class);
    }
}
