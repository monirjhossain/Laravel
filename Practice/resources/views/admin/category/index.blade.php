@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
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
                        List Category (Active)
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Added By</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Updated Time</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                          @forelse ($categories as $category)
                              <tbody>  
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
                                  <div class="btn-group text-white" role="group" aria-label="Basic Example">
                                    <a href="{{ url('update/category') }}/{{ $category->id }}" type="button" class="btn btn-info text-white">Update</a>
                                    <a href="{{ url('delete/category') }}/{{ $category->id }}" type="button" class="btn btn-danger text-white">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              @empty 
                              <tr>
                                <td colspan="50" class="text-center">Data is not here</td>
                              </tr>
                            </tbody>
                          @endforelse  
                        </table>
                    </div>
                </div>
                <div class="card mt-5">
                  <div class="card-header bg-danger text-white">
                      List Category (Deleted)
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Serial Number</th>
                              <th scope="col">Category Name</th>
                              <th scope="col">Added By</th>
                              <th scope="col">Created Time</th>
                              <th scope="col">Updated Time</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @forelse ($deleted_categories as $deleted_category)
                            <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $deleted_category->category_name }}</td>
                              <td>{{ App\User::find($deleted_category->user_id)->name }}</td>
                              <td>
                              @if ($deleted_category->created_at)
                                  {{ $deleted_category->created_at->diffForHumans() }}
                              @else
                                  No time show
                              @endif
                              </td>
                              <td>
                                @if ($deleted_category->updated_at)
                                  {{ $deleted_category->updated_at->diffForHumans() }}
                              @else
                                  No time show
                              @endif
                              </td>
                              <td>
                                <div class="btn-group text-white" role="group" aria-label="Basic Example">
                                  <a href="{{ url('restore/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-success text-white">Restore</a>
                                  <a href="{{ url('harddelete/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-danger text-white">P.Delete</a>
                                </div>
                              </td>
                            </tr>
                            @empty 
                            <tr>
                              <td colspan="50" class="text-center">Data is not here</td>
                            </tr>
                            @endforelse  
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
                        <form method="POST" action="{{ url('/add/category/post') }}">
                          @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label> 
                              <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                            </div>
                            @error('category_name')
                                <div class="alert alert-danger">
                                  {{ $message }}
                                </div> 
                            @enderror
                            <button type="submit" class="btn btn-success">Add Category</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection