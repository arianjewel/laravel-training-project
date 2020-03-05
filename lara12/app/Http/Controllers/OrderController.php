<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manageOrder(){

        $orders = Order::with('customers', 'payment')->get();
        //return $orders;
        return view('admin.order.manage-orders', [
            'orders' => $orders
        ]);
    }

    public function viewOrder($id){

        $orders = Order::with('customers', 'payment', 'shipping')->find($id);

        $productDetails = OrderDetail::where('order_id', $id)->get();

        return view('admin.order.view-order-details',[
            'orders' => $orders,
            'productDetails' => $productDetails
        ]);
    }

    public function viewInvoice($id){
        $orders = Order::with('customers', 'payment', 'shipping')->find($id);

        $productDetails = OrderDetail::where('order_id', $id)->get();
        return view('admin.order.view-invoice',[
            'orders' => $orders,
            'productDetails' => $productDetails
        ]);
    }

    public function downloadInvoice($id){
        $orders = Order::with('customers', 'payment', 'shipping')->find($id);

        $productDetails = OrderDetail::where('order_id', $id)->get();
        $pdf = PDF::loadView('admin.order.view-invoice',[
            'orders' => $orders,
            'productDetails' => $productDetails
        ]);

        return $pdf->stream('invoice.pdf');
    }
}
