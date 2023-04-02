@extends('admin.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="row">
                                <div class="col col-md-10">
                                    <h6 class="text-white text-capitalize ps-3">Orders List</h6>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="table-responsive-xxl">
                                <table
                                    class="table table-striped
                                    table-hover	
                                    align-middle">
                                    <thead class="">
                                        <caption>{{ $all_orders->links() }}</caption>

                                        <tr>
                                            <th>User Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Food Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Ordered at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($all_orders as $order)
                                            <tr>
                                                <td>{{ $order->member->name }}</td>
                                                <td>{{ $order->menu->restaurant->name }}</td>
                                                <td>{{ $order->menu->food->name }}</td>
                                                <td>{{ '₹ '.$order->menu->price }}</td>
                                                <td>{{ $order->menu->food->category == 1 ? 'Veg' : 'NoN Veg' }}</td>
                                                <td>{{ $order->member->city }}</td>
                                                <td><b>
                                                    @php
                                                    switch($order->status){ 
                                                    case 1: echo 'Pending';break;
                                                    case 2: echo 'Approved';break;
                                                    case 3: echo 'Canceled';break;
                                                    case 4: echo 'Completed';break;
                                                    }
                                                @endphp
                                                </b></td>
                                                <td>{{ date_format($order->created_at, 'Y/m/d H:i:s') }}</td>
                                                <td>{{ date_format($order->updated_at, 'Y/m/d H:i:s') }}</td>
                                                <td>
                                                    <a href="{{ route('order.delete', ['id' => $order->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
