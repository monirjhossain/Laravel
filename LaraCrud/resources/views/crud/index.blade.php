<!-- index.blade.php -->

@extends('master')
@section('content')
  <div class="container">
      <h2>School Information</h2>
    <table class="table table-striped">
    <thead>
      <tr class="bg-info">
        <th>ID</th>
        <th>Title</th>
        <th>Post</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['post']}}</td>
        <td><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td>
          <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection