<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'gst_no',
    'city',
    
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
