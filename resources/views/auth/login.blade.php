@extends('auth.layout')

@section('content')
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
        <div class="card card-plain">
            <div class="card-header">
                <h4 class="font-weight-bolder">Sign In</h4>
                <p class="mb-0">Enter your email and password to Login</p>
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('login-user') }}" method="POST">
                    @csrf
                    <small class="error-text"></small>
                    <div class="input-group input-group-outline mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        
                    </div>
                    @error('email')
                            <small id="helpId"
                                class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    @error('password')
                            <small id="helpId"
                                class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign
                            In</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
            </div>
        </div>
    </div>
@endsection
