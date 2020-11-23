@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        List Category
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
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