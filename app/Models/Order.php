<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Member;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'member_id',
        'status',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

}
