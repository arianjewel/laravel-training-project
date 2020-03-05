@extends('front-end.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="offset-2 text-center">Dear {{Session::get('customerName')}}.Please provide your Payment info!</h1>
            <div class="offset-4 col-lg-4">
                <form action="{{route('new-order')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <td>Cash on delivery</td>
                            <td><input type="radio" name="payment_type" value="cash"></td>
                        </tr>
                        <tr>
                            <td>Paypal/Stripe</td>
                            <td><input type="radio" name="payment_type" value="stripe"></td>
                        </tr>
                        <tr>
                            <td>Credit/Debit Card</td>
                            <td><input type="radio" name="payment_type" value="card"></td>
                        </tr>
                        <tr>
                            <td>Bkash</td>
                            <td><input type="radio" name="payment_type" value="bkash"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="btn" class="btn btn-success" value="Confirm Order"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
