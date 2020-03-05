@extends('front-end.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Thank you Mr. {{Session::get('customerName')}} for your order. We will contact you soon to confirm your order.</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection