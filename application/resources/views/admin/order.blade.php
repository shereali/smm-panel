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
		<div class="col-xs-12">
			@if(session('message'))
			<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>{{ session('message') }}</div>
			@endif
			@if(session('delete'))
			<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>{{ session('delete') }}</div>
			@endif
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">All Service List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Customer Name</th>
								<th>Email</th>
								<th>Bkash No.</th>
								<th>Service Name</th>
								<th>Service Qty.</th>
                                <th>Service Price</th>
                                <th>Payment</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $index => $item)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ userInfo($item->user_id)->name }}</td>
								<td>{{ userInfo($item->user_id)->Email }}</td>
								<td>{{ $item->bkash_no }}</td>
                                <td>{!! serviceInfo($item->service_id)->service_title !!}</td>
                                <td>{{ serviceInfo($item->service_id)->like }}</td>
                                <td>${{ $item->total_price }}</td>
                                <td id="statusTextUpdate{{ $item->id }}">{!! $item->status == 0?'<button class="btn btn-xs btn-warning text-warning">Pending</button>':($item->status == 1?'<button class="btn btn-xs btn-success text-success">Paid</button>':'<button class="btn btn-xs btn-danger text-danger">Cancelled</button>') !!}</td>
								<td id="approval_action{{ $item->id }}">
									<button type="button" onclick="updateStatus('{{ $item->id }}')" class="btn btn-xs {{ $item->status == 1?'btn-default':'btn-success' }}" {{ $item->status == 1?'disabled':'' }}> {{ $item->status == 1?'Approved':"Approve Now" }}</button>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
        <!-- col-xs-12 -->
        <div class="col-md-12">
            {{ $orders->links() }}
        </div>
    </div>
    @csrf
</section>
@endsection
<!-- CONTENT WRAPPER END -->
@section('main-footer')
@endsection

@section('sidebar-control')
@include('layouts.partials.sidebar-control')
@endsection
@push('js')
<script>
    function updateStatus(order_id){
        // console.log(order_id);

        $.ajax({
            type:'POST',
            url:'updateOrderStatus/'+order_id,
            data:{order_id:order_id},
            contentType:false,
            processData:true,
            success:function(data){
                console.log(data.success);
                if(data.success){
                    $('#statusTextUpdate'+order_id).html('');
                    $('#statusTextUpdate'+order_id).html('<button class="btn btn-xs btn-success"> Paid</button>');
                    $('#approval_action'+order_id).html('');
                    $('#approval_action'+order_id).html('<button class="btn btn-xs btn-default" disabled>Approved</button>');
                }
            },
            error:function(responseJSON){

            }
        })
    }
</script>

@endpush
