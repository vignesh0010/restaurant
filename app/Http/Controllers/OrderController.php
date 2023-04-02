<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class OrderController extends Controller
{
    const PENDING = 1;
    const APPROVED = 2;
    const CANCELED = 3;
    const COMPLETED = 4;

    const CANCELED_BY_USER = 1;
    const CANCELED_BY_ADMIN = 2;

    public function createOrder(Request $request)
    {

        $approved = Order::where('menu_id', $request->menu_id)
                        ->where('member_id', $request->member_id)
                        ->where('status', self::APPROVED)->first();

        $pending = Order::where('menu_id', $request->menu_id)
            ->where('member_id', $request->member_id)
            ->where('status', self::PENDING)->first();

        if($approved != null || $pending != null){
            return [
                'status_code' => 400
            ];
        }
        $data = $request->all();
        $data['status'] = self::PENDING;

        if(Order::create($data)){
            return [
                'status_code' => 200
            ];
        }else{
            return [
                'status_code' => 500
            ];
        }
    }

    public function recentOrderList()
    {
        return view('admin.home', [
            'pending' => Order::where('status', self::PENDING)->latest()->paginate(5),
            'approved' => Order::where('status', self::APPROVED)->latest()->paginate(5),
            'canceled' => Order::where('status', self::CANCELED)->latest()->paginate(5),
            'completed' => Order::where('status', self::COMPLETED)->latest()->paginate(5),
        ]);
        
    }

    public function orderApprove($id)
    {
        $order = Order::find($id);
        $order->status = self::APPROVED;

        if ($order->save()) {
            $this->flashSuccess('Order Approved Success');
        } else {
            $this->flashError('Order Approved Failed');
        }
        return \redirect()->route('admin-home');
    }

    public function orderCancel($id)
    {
        $order = Order::find($id);
        $order->status = self::CANCELED;
        $order->canceled_by = self::CANCELED_BY_ADMIN;

        if ($order->save()) {
            $this->flashSuccess('Order Canceled Success');
        } else {
            $this->flashError('Order Canceled Failed');
        }
        return \redirect()->route('admin-home');
    }

    public function orderComplete($id)
    {
        $order = Order::find($id);
        $order->status = self::COMPLETED;

        if ($order->save()) {
            $this->flashSuccess('Order Completed Success');
        } else {
            $this->flashError('Order Completed Failed');
        }
        return \redirect()->route('admin-home');
    }

    public function allOrders()
    {
        return view('admin.order', ['all_orders' => Order::latest()->paginate(5)]);

    }

    public function deleteOrder($id)
    {
        if (Order::destroy($id)) {

            $this->flashSuccess('Order Deleted Success');
        } else {
            $this->flashError('Order Deleted Failed');
        }
        return \redirect()->route('all.order');
    }

    public function orderCancelByUser($id)
    {
        $order = Order::find($id);
        $order->status = self::CANCELED;
        $order->canceled_by = self::CANCELED_BY_USER;

        if ($order->save()) {
            $this->flashSuccess('Order Canceled Success');
        } else {
            $this->flashError('Order Canceled Failed');
        }
        return \redirect()->back();
    }

    public function userOrders($id)
    {
        return view('customer.user_orders', [
            'pending_order' => Order::where('member_id', $id)->where('status', self::PENDING)->orWhere('status', self::APPROVED)->latest()->paginate(5),
            'done_order' => Order::where('member_id', $id)->where('status', self::CANCELED)->orWhere('status', self::COMPLETED)->latest()->paginate(5),
        ]);
    }
}
