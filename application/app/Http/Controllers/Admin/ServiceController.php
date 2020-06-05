<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category = Category::all();
        return view('admin.services.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'service_title' => 'required|max:80',
            'category_id'   => 'required',
            'price'         => 'required|numeric',
            'like'          => 'required|numeric',
            'file'          => 'required|max:20000', //|mimes:jpg, jpeg, png, gif
        ]);
            $data                = new Service;
            $data->service_title = $request->service_title;
            $data->category_id   = $request->category_id;
            $data->price         = $request->price;
            $data->like          = $request->like;
            $data->description   = $request->description;
            if($request->hasFile('file')){
            $file                = $request->file;      
            $filename            = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/serviceimg', $filename);
            }
            $data->image         = $filename;
            session()->flash('message','Record has been saved successfully!');
            $data->save();
            return redirect('admin/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $category = Category::all();
        $service = Service::find($id);
        return view('admin.services.edit',compact('service','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'service_title' => 'required|max:80',
            'category_id'   => 'required',
            'price'         => 'required|numeric',
            'like'          => 'required|numeric',
            //'file'          => 'required|max:20000', //|mimes:jpg, jpeg, png, gif
        ]);
            $data                = Service::find($id);
            $data->service_title = $request->service_title;
            $data->category_id   = $request->category_id;
            $data->price         = $request->price;
            $data->like          = $request->like;
            $data->description   = $request->description;
            if($request->hasFile('file')){
                // return $data->image;
            if (file_exists(public_path().'serviceimg/'.$data->image)) { 
            unlink(public_path().'serviceimg/'.$data->image);

                }

            $file                = $request->file;      
            $filename            = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/serviceimg', $filename);
            $data->image         = $filename;
            }
            session()->flash('message','Record has been updated successfully!');
            $data->save();
            return redirect('admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::find($id);
        if (file_exists(public_path().'serviceimg/'.$data->image)) { 
            unlink(public_path().'serviceimg/'.$data->image);
        }
        $delete = Service::find($id)->delete();
        session()->flash('delete','Record has been deleted successfully!');
        return redirect()->back();
    }
}
