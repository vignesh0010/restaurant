 @extends('customer.layout')

@section('content')
 <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Restaurants</span>
                        </div>
                        <ul>
                            @foreach ($restaurants as $restaurant)
                                <li><a href="#">{{ $restaurant->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+91 1234567890</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset('web_assets/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>Delicious Food</span>
                            <h2> Food <br />100% Fresh</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".breakfast">Breakfast</li>
                            <li data-filter=".lunch">Lunch</li>
                            <li data-filter=".snack">Snacks</li>
                            <li data-filter=".diner">Diner</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                
                @foreach ($menus as $menu)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix lunch breakfast">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset($menu->food->file_path) ?? asset("storage/app/public/".$food->file_path) }}">
                            <ul class="featured__item__pic__hover">
                                <li class="add_wishlist" value="{{ $menu->id }}"><a><i class="fa fa-heart"></i></a></li>
                                {{-- <li hidden><a href="#"><i class="fa fa-retweet"></i> </a></li> --}}
                                <li class="add_cart" value="{{ $menu->id }}" ><a><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h5><b> {{ $menu->food->name }}</b></h5>
                            <h6>{{  $menu->restaurant->name }} </h6>
                            <h4>{{ '₹ '.$menu->price }}</h4>
                        </div>
                        
                        <div class="row justify-content-center align-items-center">
                            <button class="col col-md-6 btn btn-danger food_order" value="{{ $menu->id }}"><b>Order</b></button>
                        </div>
                    </div>
                    
                </div>
                @endforeach
                
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('web_assets/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('web_assets/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

<script>
    $(document).ready(function () {
        function myAjax(type,url,data,success,error){
            const response = $.ajax({
                        type: type,
                        url: url,
                        data: data,
                        dataType: 'json',
                        contentType: "application/json; charset=utf-8",
                         success: function (response) {
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

            function success(response){
                console.log(response.status_code);
                switch(response.status_code){
                    case 200 :
                        swal({
                            title: "Good job!",
                            text: "Order Placed Success",
                            icon: "success",
                            button: "OK",
                        });
                    break; 
                    case 400 :
                        swal({
                            title: "Job warning!",
                            text: "You already Ordered this Food! Please wait your food id on the Way!!",
                            icon: "warning",
                            button: "OK",
                        });
                    break;
                    case 500 :
                        swal({
                            title: "OOPs!",
                            text: "Somthing Went Wrong!",
                            icon: "error",
                            button: "OK",
                        });
                    break;

                }
            }

            function error(response){
                swal({
                    title: "OOPs!",
                    text: "Somthing Went Wrong!",
                    icon: "error",
                    button: "OK",
                });
            }

            const ajax = myAjax('get',"{{ route('create-order') }}",data,success,error);
        });


        // Add to add_wishlist

        $(".add_wishlist").click(function(event) {
            event.preventDefault();
            let data = {
                'menu_id': this.getAttribute('value'),
                'member_id': {{ auth()->user()->id }}
            }

            function success(response){
                console.log(response.status_code);
                switch(response.status_code){
                    case 200 :
                        $('#user_wishlist').html(response.wishlist_count)
                        swal({
                            title: "Good job!",
                            text: "Your food added success to Wishlist",
                            icon: "success",
                            button: "OK",
                        });
                    break; 
                    case 400 :
                        swal({
                            title: "Job warning!",
                            text: "You already added this food to Your Wishlist!!",
                            icon: "warning",
                            button: "OK",
                        });
                    break;
                    case 500 :
                        swal({
                            title: "OOPs!",
                            text: "Somthing Went Wrong!",
                            icon: "error",
                            button: "OK",
                        });
                    break;

                }
            }

            function error(response){
                swal({
                    title: "OOPs!",
                    text: "Somthing Went Wrong!",
                    icon: "error",
                    button: "OK",
                });
            }

            const ajax = myAjax('get',"{{ route('add-wishlist') }}",data,success,error);
        });

        // Add to Cart

        $(".add_cart").click(function(event) {
            event.preventDefault();
            let data = {
                'menu_id': this.getAttribute('value'),
                'member_id': {{ auth()->user()->id }}
            }

            function success(response){
                console.log(response.status_code);
                switch(response.status_code){
                    case 200 :
                        $('#user_cart').html(response.cart_count)
                        swal({
                            title: "Good job!",
                            text: "Your food added success to Cart",
                            icon: "success",
                            button: "OK",
                        });
                    break; 
                    case 400 :
                        swal({
                            title: "Are you sure?",
                            text: "You already added this food to Your Cart!! You want to Remove",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                function success(response){
                                    console.log(response.status_code);
                                    switch(response.status_code){
                                        case 200 :
                                            $('#user_cart').html(response.cart_count)
                                            swal({
                                                title: "Good job!",
                                                text: "Your food Removed success from Cart",
                                                icon: "success",
                                                button: "OK",
                                            });
                                        break; 
                                        case 500 :
                                            swal({
                                                title: "OOPs!",
                                                text: "Somthing Went Wrong!",
                                                icon: "error",
                                                button: "OK",
                                            });
                                        break;
                                    }
                                }
                                myAjax('get',"{{ route('remove-cart') }}",data,success,error);

                            }
                            });
                        
                    break;
                    case 500 :
                        swal({
                            title: "OOPs!",
                            text: "Somthing Went Wrong!",
                            icon: "error",
                            button: "OK",
                        });
                    break;

                }
            }

            function error(response){
                swal({
                    title: "OOPs!",
                    text: "Somthing Went Wrong!",
                    icon: "error",
                    button: "OK",
                });
            }

            const ajax = myAjax('get',"{{ route('add-cart') }}",data,success,error);
        });

    });

    
    
    
</script>
@endsection