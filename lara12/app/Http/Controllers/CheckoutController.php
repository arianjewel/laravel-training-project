<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Mail;
use Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-register');
    }

    public function signUp(Request $request){
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->phone_no = $request->phone_no;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $data = $customer->toArray();
        Mail::send('front-end.mails.welcome-mail',$data,function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Welcome to Eiser Shop');
        });

        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        return redirect('/checkout/shipping');
    }

    public function logIn(Request $request){
        $customer = Customer::where('email_address', $request->email_address)->first();

//        return $customer;
        if (password_verify($request->password, $customer->password)){
//            echo 'Password Valid';
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name.' '.$customer->last_name);

            return redirect('/checkout/shipping');
        }else{
            //echo 'Invalid Password';
            return redirect('/checkout')->with('message', 'Invalid Password');
        }
    }

    public function logOut(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }

    public function shipping(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.checkout-shipping',[
            'customer' => $customer
        ]);
    }

    public function saveShipping(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_no = $request->phone_no;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }

    public function newOrder(Request $request){
        $paymentType = $request->payment_type;
        if($paymentType == 'cash'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct){
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();

            return redirect('/checkout/payment/confirm');

        } elseif ($paymentType == 'stripe'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct){
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();

            return redirect('/checkout/payment/stripe');

        } elseif ($paymentType == 'card'){

        } elseif($paymentType == 'bkash'){

        }
    }

    public function confirmPayment(){
        return view('front-end.checkout.confirm-payment');
    }


}













