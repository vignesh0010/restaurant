<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Exception;
use App\Models\Food;

class ApiController extends Controller
{
    const PENDING = 1;
    const APPROVED = 2;
    const CANCELED = 3;
    const COMPLETED = 4;

    const CANCELED_BY_USER = 1;
    const CANCELED_BY_ADMIN = 2;

    public function userRegister(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name" => "required",
            "email" => "required | email",
            "password" => "required",
            "c_password" => "required | same:password",
        ]);

        if ($validate->fails()) {
            return \response()->json($validate->errors(),400);
        }else{
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            try{
                if (Member::create($data)) {
                    return \response()->json(['message' => 'user Registaion success'], 200);
                } else {
                    return \response()->json(['message' => 'user Registaion Failed'], 400);
                }
            }catch(Exception $e){
                return \response()->json(['message' => 'This user already Reistered'], 400);
            }
            
        }   
    }

    public function userLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $response['_token'] = $user->createToken($user->email)->plainTextToken;
            $response['message'] = 'user login success';
            return \response()->json($response, 200);
        } else {
            return \response()->json(['message' => 'Invaild Creadential'], 401);
        }
    }

    public function adminLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->is_admin) {
                $response['_token'] = $user->createToken($user->email)->plainTextToken;
                $response['message'] = 'user login success';
                return \response()->json($response, 200);

            } else {
                Auth::logout();
                return \response()->json(['message' => 'You Don`t have access to Admin'], 400);
            }
        } else {
            return \response()->json(['message' => 'Invaild Creadential'], 401);
        }
    }

    public function addRestaurant(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required | string',
            'gst_no' => 'required | string',
            'city' => 'required | string',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        } else {
            $data = $request->all();

            try{
                if (Restaurant::create($data)) {
                    return \response()->json(['message' => 'Restaurant Created success'], 200);
                } else {
                    return \response()->json(['message' => 'Restaurant Created Failed'], 400);
                }
            }catch(Exception $e){
                return \response()->json(['message' => 'Restaurant GST No Should be unique'], 400);

            }
            
        }
    }

    public function addFood(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required | string',
            'category' => 'required',
            'food_img' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);

        }else{

            if ($request->file('food_img')) {
                $file_name = time() . '_' . $request->file('food_img')->getClientOriginalName();
                $file_path = $request->file('food_img')->storeAs('uploads/food', $file_name, 'public');
            }

            $data = $request->all();
            unset($data['food_img']);

            $data['file_path'] = $file_path;
            try{
                if (Food::create($data)) {
                    return \response()->json(['message' => 'Food Created success'], 200);
                } else {
                    return \response()->json(['message' => 'Food Created Failed'], 400);;
                }
            }catch(Exception $e){
                return \response()->json(['message' => 'This food already Registered ! Please try other!!'], 400);;
            }
            
        }
        
    }

    public function  placeOrder(Request $request)
    {
        $approved = Order::where('menu_id', $request->menu_id)
            ->where('member_id', $request->member_id)
            ->where('status', self::APPROVED)->first();

        $pending = Order::where('menu_id', $request->menu_id)
            ->where('member_id', $request->member_id)
            ->where('status', self::PENDING)->first();

        if ($approved != null || $pending != null) {

            return response()->json(['message' => 'You already Ordered this Food! Please wait your food id on the Way!!'], 400);
        }
        $data = $request->all();
        $data['status'] = self::PENDING;

        if (Order::create($data)) {
            return response()->json(['message' => 'Order Placed Success'], 200);
        } else {
            return response()->json(['message' => 'Somthing Went Wrong'], 400);
        }
    }

    public function  updateOrderStatusByUser($id)
    {
        $order = Order::find($id);
        if($order){
            $order->status = self::CANCELED;
            $order->canceled_by = self::CANCELED_BY_USER;

            if ($order->save()) {
                return response()->json(['message' => 'Order status update Success'], 200);
            } else {
                return response()->json(['message' => 'Order status update Failed'], 400);
            }
        }else{
            return response()->json(['message' => 'Order Not Found'], 400);

        }
        
    }

    public function  updateOrderStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        if($order){
            $order->status = $request->status;
            $order->canceled_by = self::CANCELED_BY_ADMIN;

            if ($order->save()) {
                return response()->json(['message' => 'Order status update Success'], 200);
            } else {
                return response()->json(['message' => 'Order status update Failed'], 400);
            }
        }else{
            return response()->json(['message' => 'Order Not Found'], 400);

        }
        
    }

}
