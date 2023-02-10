<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.index');
    }

    public function knet()
    {
        return view('front.knet');
    }

    public function success (Request $request ,$order)
    {
//        $order = Order::query()->orderBy('created_at', 'desc')->first();
        return view('front.success',compact('order'));
    }
}
