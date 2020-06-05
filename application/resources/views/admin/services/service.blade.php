@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('assets/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
$('#example1').DataTable()
// $('#example2').DataTable({
// 'paging'      : true,
// 'lengthChange': false,
// 'searching'   : false,
// 'ordering'    : true,
// 'info'        : true,
// 'autoWidth'   : false
// })
})
</script>
@endpush
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
								<th>Service Title</th>
								<th>Category Name</th>
								<th>Photo</th>
								<th>Price</th>
								<th>Like</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

                            @foreach ($services->chunk(4)  as $key => $item)
                                <tr>
                                    @foreach ($item as $data)
                                        <td>{{ $data->service_title }}</td>
                                    @endforeach
                                </tr>
                               <tr><td>page break {{ $key }}</td></tr>
                            @endforeach
						</tbody>
						<tfoot>
			                <tr>
			                  <th>Service Title</th>
			                  <th>Category Name</th>
								<th>Photo</th>
								<th>Price</th>
								<th>Like</th>
								<th>Description</th>
								<th>Action</th>
			                </tr>
		                </tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- col-xs-12 -->
	</div>
	<!-- row -->
</section>
@endsection
@endsection
<!-- CONTENT WRAPPER END -->
@section('main-footer')
@include('layouts.partials.main-footer')
@endsection
@section('sidebar-control')
@include('layouts.partials.sidebar-control')
@endsection
