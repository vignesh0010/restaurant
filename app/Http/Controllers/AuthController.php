<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name"      => "required | string",
            "email"     => "required | email | unique:members",
            "password"      => "required",
            "c_password" => "required | same:password",
        ]);

        $user = new Member();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        

        if ($user->save()) {
            $this->flashSuccess("User Register Success !");
            return \view('auth.login');
        }else{
            $this->flashError("User Register Failed !");
            return \redirect()->back();
        }

        
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            "email"     => "required | email",
            "password"      => "required",
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $this->flashSuccess("Login Success !");
            return \redirect()->route('customer-home');
        }else{
            $this->flashError("Invalid Credentials");
            return \redirect()->back();
        }
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $google_id_user = Member::where('google_id', $google_user->id)->first();
        
            if(!$google_id_user) {
                $user = Member::updateOrCreate([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id,
                ],['email'=> $google_user->email]);

                Auth::login($user);
                return redirect()->route('customer-home');
            }else{
                Auth::login($google_id_user);
                return \redirect()->route('customer-home');
            }
        } catch (Exception $e) {
            $this->flashError("Please Contact Support team");
            return \redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return \redirect()->route('login');
    }
    
    public function adminAuth(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if($user->is_admin){
                $this->flashSuccess("Login Success !");
                return redirect()->route('admin-home')->with('user', $user);
            }else{
                Auth::logout();
                $this->flashError("You Don`t have access to Admin");
                return \redirect()->route('login');
            }
            
        } else {
            $this->flashError("Invalid Credentials");
            return \redirect()->back();
        }
    }

    
}
