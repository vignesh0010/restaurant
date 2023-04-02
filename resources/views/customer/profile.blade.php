<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{ asset('web_assets/css/profile.css') }}">
<!------ Include the above in your HEAD tag ---------->

@extends('customer.layout')
@section('content')
    <div class="container emp-profile">
        <form action="{{ route('profile-update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img id="profile_id" src="{{ isset($user->file_path)? asset('public/' . $user->file_path): 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIMAAACDCAMAAACZQ1hUAAAAMFBMVEXk5ueutLfn6eq4vb+rsbTP0tSorrLGysy0ubzc3+Dg4uPX2tu7wMPS1dfBxcjq7O2mCm8BAAADC0lEQVR4nO2aadbqIAxAIcy0pfvf7aN1OPo9LUlN0B/cDXhPJihRqcFgMBgMBoPBYDAY3IHKN39d5bS4ypLUV0QAphK19XZHm5DWzhqQQ/15/YD10amOFpCLfRK4auh+FuD0C4MNH1MfCZj9a4PdIqwdDPKrNDxIzOKRgHRosFWFEVdoGOwSspHIbYUqMUvWBMRWJnZ8kIsEBJRCjcQkJQHTQVM+E4UUlIpYBW2FsgEOmYldQkRBAd5AKhCkMNTeEFCofUlR0NYJBCKjm+KCwMgmpqIGIvE7GJqCRDJQJ8UThd2heWb/R+R2AEcsyZqMzO2APa4eHCZuh0JVEHCY6Q4Ls8NKbU2B5vwFhzO5YHc4UZPc9QDlB3qTemQJzCg1kR00t8KJM0vgw5N2jRK5UUKgOnCXZCVRD05+BdrVXuhyTzy9PXtn7pAcZB4hSKPS89+qdwgjQuwZhDKvhcJA+MaQfIhRuBlhJd8HYcFlQ85AIUvCCj8Yr+1vHWmF9geX1Vn+2RyWd6/2u0Lssj6AbN6GQrQpn1hdfGVhrckdNgdXQDn9d4VgtRF7nX1jAVO5bNP2AFivQ/rCbm+F5MJsjJlLWHLvrd4VWGG90T0GsK9XJxdCmTdKCW6ZcredL6wquWJu29VbR1jvrY4lTGqVzQpAnkLcfv3tiKrFWZYsFY4a/mXWRzPy7qGjSwLjsvbirD36HuWt4d75ggqa+onjbWGcmpAKPgIPWM81OSEXRBG8sbCG4zJRP6/OGlw05k/rAqbPDDYJ7z5pVVD0V6hXFh8kBBJurduW0GefCRHXVzS+nIsCSx5unLpnwsypsOWDLAGGV2GzoF76+RWoEtyJuEF4HzqxOEJh8X9JgIWvKf9IYPeN7b/+fCCBHFYCLfEAqiRObAkIWIO514BUMVzwiGuNVE/cwayghRW0X1oSstWw035Fpq5K6DT/nHFibUV2aLzV8F4a3tCoSuKi5ByNZOQOYWgNbORb8IcOhyeX+IC6EI/mdZeSrIE4doimA8eNAX04UhgMBoPBL/IPJ+4illzek3MAAAAASUVORK5CYII=' }}"
                            alt="Profile Image" height="300" width="300" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="profile" onchange="document.getElementById('profile_id').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                    @error('profile')
                        <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <h6>
                            {{ $user->email }}
                        </h6>

                        <br><br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">User Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('profile-destroy',['id'=> $user->id]) }}" class="btn btn-danger"> Delete My Account</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mobile</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->mobile }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->address }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->city }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pin</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->pin }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="justify-content-center align-items-center">
                                <div class="row-cols-12  g-2">
                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter your Name" aria-describedby="helpId"
                                                value="{{ $user->name ?? old('name') }}">
                                            @error('name')
                                                <small id="helpId"
                                                    class="text-danger text-danger ">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Enter your mobile Email ID" aria-describedby="helpId"
                                                value="{{ $user->email ?? old('email') }}">
                                            @error('email')
                                                <small id="helpId" class="text-danger ">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Mobile</label>
                                            <input type="text" name="mobile" id="mobile" class="form-control"
                                                placeholder="Enter your mobile Number" aria-describedby="helpId"
                                                value="{{ $user->mobile ?? old('mobile') }}">
                                            @error('mobile')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Enter your  Password" aria-describedby="helpId"
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Confirm Password</label>
                                            <input type="password" name="c_password" id="c_password"
                                                class="form-control" placeholder="Enter your Confirm Password"
                                                aria-describedby="helpId" value="{{ old('c_password') }}">
                                            @error('c_password')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Enter your Address" aria-describedby="helpId"
                                                value="{{ $user->address ?? old('address') }}">
                                            @error('address')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">City</label>
                                            <input type="text" name="city" class="form-control"
                                                placeholder="Enter your City" aria-describedby="helpId"
                                                value="{{ $user->city ?? old('city') }}">
                                            @error('city')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-8">
                                            <label for="" class="form-label">Pincode</label>
                                            <input type="text" name="pin" class="form-control"
                                                placeholder="Enter your Pincode" aria-describedby="helpId"
                                                value="{{ $user->pin ?? old('c_password') }}">
                                            @error('pin')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success"
                                                    class="form-control" aria-describedby="helpId">

                                            </div>
                                            <div class="col">
                                                <input type="reset" class="btn btn-warning"
                                                    class="form-control" aria-describedby="helpId">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
