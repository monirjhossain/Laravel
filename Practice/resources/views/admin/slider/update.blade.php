@extends('layouts.dashboard_master')
@section('content')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ url('add/slider') }}">Add Slider</a>
    <span class="breadcrumb-item active">{{ $slider->slider_title }}</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">
                        Update Slider
                    </div>
                    <div class="card-body ">
                        @if (session('update_status'))
                      <div class="alert alert-success">
                          {{ session('update_status') }}
                      </div>
                      @endif
                        <form method="post" action="{{ url('/update/slider/post') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">slider Title</label> 
                            <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                            <input type="text" class="form-control" name="slider_title" value="{{ $slider->slider_title }}"placeholder="Enter slider Name">
                          </div>
                    
                          <div class="form-group">
                            <label for="exampleInputEmail1">slider subtitle</label> 
                            <input type="text" class="form-control" value="{{ $slider->slider_subtitle }}" name="slider_subtitle" placeholder="Enter slider Name">
                          </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">slider Description</label> 
                              <input type="text" class="form-control" name="slider_description" value="{{ $slider->slider_description }}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">slider button text</label> 
                              <input type="text" class="form-control" name="button_text" value="{{ $slider->button_text }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">slider button link</label> 
                                <input type="text" class="form-control" name="button_link" value="{{ $slider->button_link }}">
                              </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Current slider Photo</label> 
                              <img src="{{ asset('uploads/slider_photos') }}/{{ $slider->slider_image }}" class="form-control"  alt="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">New slider Name</label> 
                              <input type="file" class="form-control" name="new_slider_photo" value="{{ $slider->slider_title }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update slider</button>
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