<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Food;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'food_id',
        'price',

    ];


    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function orderMany(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
