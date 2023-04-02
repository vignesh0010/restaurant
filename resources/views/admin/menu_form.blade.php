@extends('admin.layout')

@section('content')
    <div class="form-div">
        <h4 class="title-form">Menu</h4>
        <form class="form-inline text-center"
            action="{{ isset($menu->id) ? route('menus.update', ['menu' => $menu->id]) : route('menus.store') }}"
            method="POST">
            @if (isset($menu->id))
                @method('put')
            @endif
            @csrf
            <div class="row justify-content-center align-items-center g-2">
                
                <div class="col ">
                    <div class="mb-6">
                        <label for="" class="form-label">Restaurants Name</label>
                        <select class="form-select form-select-lg" name="restaurant_name" required>
                            <option {{ isset($menu->id) ? '' : 'selected' }}></option>
                            @if (isset($menu->id))
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}" {{ $restaurant->id == $menu->restaurant_id ? 'selected ': '' }}>{{ $restaurant->name }}</option>
                                @endforeach
                            @else
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                @endforeach
                            @endif

                            
                        </select>

                        @error('restaurant_name')
                            <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-6">
                        <label for="" class="form-label">Food Name</label>
                        <select class="form-select form-select-lg" name="food_name" required>
                            <option {{ isset($menu->id)? '' : 'selected ' }}></option>
                            @if (isset($menu->id))
                                @foreach ($foods as $food)
                                    <option value="{{ $food->id }}" {{ $food->id == $menu->food_id ? 'selected ': '' }}>{{ $food->name }}</option>
                                @endforeach
                            @else
                                @foreach ($foods as $food)
                                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                                @endforeach
                            @endif
                            

                        </select>

                        @error('food_name')
                            <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-6">
                        <label for="" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control border border-info float"
                            value="{{ $menu->price ?? '' }}" placeholder="Name" required>
                        @error('price')
                            <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <input type="submit" class="btn btn-success" value="{{ isset($menu->id) ? 'Update' : 'Create' }}">
                </div>

                <div class="col">
                    <input type="reset" class=" btn btn-warning ">
                </div>
            </div>


        </form>

    </div>

    <script>
        $('input.float').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
});
    </script>
@endsection
