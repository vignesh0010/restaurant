@extends('admin.layout')

@section('content')
    <div class="form-div">
        <h4 class="title-form">Food</h4>

        <form class="form-inline text-center"
            action="{{ isset($food->id) ? route('food.update', ['food' => $food->id]) : route('food.store') }}"
            method="POST">
            @if (isset($food->id))
                @method('put')
            @endif
            @csrf

            <!--Image-->
            <div>
                <div class="mb-4 d-flex justify-content-center">
                    <img src="{{ url("storage/app/public/".$food->file_path) ?? 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=600' }}"
                        id="food_upload" alt="Food Image" width="200" height="200" />
                </div>
                <div class="d-flex justify-content-center">
                    <input type="file" class="btn btn-primary btn-rounded" name="food_img"
                        onchange="document.getElementById('food_upload').src = window.URL.createObjectURL(this.files[0])"
                        accept="image/*">
                </div>
                @error('name')
                    <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="mb-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-info"
                            value="{{ $food->name ?? '' }}" placeholder="Name">
                        @error('name')
                            <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-6">

                        <label for="" class="form-label">Category</label>
                        <select class="form-select form-select-lg" name="category" required>
                            <option selected>...</option>
                            @foreach (config('admin.data.food_category') as $category)
                                <option value="{{ $category }}"
                                    {{ isset($food->category) && $food->category == $category ? 'selected' : '' }}>
                                    {{ $category == 1 ? 'Veg' : 'Non Veg' }}</option>
                            @endforeach

                        </select>

                        @error('category')
                            <small id="helpId" class="text-danger text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <input type="submit" class="btn btn-success" value="{{ isset($food->id) ? 'Update' : 'Create' }}">
                </div>

                <div class="col">
                    <input type="reset" class=" btn btn-warning ">
                </div>
            </div>
        </form>
    </div>
@endsection
