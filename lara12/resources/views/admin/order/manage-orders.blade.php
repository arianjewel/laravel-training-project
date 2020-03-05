@extends('admin.master')

@section('body')
    <div class="container">
        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Customer Name</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->customers->first_name.' '.$order->customers->last_name}}</td>
                                        <td>{{$order->order_total}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->payment->payment_type}}</td>
                                        <td>{{$order->payment->payment_status}}</td>
                                        <td>
                                            <a href="{{route('view-order-details', ['id'=>$order->id])}}" class="btn btn-sm btn-info">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                            <a href="{{route('view-order-invoice', ['id'=>$order->id])}}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
