@extends('layouts.master')
@section('main-sidebar')
@include('layouts.partials.sidebar')
@endsection
<!-- CONTENT WRAPPER START -->
@section('content-wrapper')
@section('content-header')
@endsection
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		@include('admin.services.service-form')
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection
@endsection
<!-- CONTENT WRAPPER END -->
@section('main-footer')
@endsection
@section('sidebar-control')
@include('layouts.partials.sidebar-control')
@endsection