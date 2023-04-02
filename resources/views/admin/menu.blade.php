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
                                    <h6 class="text-white text-capitalize ps-3">Menus List</h6>
                                </div>
                                <div class="col col-md-2">
                                    <a href="{{ route('menus.create') }}" class=" btn btn-success">Create</a>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="table-responsive-xxl">
                                <table
                                    class="table
                                table-hover	
                                align-middle">
                                    <thead class="table-dack">
                                        <caption>{{ $menus->links() }}</caption>

                                        <tr>
                                            <th>Menu No</th>
                                            <th>Restaurant</th>
                                            <th>Food</th>
                                            <th>Food Category</th>
                                            <th>Price</th>
                                            <th>Food From</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->id }}</td>
                                                <td>{{ $menu->restaurant->name }}</td>
                                                <td>{{ $menu->food->name }}</td>
                                                <td>{{ $menu->food->category == 1 ? 'Veg' : 'NoN Veg' }}</td>
                                                <td>{{ $menu->price }}</td>
                                                <td>{{ $menu->restaurant->city }}</td>
                                                <td>{{ date_format($menu->created_at, 'Y/m/d H:i:s') }}</td>

                                                <td>
                                                    <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('menus.delete', ['id' => $menu->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>


                                                {{-- <td>
                                                    <div class="row row-md-12">
                                                        <div class="col col-md-6">
                                                            <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}"
                                                                class="btn btn-warning">Edit</a>

                                                        </div>
                                                        <div class="col  col-md-6">
                                                            <form
                                                                action="{{ route('menus.destroy', ['menu' => $menu->id]) }}"
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
