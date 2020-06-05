@extends('layouts.master')
@section('main-sidebar')
@include('layouts.partials.sidebar')
@endsection
<!-- CONTENT WRAPPER START -->
@section('service_title', $service->service_title)
@section('category', 'category')
@section('price', $service->price)
@section('like', $service->like)
@section('description', $service->description)
@section('file', $service->image)
@section('method', method_field('PUT'))

@section('content-wrapper')
@section('content')
<section class="content">
	<div class="row">
		@include('admin.services.service-form')	
	</div>
</section>
@endsection
@endsection
<!-- CONTENT WRAPPER END -->
@section('main-footer')
@endsection

@section('sidebar-control')
@include('layouts.partials.sidebar-control')
@endsection