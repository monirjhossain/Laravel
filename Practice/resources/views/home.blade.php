@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-secondary">
                <div class="card-header"><h3>{{ __('Dashboard') }}</h3></div>

                <div class="card-body bg-success">
                    <h1>Welcome {{ auth::user()->name }}</h1>
                    <h2>Email: {{ auth::user()->email }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info"> 
                    <h2>Total user: {{ $total_users }}</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>   
                            <th scope="col">Create time</th>   
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $serial = 1;
                            @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><li>{{ $user->created_at->format('d-M-y  h:i:s A') }}</li>
                                <li>{{ $user->created_at->diffForHumans() }}</li>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>  
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
