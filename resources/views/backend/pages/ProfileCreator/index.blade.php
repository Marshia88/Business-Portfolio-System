@extends('backend.layouts.app')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Profile Creators</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Add Business Person</a> -->
    </div>

    <div class="row">
        <div class='col-sm-12'>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile Creator List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>S1</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Address</th>
                                <th>Outlet</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($creators as $creator)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $creator->name }}</td>
                                <td>{{ $creator->link }}</td>
                                <td>{{ $creator->address }}</td>
                                <td>{{ $creator->outlet }}</td>
                                <td>
                                    <a href="#deleteModal{{ $creator->id }}" class="btn btn-danger"><i class="fa fa-trash" data-toggle='modal'></i> Delete</a>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $creator->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.profilecreator.delete', $creator->id) }}" method='post'>
                                            @csrf
                                            <div>
                                                {{ $creator->name}} will be deleted.
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