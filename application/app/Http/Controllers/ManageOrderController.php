<?php

namespace App\Http\Controllers;

use App\Order;
use App\Service;
use Illuminate\Http\Request;
use Auth;

class ManageOrderController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->success = 'Your order has been created! Please wait till review your payment!<a href="'.route('admin').'"> Visit Your Admin</a>';
        $this->errors = 'Invalid Input! Never try again if you make this truble!';

    }

    public function getData($request){
        $request->validate([
            'bkash_no' => 'required|min:11'
        ]);

        $serviceData = Service::find($request->service_id);
        if($serviceData->price != $request->charge){
             $message = ['errors' => $this->errors];
        } else {
            $data              = new Order;
            $data->user_id     = Auth::user()->id;
            $data->service_id  = $request->service_id;
            $data->total_price = $request->charge;
            $data->bkash_no    = $request->bkash_no;
            $data->status      = 0;
            $data->save();
             $message = ['success' => $this->success ];
        }
        return $message;
    }

    public function storeFacebookData(Request $request){
        // return $request->all();

       $data = self::getData($request);
       return response()->json($data);

    }

    public function storeTwitterData(Request $request){
        // return $request->all();
        $data = self::getData($request);
        return response()->json($data);
    }

    public function storeYoutubeData(Request $request){
        $data = self::getData($request);
        return response()->json($data);
    }

    public function storeInstagramData(Request $request){
        $data = self::getData($request);
        return response()->json($data);
    }
}
