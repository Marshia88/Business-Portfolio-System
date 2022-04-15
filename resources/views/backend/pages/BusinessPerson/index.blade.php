@extends('backend.layouts.app')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Business Persons</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"><i class="fas fa-plus-circle fa-sm text-white-50" ></i> Add Business Person</a>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Business Person</button> -->
    </div>
    
    @include('backend.layouts.partials.messages');

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Business Person</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.businessperson.store') }}" method="post">
                        @csrf
                        <div class='row'>
                            <div class='col-12'>
                                <label for="">Business Person's Name</label>
                                <br>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class='col-12'>
                                <br>
                                <label for="">Business Person's Link</label>
                                <br>
                                <input type="text" class="form-control" name="link" placeholder="Link">
                            </div>
                            <div class='col-12'>
                                <br>
                                <label for="">Business Person's Details</label>
                                <br>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal Ends -->

    <div class="row">
        <div class='col-sm-12'>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Person List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>S1</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($persons as $person)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->link }}</td>
                                <td>{{ $person->description }}</td>
                                <td>
                                    <a href="#editModal{{ $person->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-edit" ></i> Edit</a>
                                    <a href="#deleteModal{{ $person->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i> Delete</a>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $person->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Business Person</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.businessperson.update', $person->id) }}" method="post">
                                                @csrf
                                                <div class='row'>
                                                    <div class='col-12'>
                                                        <label for="">Business Person's Name</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $person->name}}">
                                                    </div>
                                                    <div class='col-12'>
                                                        <br>
                                                        <label for="">Business Person's Link</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="link" placeholder="Link" value="{{ $person->link}}">
                                                    </div>
                                                    <div class='col-12'>
                                                        <br>
                                                        <label for="">Business Person's Details</label>
                                                        <br>
                                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description">{!! $person->description !!}</textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal Ends -->

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $person->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.businessperson.delete', $person->id) }}" >
                                            @csrf
                                            <div>
                                                {{ $person->name}} will be deleted.
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