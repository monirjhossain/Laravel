@extends('layouts.dashboard_master')
@section('coupon')
    active
@endsection
@section('content')

    <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
      <span class="breadcrumb-item active">Add Coupon</span>
    </nav>
  
    <div class="sl-pagebody">
      <div class="row row-sm">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header bg-success text-white">
                      List Coupon (Active)
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>SL No.</th>
                              <th>Coupon Name</th>
                              <th>Coupon Discount %</th>
                              <th>Validity Status</th>
                              <th>Created At</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @foreach ($coupons as $coupon)
                            <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $coupon->coupon_name }}</td>
                              <td>{{ $coupon->discount_amount }}%</td>
                              <td>
                              @if ($coupon->validity_date >= \Carbon\Carbon::now()->format('Y-m-d'))
                                 <span class="badge badge-success">Available</span>
                                 @else 
                                 <span class="badge badge-danger">Not Available</span>
                              @endif
                              </td>
                              <td>{{ $coupon->created_at }}</td>
                            </tr>
                            @endforeach  
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                      List Coupon
                  </div>
                  <div class="card-body">
                    @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                    @endif
                      <form method="post" action="{{ url('add/coupon/post') }}">  
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Name</label> 
                            <input type="text" class="form-control" name="coupon_name" placeholder="Enter Coupon Name">
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount (%)</label> 
                            <input type="text" class="form-control" name="discount_amount" placeholder="Enter Coupon Discount in (%)">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Validity Till</label> 
                            <input type="date" class="form-control" name="validity_date" placeholder="Enter Validity Date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                          </div>

                          @error('coupon_name')
                              <div class="alert alert-danger">
                                {{ $message }}
                              </div> 
                          @enderror
                          <button type="submit" class="btn btn-success">Add Coupon</button>
                        </form>
                  </div>
              </div>
          </div>
      </div> 
    </div>  
  </div>
@endsection