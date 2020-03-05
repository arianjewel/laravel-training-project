@extends('front-end.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="text-center">If you a new member here, <br>Please register to checkout!</h1>
                <form action="{{route('checkout-sign-up')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" class="form-control" name="email_address">
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" class="form-control" name="phone_no">
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn" class="btn btn-lg btn-success">Register</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <h1 class="text-center">Already a member? <br> Please Login Here!</h1>
                <h4 class="text-danger">{{Session::get('message')}}</h4>
                <form action="{{route('checkout-login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" class="form-control" name="email_address">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn" class="btn btn-lg btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection