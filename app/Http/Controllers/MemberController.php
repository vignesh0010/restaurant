<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  Auth::user();
        return \view('customer.profile',['user'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = [
            "name" => "required | string",
            "email" => "required | email ",
            "mobile" => "required | numeric|min:10",
            "password" => "required",
            "c_password" => "required | same:password",
            "address" => "required | string",
            "city" => "required | string",
            "pin" => "required |numeric|min:6",
            "profile" => "mimes:jpeg,png,jpg",
        ];

        $validate = $request->validate($rules);

        $validate = $request->all();

        if($request->file('profile')){
            $file_name = time() . '_' . $request->file('profile')->getClientOriginalName();
            $file_path = $request->file('profile')->storeAs('uploads', $file_name, 'public');
            $validate['file_path'] = $file_path;
            unset($validate['profile']);
        }

        unset($validate['c_password'], $validate['_token']);
        $validate['password'] = Hash::make($validate['password']);
        $member  = Member::where('id', $id)->update($validate);    
        
        if($member){
            $this->flashSuccess('Profile Updated Success');
            return \redirect()->route('profile.index')->with('user', $member);
        }else{
            $this->flashError('Profile Updated Failed');
            return \redirect()->route('profile.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Member::destroy($id)) {
            $this->flashSuccess('Profile Deleted Success');
            return \redirect()->route('login');
        } else {
            $this->flashError('Profile Deleted Failed');
            return \redirect()->route('profile.index');
        }
    }
}
