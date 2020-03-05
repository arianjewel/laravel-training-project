@extends('front-end.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="offset-2 col-lg-8">
                <h1 class="text-center">Dear {{Session::get('customerName')}}<br>Please provide your shipping info!</h1>
                <small class="text-danger">* If you want to change shipping info please edit the form.</small>
                <form action="{{route('new-shipping')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}">
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" class="form-control" name="email_address" value="{{$customer->email_address}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" class="form-control" name="phone_no" value="{{$customer->phone_no}}">
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control" name="address">{{$customer->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn" class="btn btn-lg btn-success">Save Shipping Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection