<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Service::all();

        $data['orders'] = Order::paginate(20);
        return view('home', $data);
    }
}
