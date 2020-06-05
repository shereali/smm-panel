<?php
function image_path(){
	return 'application/storage/app/public/';
}

function route_name(){
$routeName = \Response::get_name();
return $routeName;
}

function category($id){
 $category = App\Category::find($id);
 return $category->category_name;
}

function categoryIds($item){
	$fb = App\Category::where('category_name',$item)->first();
	return $fb->id;
}


function service($item){
 $service = App\Service::where('category_id', categoryIds($item))->get();
 return $service;

}

function serviceCharge($id){
$charge = App\Service::find($id);
return $charge->price;
}

function serviceInfo($id){
    return $data = App\Service::find($id);
}

function userInfo($id){
    return App\User::find($id);
}


