@extends('layouts.dashboard_master')
@section('content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ url('add/product') }}">Add product</a>
    <span class="breadcrumb-item active">{{ $product->product_name }}</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">
                        Update product
                    </div>
                    <div class="card-body ">
                        @if (session('update_status'))
                      <div class="alert alert-success">
                          {{ session('update_status') }}
                      </div>
                      @endif
                        <form method="post" action="{{ url('/update/product/post') }}" enctype="multipart/form-data">
                          @csrf

                            <div class="form-group">
                              <label for="exampleInputEmail1">product Name</label> 
                              <input type="hidden" name="product_id" value="{{ $category_id ?? '' }}">
                              <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">product Price</label> 
                              <input type="text" class="form-control" name="product_price" value="{{ $product->product_price }}">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Product Short Description</label> 
                              <input type="text" class="form-control" name="product_short_description" value="{{ $product->product_short_description ?? '' }}">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Product Long Description</label> 
                              <input type="text" class="form-control" name="product_short_description" value="{{ $product->product_long_description ?? '' }}">
                            </div>


                            <div class="form-group">
                              <label for="exampleInputEmail1">Current product Photo</label> 
                              <img src="{{ asset('uploads/product_photos/' . $product->product_thumbnail_photo) }}" class="form-control"  alt="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">New product Photo</label> 
                              <input type="file" class="form-control" name="new_product_photo" value="{{ $product->product_thumbnail_photo }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update product</button>
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