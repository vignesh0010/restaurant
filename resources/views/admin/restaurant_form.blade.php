@extends('admin.layout')

@section('content')
    <div class="form-div">
        <h4 class="title-form">Restaurant</h4>
        <form class="form-inline text-center" action="{{ isset($restaurant->id) ? route('restaurants.update',['restaurant' => $restaurant->id]) : route('restaurants.store') }}" method="POST">
            @if (isset($restaurant->id))
               @method('put') 
            @endif
            @csrf  
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="mb-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-info" value="{{ $restaurant->name ?? '' }}" placeholder="Name">
                        @error('name')
                            <small id="helpId"
                                class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-6">
                        <label for="" class="form-label">GST No</label>
                        <input type="text" name="gst_no" class="form-control border border-info" value="{{ $restaurant->gst_no ?? '' }}" placeholder="GST NO"
                            aria-describedby="helpId">
                        @error('gst_no')
                            <small id="helpId"
                                class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-6">
                        <label for="" class="form-label">City</label>
                        <input type="text" name="city" class="form-control border border-info " value="{{ $restaurant->city ?? '' }}" placeholder="City">
                        @error('city')
                            <small id="helpId"
                                class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <input type="submit"  class="btn btn-success" value="{{ isset($restaurant->id) ? 'Update' : 'Create'}}">
                </div>

                <div class="col">
                    <input type="reset"   class=" btn btn-warning ">
                </div>
            </div>


        </form>
        
    </div>
@endsection
