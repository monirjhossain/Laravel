@extends('layouts.dashboard_master')
@section('product')
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
                              <th>Category Name</th>
                              <th>Added By</th>
                              <th>Created Time</th>
                              <th>Updated Time</th>
                              <th>Category Photo</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            {{-- @forelse ($categories as $category)
                            <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $category->category_name }}</td>
                              <td>{{ App\User::find($category->user_id)->name }}</td>
                              <td>
                              @if ($category->created_at)
                                  {{ $category->created_at->diffForHumans() }}
                              @else
                                  No time show
                              @endif
                              </td>
                              <td>
                                @if ($category->updated_at)
                                  {{ $category->updated_at->diffForHumans() }}
                              @else
                                  No time show
                              @endif
                              </td>
                              <td>
                                <img src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" width="100">
                              </td>
                              <td>
                                <div class="btn-group text-white" role="group"    aria-label="Basic Example">
                                  <a href="{{ url('update/category') }}/{{ $category->id }}" type="button" class="btn btn-info text-white">Update</a>
                                  <a href="{{ url('delete/category') }}/{{ $category->id }}" type="button" class="btn btn-danger text-white">Delete</a>
                                </div>
                              </td>
                            </tr>
                            @empty 
                            <tr>
                              <td colspan="50" class="text-center">Data is not here</td>
                            </tr>
                            @endforelse   --}}
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
                      <form method="POST" action="{{ url('/add/product/post') }}" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label> 
                            <input type="text" class="form-control" name="product_name" placeholder="Enter Category Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label> 
                            <select name="category_name" id="category_id" class="form-control">
                                <option value="">--Select One--</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label> 
                            <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Product Quantity</label> 
                            <input type="text" class="form-control" name="product_quantity" placeholder="Enter Product Quantity">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Product Short Description</label> 
                            <textarea name="short_description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Product Short Description"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Product Long Description</label> 
                            <textarea name="long_description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Product Long Description"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Product Thumbnail Photo</label> 
                            <input type="file" class="form-control" name="product_thumbnail_photo">
                          </div>

                          @error('category_name')
                              <div class="alert alert-danger">
                                {{ $message }}
                              </div> 
                          @enderror
                          <button type="submit" class="btn btn-success">Add Product</button>
                        </form>
                  </div>
              </div>
          </div>
      </div> 
    </div>  
  </div>

@endsection