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
                                    <h6 class="text-white text-capitalize ps-3">Pending Orders</h6>
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
                                    <thead class="table-dack">
                                        <caption>{{ $pending->links() }}</caption>

                                        <tr>
                                            <th>User Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Food Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Ordered at</th>
                                            {{-- <th>Updated At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($pending as $order)
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
                                                {{-- <td>{{ date_format($order->updated_at, 'Y/m/d H:i:s') }}</td> --}}

                                                <td>
                                                    <a href="{{ route('order.approve', ['id' => $order->id]) }}"
                                                        class="btn btn-warning">Approve</a>
                                                    <a href="{{ route('order.cancel', ['id' => $order->id]) }}"
                                                        class="btn btn-danger">Cancel</a>
                                                </td>
                                                
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

        {{-- Aproved Orders --}}
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="row">
                                <div class="col col-md-10">
                                    <h6 class="text-white text-capitalize ps-3">Aproved Orders</h6>
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
                                    <thead class="table-dack">
                                        <caption>{{ $approved->links() }}</caption>

                                        <tr>
                                            <th>User Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Food Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Approved at</th>
                                            {{-- <th>Updated At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($approved as $order)
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
                                                {{-- <td>{{ date_format($order->created_at, 'Y/m/d H:i:s') }}</td> --}}
                                                <td>{{ date_format($order->updated_at, 'Y/m/d H:i:s') }}</td>

                                                <td>
                                                    <a href="{{ route('order.complete', ['id' => $order->id]) }}"
                                                        class="btn btn-warning">Complete</a>
                                                    <a href="{{ route('order.cancel', ['id' => $order->id]) }}"
                                                        class="btn btn-danger">Cancel</a>
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

        {{-- Completed Order --}}

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="row">
                                <div class="col col-md-10">
                                    <h6 class="text-white text-capitalize ps-3">Completed Orders</h6>
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
                                    <thead class="table-dack">
                                        <caption>{{ $completed->links() }}</caption>

                                        <tr>
                                            <th>User Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Food Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Ordered at</th>
                                            <th>Completed at</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($completed as $order)
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

        {{-- Cancelled Orders --}}
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="row">
                                <div class="col col-md-10">
                                    <h6 class="text-white text-capitalize ps-3">Canceled Orders</h6>
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
                                        <caption>{{ $canceled->links() }}</caption>

                                        <tr>
                                            <th>User Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Food Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Canceled by</th>
                                            <th>Ordered at</th>
                                            <th>Canceled at</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($canceled as $order)
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
                                                <td>{{ $order->canceled_by != 0 ? ($order->canceled_by == 1 ? 'You' : 'Admin') : ''  }}</td>
                                                <td>{{ date_format($order->created_at, 'Y/m/d H:i:s') }}</td>
                                                <td>{{ date_format($order->updated_at, 'Y/m/d H:i:s') }}</td>
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

        {{-- Others --}}
        {{-- <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Projects table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Project</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Budget</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Completion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div>
                                                    <img src="../assets/img/small-logos/logo-asana.svg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div>
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">Asana</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">working</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="me-2 text-xs font-weight-bold">60%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link text-secondary mb-0">
                                                <i class="fa fa-ellipsis-v text-xs"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection
