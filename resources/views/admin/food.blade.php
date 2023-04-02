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
                                    <h6 class="text-white text-capitalize ps-3">food List</h6>
                                </div>
                                <div class="col col-md-2">
                                    <input type="button" class=" btn btn-success" data-bs-toggle="modal" value="Create"
                                        data-bs-target="#food_create">
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
                                        <caption>{{ $foods->links() }}</caption>

                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($foods as $food)
                                            <tr>
                                                <td>{{ $food->name }}</td>
                                                <td>{{ $food->category == 1 ? 'Veg' : 'Non Veg'}}</td>
                                                <td>{{ date_format($food->created_at, 'Y/m/d H:i:s') }}</td>

                                                <td>
                                                    <a href="{{ route('food.edit', ['food' => $food->id]) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('food.delete', ['id' => $food->id]) }}"
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

        <!-- Modal -->
        <div class="modal fade" id="food_create" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">{{ 'Create Food' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form class="form-inline text-center" id="food_form">
                                @csrf

                                <!--Image-->
                                <div>
                                    <div class="mb-4 d-flex justify-content-center">
                                        <img src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            id="food_upload" alt="Food Image" width="200" height="200" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <input type="file" class="btn btn-primary btn-rounded" name="food_img"
                                            onchange="document.getElementById('food_upload').src = window.URL.createObjectURL(this.files[0])" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control border border-info"
                                                value="" placeholder="Name" required>
                                            @error('name')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="mb-6">
                                            <label for="" class="form-label">Category</label>
                                            <select class="form-select form-select-lg" name="category" required>
                                                <option selected>...</option>
                                                @foreach (config('admin.data.food_category') as $category)
                                                    <option value="{{ $category }}" {{ isset($food->category) && $food->category == $category ? 'selected' : '' }}>{{ $category == 1 ? 'Veg' : 'Non Veg'}}</option>
                                                @endforeach
                                                
                                            </select>

                                            @error('category')
                                                <small id="helpId"
                                                    class="text-danger text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col">
                                        <input type="submit" class="btn btn-success">
                                    </div>

                                    <div class="col">
                                        <input type="reset" class=" btn btn-warning ">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" id="close_model" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // ajax
            const formElement = document.querySelector("#food_form");

            formElement.addEventListener('submit', (e) => {
                e.preventDefault();

                const request = new XMLHttpRequest();

                request.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            console.log(this.response);
                            swal({
                                title: "Good job!",
                                text: "Food Created Success",
                                icon: "success",
                                button: "OK",
                            });
                            document.querySelector("#close_model").click();
                            location.reload()
                        }else {
                            console.log(this.response);
                            swal({
                                title: "Food Created Failed",
                                text: "All fields are mandatory and name should be unique",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    }
                }
                request.open('POST', "{{ route('food.store') }}", true);
                request.send(new FormData(formElement));
            });
        </script>
    @endsection
