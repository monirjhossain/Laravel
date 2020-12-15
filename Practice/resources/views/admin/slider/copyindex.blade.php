@extends('layouts.dashboard_master')
@section('slider')
    active
@endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Product</span>
    </nav>
  
    <div class="sl-pagebody">
  
      <div class="row row-sm">
        <div class="col-md-12">
          @if (session('restore_status'))
          <div class="alert alert-success">
            {{ session('restore_status') }}
          </div>    
          @endif
        </div>
        <div class="col-md-12">
          @if (session('hardDelete_status'))
          <div class="alert alert-info">
            {{ session('hardDelete_status') }}
          </div>    
          @endif
        </div>
        <div class="col-md-12">
          @if (session('delete_status'))
          <div class="alert alert-danger">
            {{ session('delete_status') }}
          </div>    
          @endif
        </div>
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header bg-success text-white">
                      List Product (Active)
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Serial Number</th>
                              <th>Slider Title</th>
                              <th>Slider Info</th>
                              <th>Slider Image</th>
                              <th>CreatedA At</th>
                            </tr>
                          </thead>
                          <tbody>  
                            
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                      Add Category
                  </div>
                  <div class="card-body">
                    @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                    @endif
                      <form method="POST" action="{{ url('/admin/slider/post') }}" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Slider Title</label> 
                            <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Slider Info</label> 
                              <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price">
                            </div>                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slider Image</label> 
                                <input type="file" class="form-control" name="product_thumbnail_photo">
                            </div>

                          @error('category_name')
                              <div class="alert alert-danger">
                                {{ $message }}
                              </div> 
                          @enderror
                          <button type="submit" class="btn btn-success">Add Slider</button>
                        </form>
                  </div>
              </div>
          </div>
      </div> 
    </div>  
  </div>

@endsection