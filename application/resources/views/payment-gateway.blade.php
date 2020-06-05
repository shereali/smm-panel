@extends('layouts.master')
@section('main-sidebar')
@include('layouts.partials.sidebar')
@endsection
<!-- CONTENT WRAPPER START -->
@section('content-wrapper')
@section('content-header')
@endsection
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-4">
			<div class="panel">
			<div class="panel-heading"><h3 class="title">PayPal</h3></div>
			<div class="panel-body">
				
			</div>
			<div class="panel-footer">
				<a href="{{ url('paypal-payment') }}" class="btn btn-primary btn-md form-control"><i class="fa fa-money"></i> DEPOSIT WITH PAYPAL</a>
			</div>
		</div>
	</div>
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		
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