<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $user  = Auth::user();
        $menus  = Menu::all();
        $restaurants = Restaurant::select('id', 'name')->get();
        return \view('customer.home',['user' => $user, 'menus' => $menus, 'restaurants' => $restaurants]);
        
    }

    public function addWishlist(Request $request)
    {
        $member = Member::find($request->member_id);

        if($member->checkWishlist($request->menu_id)){
            if ($member->wishlist == null) {
                $member->wishlist = json_encode(array($request->menu_id));
            }else{
                $wishlist = json_decode($member->wishlist, true);
                array_push($wishlist, $request->menu_id);
                $member->wishlist = json_encode($wishlist);
            }
            
            if($member->save()){
                return [
                    'status_code' => 200,
                    'wishlist_count' => count(json_decode($member->wishlist, true))
                ];
            } else {
                return [
                    'status_code' => 500
                ];
            }
        }else {
            return [
                'status_code' => 400
            ];
        }
    }

    public function addCart(Request $request)
    {
        $member = Member::find($request->member_id);
        
        if ($member->checkCart($request->menu_id)) {
            if ($member->cart == null) {
                $member->cart = json_encode(array($request->menu_id));
            } else {
                $cart = json_decode($member->cart, true);
                array_push($cart, $request->menu_id);
                $member->cart = json_encode($cart);
            }

            if ($member->save()) {
                return [
                    'status_code' => 200,
                    'cart_count' => count(json_decode($member->cart, true))
                ];
            } else {
                return [
                    'status_code' => 500
                ];
            }
        } else {
            return [
                'status_code' => 400
            ];
        }
    }

    public function removeCart(Request $request)
    {
        $member = Member::find($request->member_id);

        if ($member->removeCartCheck($request->menu_id)) {
            return [
                'status_code' => 200,
                'cart_count' => count($member->cart)
            ];
        } else {
            return [
                'status_code' => 500
            ];
        }
    }
}
