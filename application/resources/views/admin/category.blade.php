@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style>
#update-category, #cancel{
 display: none;
}
</style>
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
});
$('#add-category').on('click', function(){
$.ajax({
url: '{{ url('admin/add_category') }}',
data: new FormData($('#category-form')[0]),
processData: false,
contentType: false,
type: 'POST',
success: function(response){
	$('#category_name').val("");
	if(response.data == 'success'){
		$('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Succes!</h4>Record saved successfully!</div>');
			$("#message").show().fadeOut(3000).queue(function(n) {
			$(this).hide(); n();
			});
			// $('#example1').load(location.href+' #example1');
			location.href ='{{ url('admin/category') }}'
	}
	
},
error: function(data) {
    var errors = data.responseJSON;
    var errorsHtml = '';
    $.each(errors.errors, function( key, value ) {
      errorsHtml += '<strong class="text-danger">' + value[0] + '</strong>';
    });
    $('#category_name_errors').html(errorsHtml);
    console.log(errorsHtml);
},
});
});

function edit_category(i){
	$('#cancel').show();
	$.post('edit_category',{'id':i, '_token':$('input[name=_token]').val()},function(response){
		$('#update-category').show();
		$('#add-category').hide();
		$('#category_name').val(response.data.category_name);
		$('#edit_id').val(response.data.id);
		console.log(response.data.category_name);
	});
}


$('#update-category').on('click',function(){
	$.ajax({
url: '{{ url('admin/update_category') }}',
data: new FormData($('#category-form')[0]),
processData: false,
contentType: false,
type: 'POST',
success: function(response){
	// $('#category_name').val("");
	if(response.data == 'success'){
		$('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Updated!</h4>Record has been updated successfully!</div>');
			$("#message").show().fadeOut(3000).queue(function(n) {
			$(this).hide(); n();
			});
			$('#load_name'+i).load(location.href+' #load_name'+i);
	}
	
},
error: function(data) {
    var errors = data.responseJSON;
    var errorsHtml = '';
    $.each(errors.errors, function( key, value ) {
      errorsHtml += '<strong class="text-danger">' + value[0] + '</strong>';
    });
    $('#category_name_errors').html(errorsHtml);
    console.log(errorsHtml);
},
});
});

function delete_category(i){
$.post('delete_category',{'id':i, '_token':$('input[name=_token]').val()},function(response){
if(response.data == 'success'){
		$('#delete_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Deleted!</h4>Record has been deleted!</div>');
			$("#delete_message").show().fadeOut(3000).queue(function(n) {
			$(this).hide(); n();
			});
			location.href='{{ url('admin/category') }}';
	}
});
}
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
		<div class="col-md-6">
			<div id="message"></div>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add New Service</h3>
					<a href="{{ url('admin/category') }}" id="cancel" class="btn btn-danger pull-right">X</a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				
				<div class="box-body">
					<form role="form" action="" id="category-form" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="edit_id" id="edit_id" ">
						<div class="form-group {{ $errors->has('category_name')?'is-invalid':'' }}">
							<label for="category_name">Service Title</label>
							<input type="text" id="category_name" name="category_name" class="form-control" value="{{ old('category_name') }}@yield('category_name')" id="category_name" placeholder="Service Title">
							<div id="category_name_errors"></div>
						</div>
					</form>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="button" id="add-category" class="btn btn-primary pull-right">Submit</button>
					<button type="button" id="update-category" class="btn btn-primary pull-right">Update</button>
				</div>
			</div>
			<!-- /.box -->
		</div>
		<!-- col-6 -->
		<div class="col-md-6">
			<div id="delete_message"></div>
			<div class="box box-info">
				<div class="box-header">
					{{--  <h3 class="box-title">CK Editor
					<small>Advanced and full of features</small>
					</h3> --}}
					<!-- tools box -->
					{{-- <div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
						title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
						title="Remove">
						<i class="fa fa-times"></i></button>
					</div> --}}
					<!-- /. tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body pad">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Category Name</th>
								<th>Creation Date</th>
								<th>Update Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $d)
							<tr id="load-tr">
								<td>{{ $d->id }}</td>
								<td id="load_name{{ $d->id }}">{{ $d->category_name }}</td>
								<td>{{ $d->created_at->diffForHumans()}}</td>
								<td>{{ $d->updated_at->diffForHumans()}}</td>
								<td>
									<a href="#" onclick="edit_category('{{ $d->id }}')" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
									<a href="#" onclick="delete_category('{{ $d->id }}')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
						<tr>
							<th>#</th>
								<th>Category Name</th>
								<th>Creation Date</th>
								<th>Update Date</th>
								<th>Action</th>
						</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<!-- /.box -->
		</div>
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