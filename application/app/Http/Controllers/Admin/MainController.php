<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use App\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;


class MainController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('admin.home');
    }


    public function view_service(){
    	$services = Service::all();
    	return view('admin.view-service', compact('services'));
    }

    public function category(){
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $this->validate($request,[
            'category_name' => 'required|unique:categories'
        ]);
        $data = new Category;
        $data->category_name = $request->category_name;
        $data->save();
        return response()->json(['data'=>'success']);
    }

    public function edit_category(Request $request){
        $data = Category::find($request->id);
        return response()->json(['data' => $data]);
    }

    public function delete_category(Request $request){
        $delete = Category::find($request->id)->delete();
        return response()->json(['data' => 'success']);
    }

    public function update_category(Request $request){

        $this->validate($request,[
            'category_name' => 'required'
        ]);
        $data = Category::find($request->edit_id);
        $data->category_name = $request->category_name;
        $data->save();
        return response()->json(['data'=>'success']);
    }

    public function order(){
        $data['orders'] = Order::paginate(10);
        return view('admin.order', $data);
    }

    public function updateOrderStatus(Request $request){
        // return $request->order_id;
       $data =  Order::where('id', $request->order_id)->update(['status' => 1]);
        if ($data) {
            return response()->json(['success' => 'This order is approved!']);
        }
    }
}
