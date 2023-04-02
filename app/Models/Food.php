<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'file_path',

    ];

    public function menu(): HasOne
    {
        return $this->hasOne(Menu::class);
    }

    public function menuMany(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
