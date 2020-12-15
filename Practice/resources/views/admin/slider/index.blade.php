@extends('layouts.dashboard_master')
@section('slider')
    active
@endsection

@section('content')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
    <span class="breadcrumb-item active">Add slider</span>
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
                    List slider (Active)
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Serial Number</th>
                            <th>slider Title</th>
                            <th>slider sub Title</th>
                            <th>slider Button text</th>
                            <th>slider Button link</th>
                            <th>slider Description</th>
                            <th>Added By</th>
                            <th>Created Time</th>
                            <th>Updated Time</th>
                            <th>slider Photo</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          @forelse ($sliders as $slider)
                          <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $slider->slider_title }}</td>
                            <td>{{ $slider->slider_subtitle }}</td>
                            <td>{{ $slider->slider_description }}</td>
                            <td>{{ $slider->button_text }}</td>
                            <td>{{ $slider->button_link }}</td>
                            {{-- <td>{{ App\User::find($slider->user_id)->name }}</td> --}}
                            <td>
                            @if ($slider->created_at)
                                {{ $slider->created_at->diffForHumans() }}
                            @else
                                No time show
                            @endif
                            </td>
                            <td>
                              @if ($slider->updated_at)
                                {{ $slider->updated_at->diffForHumans() }}
                            @else
                                No time show
                            @endif
                            </td>
                            <td>
                              <img src="{{ asset('uploads/slider_photos') }}/{{ $slider->slider_image }}" width="100">
                            </td>
                            <td>
                              <div class="btn-group text-white" role="group"    aria-label="Basic Example">
                                <a href="{{ url('update/slider') }}/{{ $slider->id }}" type="button" class="btn btn-info text-white">Update</a>
                                <a href="{{ url('delete/slider') }}/{{ $slider->id }}" type="button" class="btn btn-danger text-white">Delete</a>
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
            <div class="card mt-5">
              <div class="card-header bg-danger text-white">
                  List slider (Deleted)
              </div>
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Serial Number</th>
                          <th>slider Title</th>
                          <th>slider Subtitle</th>
                          <th>slider Button</th>
                          <th>slider Link</th>
                          <th>Added By</th>
                          <th>Created Time</th>
                          <th>Updated Time</th>
                          <th>slider Photo</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $deleted_sliders = '';
                        @endphp
                        @if(!$deleted_sliders == '') 
                        @forelse ($deleted_sliders as $deleted_slider)
                        <tr>
                          <td>{{ $loop->index+1 }}</td>
                          <td>{{ $deleted_slider->slider_name }}</td>
                          <td>{{ App\User::find($deleted_slider->user_id)->name }}</td>
                          <td>
                          @if ($deleted_slider->created_at)
                              {{ $deleted_slider->created_at->diffForHumans() }}
                          @else
                              No time show
                          @endif
                          </td>
                          <td>
                            @if ($deleted_slider->updated_at)
                              {{ $deleted_slider->updated_at->diffForHumans() }}
                          @else
                              No time show
                          @endif
                          </td>
                          <td>
                            <img src="{{ asset('uploads/slider_photos') }}/{{ $deleted_slider->slider_photo }}" width="100">
                          </td>
                          <td>
                            <div class="btn-group text-white" role="group" aria-label="Basic Example">
                              <a href="{{ url('restore/slider') }}/{{ $deleted_slider->id }}" type="button" class="btn btn-success text-white">Restore</a>
                              <a href="{{ url('harddelete/slider') }}/{{ $deleted_slider->id }}" type="button" class="btn btn-danger text-white">P.Delete</a>
                            </div>
                          </td>
                        </tr>
                        @empty 
                        <tr>
                          <td colspan="50" class="text-center">Data is not here</td>
                        </tr>
                        @endforelse
                        @endif  
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add slider
                </div>
                <div class="card-body">
                  @if (session('success_message'))
                  <div class="alert alert-success">
                      {{ session('success_message') }}
                  </div>
                  @endif
                    <form method="POST" action="{{ url('/add/slider/post') }}" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">slider Title</label> 
                          <input type="text" class="form-control" name="slider_title" placeholder="Enter slider Name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">slider subtitle</label> 
                          <input type="text" class="form-control" name="slider_subtitle" placeholder="Enter slider Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">slider Description</label> 
                          <input type="text" class="form-control" name="slider_description" placeholder="Enter slider Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">slider button text</label> 
                          <input type="text" class="form-control" name="button_text" placeholder="Enter slider Name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">slider button link</label> 
                          <input type="text" class="form-control" name="button_link" placeholder="Enter slider Name">
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">slider Photo</label> 
                          <input type="file" class="form-control" name="slider_image" placeholder="Enter slider Photo">
                        </div>
                        @error('slider_name')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div> 
                        @enderror
                        <button type="submit" class="btn btn-success">Add slider</button>
                      </form>
                </div>
            </div>
        </div>
    </div> 
  </div>  
</div>
@endsection