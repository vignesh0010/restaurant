<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Exception;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin.food', ['foods' => Food::latest()->paginate(5)]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.food_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        if ($request->file('food_img')) {
            $file_name = time() . '_' . $request->file('food_img')->getClientOriginalName();
            $file_path = $request->file('food_img')->storeAs('uploads/food', $file_name, 'public');
        }
        
        $data = $request->all();    
        unset($data['_token'], $data['food_img']);

        $data['file_path'] = $file_path;

        if (Food::create($data)) {
            return ['status_code' => 200];
        } else {
            return [ 'status_code' => 500,];
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $food = Food::find($id);

        if ($food) {
            return view('admin.food_form', ['food' => $food]);
        } else {
            $this->flashError('Record Not Found!');
            return \redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        if ($request->file('food_img')) {
            $file_name = time() . '_' . $request->file('food_img')->getClientOriginalName();
            $file_path = $request->file('food_img')->storeAs('uploads/food', $file_name, 'public');
            $data['file_path'] = $file_path;
        }
        $data = $request->all(); 
        unset($data['_token'], $data['_method'],$data['food_img']);

        if (Food::where('id', $id)->update($data)) {
            $this->flashSuccess('food Updated Success');
            return \redirect()->route('food.index');
        } else {
            $this->flashError('food Updated Failed');
            return \redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Food::destroy($id)) {

            $this->flashSuccess('food Deleted Success');
        } else {
            $this->flashError('food Deleted Failed');
        }
        return \redirect()->route('food.index');
    }
}
