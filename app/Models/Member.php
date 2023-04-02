<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'pin', 
        'password',
        'is_admin', 
        'google_id',
        'wishlist', 
        'file_path', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkWishlist($id)
    {
        if($this->wishlist){
            return !in_array($id, json_decode($this->wishlist, true));
        }
        return true;
    }

    public function checkCart($id)
    {
        if ($this->cart) {
            return !in_array($id, json_decode($this->cart, true));
        }
        return true;
    }

    public function removeCartCheck($id)
    {
        $cart = json_decode($this->cart, true);
        if (($key = array_search($id, $cart )) !== false) {
            unset($cart[$key]);
            $this->cart = $cart;
            return $this->save();
        }else{
            return false;
        }

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
