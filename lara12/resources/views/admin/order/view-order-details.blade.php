@extends('admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Info For this Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order No.</th>
                                <td>{{$orders->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$orders->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$orders->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$orders->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Customer Info For this Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{$orders->customers->first_name.' '.$orders->customers->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone No.</th>
                                <td>{{$orders->customers->phone_no}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{$orders->customers->email_address}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$orders->customers->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Shipping Info For this Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{$orders->shipping->full_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone No.</th>
                                <td>{{$orders->shipping->phone_no}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{$orders->shipping->email_address}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$orders->shipping->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Payment Info For this Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Payment Type</th>
                                <td>{{$orders->payment->payment_type}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$orders->payment->payment_status}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Product Details For this Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl No.</th>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            @php($i=1)
                            @foreach($productDetails as $productDetail)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$productDetail->product_id}}</td>
                                <td>{{$productDetail->product_name}}</td>
                                <td>{{$productDetail->product_price}}</td>
                                <td>{{$productDetail->product_quantity}}</td>
                                <td>{{$productDetail->product_price * $productDetail->product_quantity}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection