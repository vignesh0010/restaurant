 @extends('customer.layout')

 @section('content')
     <div class="row justify-content-center align-items-center g-2">
         <div class="col">
             <h5><b>My Orders</b></h5>
         </div>
     </div>
     <div class="container-fluid py-4">
         <div class="row">
             <div class="col-12">
                 <div class="card my-4">
                      
                     <div class="card-body px-0 pb-2">
                         <div class="table-responsive p-0">
                             <div class="table-responsive-xxl">
                                 <table
                                     class="table table-striped
                                    table-hover	
                                    align-middle">
                                     <thead class="">
                                         <caption>{{ $pending_order->links() }}</caption>

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
                                         @foreach ($pending_order as $order)
                                             <tr>
                                                 <td>{{ $order->member->name }}</td>
                                                 <td>{{ $order->menu->restaurant->name }}</td>
                                                 <td>{{ $order->menu->food->name }}</td>
                                                 <td>{{ '₹ ' . $order->menu->price }}</td>
                                                 <td>{{ $order->menu->food->category == 1 ? 'Veg' : 'NoN Veg' }}</td>
                                                 <td>{{ $order->member->city }}</td>
                                                 <td><b>
                                                         @php
                                                             switch ($order->status) {
                                                                 case 1:
                                                                     echo 'Pending';
                                                                     break;
                                                                 case 2:
                                                                     echo 'Approved';
                                                                     break;
                                                                 case 3:
                                                                     echo 'Canceled';
                                                                     break;
                                                                 case 4:
                                                                     echo 'Completed';
                                                                     break;
                                                             }
                                                         @endphp
                                                     </b></td>
                                                 <td>{{ date_format($order->created_at, 'Y/m/d H:i:s') }}</td>
                                                 <td>{{ date_format($order->updated_at, 'Y/m/d H:i:s') }}</td>
                                                 <td>
                                                     <a href="{{ route('order-cancel-by-user', ['id' => $order->id]) }}"
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
     </div>
     <div class="container-fluid py-4">
         <div class="row">
             <div class="col-12">
                 <div class="card my-4">
                     <div class="card-body px-0 pb-2">
                         <div class="table-responsive p-0">
                             <div class="table-responsive-xxl">
                                 <table
                                     class="table table-striped
                                    table-hover	
                                    align-middle">
                                     <thead class="">
                                         <caption>{{ $done_order->links() }}</caption>

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
                                             <th>Updated at</th>
                                         </tr>
                                     </thead>
                                     <tbody class="table-group-divider">
                                         @foreach ($done_order as $order)
                                             <tr>
                                                 <td>{{ $order->member->name }}</td>
                                                 <td>{{ $order->menu->restaurant->name }}</td>
                                                 <td>{{ $order->menu->food->name }}</td>
                                                 <td>{{ '₹ ' . $order->menu->price }}</td>
                                                 <td>{{ $order->menu->food->category == 1 ? 'Veg' : 'NoN Veg' }}</td>
                                                 <td>{{ $order->member->city }}</td>
                                                 <td><b>
                                                         @php
                                                             switch ($order->status) {
                                                                 case 1:
                                                                     echo 'Pending';
                                                                     break;
                                                                 case 2:
                                                                     echo 'Approved';
                                                                     break;
                                                                 case 3:
                                                                     echo 'Canceled';
                                                                     break;
                                                                 case 4:
                                                                     echo 'Completed';
                                                                     break;
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
     </div>
     <script>
         $(document).ready(function() {
             function myAjax(type, url, data, success, error) {
                 const response = $.ajax({
                     type: type,
                     url: url,
                     data: data,
                     dataType: 'json',
                     contentType: "application/json; charset=utf-8",
                     success: function(response) {
                         success(response);
                     },
                     error: function(response) {
                         error(response);
                     }
                 });
                 return response;
             }


             $(".food_order").click(function(event) {
                 event.preventDefault();
                 let data = {
                     'menu_id': this.getAttribute('value'),
                     'member_id': {{ auth()->user()->id }}
                 }

                 function success(response) {
                     console.log(response.status_code);
                     switch (response.status_code) {
                         case 200:
                             swal({
                                 title: "Good job!",
                                 text: "Food Created Success",
                                 icon: "success",
                                 button: "OK",
                             });
                             break;
                         case 400:
                             swal({
                                 title: "Job warning!",
                                 text: "You already Ordered this Food! Please wait your food id on the Way!!",
                                 icon: "warning",
                                 button: "OK",
                             });
                             break;
                         case 500:
                             swal({
                                 title: "OOPs!",
                                 text: "Somthing Went Wrong!",
                                 icon: "error",
                                 button: "OK",
                             });
                             break;

                     }
                 }

                 function error(response) {
                     swal({
                         title: "OOPs!",
                         text: "Somthing Went Wrong!",
                         icon: "error",
                         button: "OK",
                     });
                 }

                 const ajax = myAjax('get', "{{ route('create-order') }}", data, success, error);
             });


             // Add to add_wishlist

             $(".add_wishlist").click(function(event) {
                 event.preventDefault();
                 let data = {
                     'menu_id': this.getAttribute('value'),
                     'member_id': {{ auth()->user()->id }}
                 }

                 function success(response) {
                     console.log(response.status_code);
                     switch (response.status_code) {
                         case 200:
                             $('#user_wishlist').html(response.wishlist_count)
                             swal({
                                 title: "Good job!",
                                 text: "Your food added success to Wishlist",
                                 icon: "success",
                                 button: "OK",
                             });
                             break;
                         case 400:
                             swal({
                                 title: "Job warning!",
                                 text: "You already added this food to Your Wishlist!!",
                                 icon: "warning",
                                 button: "OK",
                             });
                             break;
                         case 500:
                             swal({
                                 title: "OOPs!",
                                 text: "Somthing Went Wrong!",
                                 icon: "error",
                                 button: "OK",
                             });
                             break;

                     }
                 }

                 function error(response) {
                     swal({
                         title: "OOPs!",
                         text: "Somthing Went Wrong!",
                         icon: "error",
                         button: "OK",
                     });
                 }

                 const ajax = myAjax('get', "{{ route('add-wishlist') }}", data, success, error);
             });

         });
     </script>
 @endsection
