@extends('layouts.dashboard_master')
@section('content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">User List</a>
    <span class="breadcrumb-item active">Edit Profile</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                Edit Your Profile
            </div>
            <div class="card-body">
              @if (session('success_message'))
              <div class="alert alert-success">
                  {{ session('success_message') }}
              </div>
              @endif
                <form method="POST" action="{{ url('/profile/post') }}">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label> 
                      <input type="text" class="form-control" name="name" placeholder="Change your Name" value="{{ Str::title(Auth::user()->name) }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">
                          {{ $message }}
                        </div> 
                    @enderror
                    <button type="submit" class="btn btn-success">Change Profile</button>
                  </form>
            </div>
        </div>
    </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-body">
                  @if (session('password_change_status'))
                  <div class="alert alert-success">
                      {{ session('password_change_status') }}
                  </div>
                  @endif
                  @if (session('database_status'))
                  <div class="alert alert-danger">
                     {{ session('database_status') }}
                  </div>
                  @endif
                    <form method="POST" action="{{ url('password/post') }}">
                      @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Old Password</label> 
                          <input type="password" class="form-control" name="old_password" placeholder="Write Old Password" value="{{ old('old_password') }}">
                        </div>
                        @error('old_password')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div> 
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label> 
                            <input type="password" class="form-control" name="password" placeholder="Write New Password" value="{{ old('password') }}">
                          </div>
                          @error('password')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div> 
                        @enderror
                          <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label> 
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Write Confirm Password" value="">
                          </div>
                        @error('password_confirmation')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div> 
                        @enderror
                        <button type="submit" class="btn btn-info">Change Password</button>
                      </form>
                </div>
            </div>
        </div> 
    </div>   
</div>
@endsection