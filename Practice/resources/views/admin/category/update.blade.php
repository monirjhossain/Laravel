@extends('layouts.dashboard_master')
@section('content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ url('add/category') }}">Add Category</a>
    <span class="breadcrumb-item active">{{ $category_name }}</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">
                        Update Category
                    </div>
                    <div class="card-body ">
                        @if (session('update_status'))
                      <div class="alert alert-success">
                          {{ session('update_status') }}
                      </div>
                      @endif
                        <form method="post" action="{{ url('/update/category/post') }}" enctype="multipart/form-data">
                          @csrf

                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label> 
                              <input type="hidden" name="category_id" value="{{ $category_id }}">
                              <input type="text" class="form-control" name="category_name" value="{{ $category_name }}">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Current Category Photo</label> 
                              <img src="{{ asset('uploads/category_photos') }}/{{ $category_photo }}" class="form-control"  alt="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">New Category Name</label> 
                              <input type="file" class="form-control" name="new_category_photo" value="{{ $category_name }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update Category</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
</div>


    
@endsection