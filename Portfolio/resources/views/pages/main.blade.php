@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">main</li>
        </ol>
        <div class="row">
            <div class="form-group col-md-3 mt-3">
            <h2>Background Image</h2>
            <img style="height:30vh;" src="{{url($main->bc_img)}}" class="img-thumbnail">
            <input type="file" name="bc_image" id="bc_image"  class="mt-2">
            </div>
            <div class="form-group col-md-4 mt-3">
                <div>
                    <label for="title"><h4>Title</h4></label>
                <input type="text" name="title" class="form-control" id="title" value="{{$main->title}}">
                </div>
                <div class="mb-3">
                    <label for="title"><h4>Sub-Title</h4></label>
                    <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{$main->sub_title}}">
                </div> 
                <div>
                    <label for="resume"><h4>Upload Resume</h4></label>
                    <input type="file" name="resume" id="resume" class="mt-2">
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
                