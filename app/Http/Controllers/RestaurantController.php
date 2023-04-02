<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin.restaurant', ['restaurants' => Restaurant::latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurant_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'gst_no' => 'required | string',
            'city' => 'required | string',
        ]);

        $data = $request->all();
        unset($data['_token']);
        if(Restaurant::create($data)){
            $this->flashSuccess('Restaurant Created Success');
        }else{
            $this->flashError('Restaurant Created Failed');
        }
        return \redirect()->route('restaurants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurant = Restaurant::find($restaurant->id);
        
        if($restaurant){
            return view('admin.restaurant_form',['restaurant'=> $restaurant]);
        }else{
            $this->flashError('Record Not Found!');
            return \redirect()->back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required | string',
            'gst_no' => 'required | string',
            'city' => 'required | string',
        ]);

        $data = $request->all();

        unset($data['_token'],$data['_method']);

        if (Restaurant::where('id', $restaurant->id)->update($data)) {
            $this->flashSuccess('Restaurant Updated Success');
            return \redirect()->route('restaurants.index');
        } else {
            $this->flashError('Restaurant Updated Failed');
            return \redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        
        if (Restaurant::destroy($restaurant->id)) {

            $this->flashSuccess('Restaurant Deleted Success');
        } else {
            $this->flashError('Restaurant Deleted Failed');

        }
        return \redirect()->route('restaurants.index');
    }
}
