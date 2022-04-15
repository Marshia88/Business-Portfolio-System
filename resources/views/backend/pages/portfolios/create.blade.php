@extends('backend.layouts.app')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Portfolio</h1>
    </div>
    
    @include('backend.layouts.partials.messages')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.portfolios.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class='row'>
                    <div class='col-md-6'>
                        <label for="">Business Name</label>
                        <br>
                        <input type="text" class="form-control" name="business_name" placeholder="Business Name">
                    </div>

                    <div class='col-md-6'>
                        <label for="">Profile URL Text</label>
                        <br>
                        <input type="text" class="form-control" name="slug" placeholder="Portfolio URL">
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="">Business Person</label>
                        <br>
                        <!-- <input type="text" class="form-control" name="name" placeholder="Name of business person"> -->
                        <select name="business_id" id="business_id" class="form-control">
                            <option value="">Select a Business Owner</option>
                            @foreach($business_person as $person)
                                <option value="{{$person->id}}">{{$person->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <br>
                        <label for="parent_id">Business Category</label>
                        <br>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <br>
                        <label for="">Age</label>
                        <br>
                        <input type="text" class="form-control" name="age" placeholder="Age of Business Person">
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="">Starting Year</label>
                        <br>
                        <select name="start_year" id="start_year" class="form-control">
                            <option value="">Select a starting year</option>
                                @for ($year = date('Y'); $year >= 1900 ; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                        </select>
                
                        <!-- <input type="text" class="form-control" name="start_year" placeholder="Start year of business"> -->
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="">Business Details</label>
                        <br>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="">Aspirations</label>
                        <br>
                        <textarea name="description" id="aspirations" cols="30" rows="5" class="form-control" placeholder="Aspiration to start business"></textarea>
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="">Email</label>
                        <br>
                        <input type="text" class="form-control" name="email" placeholder="Email of business person">
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="">Social Media</label>
                        <br>
                        <input type="text" class="form-control" name="social_media" placeholder="Social Media Link">
                    </div>
                    
                    <div class='col-md-6'>
                        <br>
                        <label for="">Linkedin</label>
                        <br>
                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin of business person">
                    </div>

                    <div class='col-md-6'>
                        <br>
                        <label for="image">Profile Image (Own image or image related to your business)</label>
                        <br>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Image of business person">
                    </div>

                    <div class="col-md-6">

                    </div>

                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection