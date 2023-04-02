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
                                    <h6 class="text-white text-capitalize ps-3">Restaurants List</h6>
                                </div>
                                <div class="col col-md-2">
                                    <a href="{{ route('restaurants.create') }}" class=" btn btn-success">Create</a>
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
                                        <caption>{{ $restaurants->links() }}</caption>

                                        <tr>
                                            <th>Name</th>
                                            <th>GST NO</th>
                                            <th>City</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($restaurants as $restaurant)
                                            <tr>
                                                <td>{{ $restaurant->name }}</td>
                                                <td>{{ $restaurant->gst_no }}</td>
                                                <td>{{ $restaurant->city }}</td>
                                                <td>{{ date_format($restaurant->created_at, 'Y/m/d H:i:s') }}</td>

                                                <td>
                                                    <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant->id]) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('restaurants.delete', ['restaurant' => $restaurant->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>


                                                {{-- <td>
                                                    <div class="row row-md-12">
                                                        <div class="col col-md-6">
                                                            <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant->id]) }}"
                                                                class="btn btn-warning">Edit</a>

                                                        </div>
                                                        <div class="col  col-md-6">
                                                            <form
                                                                action="{{ route('restaurants.destroy', ['restaurant' => $restaurant->id]) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-warning"
                                                                    type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td> --}}
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
