<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin.menu', ['menus' => Menu::latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu_form',['foods' => Food::select('id', 'name')->get(), 'restaurants' => Restaurant::select('id', 'name')->get() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required|string',
            'restaurant_name' => 'required|string',
            'price' => 'required',
        ]);

        $menu = [
            'restaurant_id' => $request->restaurant_name,
            'food_id' => $request->food_name,
            'price' => $request->price,
        ];

        if (Menu::create($menu)) {
            $this->flashSuccess('Menu Created Success');
        } else {
            $this->flashError('Menu Created Failed');
        }
        return \redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menu = Menu::find($menu->id);

        if ($menu) {
            return view('admin.menu_form', ['menu' => $menu, 'foods' => Food::select('id', 'name')->get(), 'restaurants' => Restaurant::select('id', 'name')->get()]);
        } else {
            $this->flashError('Record Not Found!');
            return \redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {

        $request->validate([
            'food_name' => 'required',
            'restaurant_name' => 'required ',
            'price' => 'required',
        ]);

        $menu_data = [
            'restaurant_id' => $request->restaurant_name,
            'food_id' => $request->food_name,
            'price' => $request->price,
        ];

        if (Menu::where('id', $menu->id)->update($menu_data)) {
            $this->flashSuccess('Menu Updated Success');
            return \redirect()->route('menus.index');
        } else {
            $this->flashError('Menu Updated Failed');
            return \redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Menu::destroy($id)) {
            $this->flashSuccess('Menu Deleted Success');
        } else {
            $this->flashError('Menu Deleted Failed');
        }
        return \redirect()->route('menus.index');
    }

    
}
