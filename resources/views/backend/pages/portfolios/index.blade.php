@extends('backend.layouts.app')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Portfolios</h1>
        <a href="{{ route('admin.portfolios.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50" ></i> Create Portfolio</a>
    </div>
    
    @include('backend.layouts.partials.messages');

    <div class="row">
        <div class='col-sm-12'>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Portfolio List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>S1</th>
                                <th>Business Person</th>
                                <th>Business Name</th>
                                <th>URL</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolios as $portfolio)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->business_name }}</td>
   
                                <td><a href="{{ route('portfolios.show', $portfolio->slug) }}" target="_blank">{{ route('portfolios.show', $portfolio->slug) }}</a></td>
                                <td>
                                    {{ $portfolio-> category->name }}
                                </td>
                                <!-- <td>{{ $portfolio->description }}</td> -->
                                <td>
                                    <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-success"><i class="fa fa-edit" ></i> Edit</a>
                                    <a href="#deleteModal{{ $portfolio->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i> Delete</a>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $portfolio->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.portfolios.delete', $portfolio->id) }}" >
                                            @csrf
                                            <div>
                                                {{ $portfolio->name}} will be deleted.
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Confirm</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal End -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection