@push('css')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
// CKEDITOR.replace('editor1')
//bootstrap WYSIHTML5 - text editor
$('.textarea').wysihtml5()
});

</script>
@endpush
<form role="form" action="{{ request('service')?route('services.update', $service->id) : route('services.store') }}" method="POST" enctype="multipart/form-data">
	@yield('method')
			@csrf
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Add New Service</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					
					<div class="box-body">
						<div class="form-group {{ $errors->has('service_title')?'is-invalid':'' }}">
							<label for="service_title">Service Title</label>
							<input type="text" id="service_title" name="service_title" class="form-control" value="{{ old('service_title') }}@yield('service_title')" id="service_title" placeholder="Service Title">
							@if($errors->has('service_title'))
							<div>
								<strong class="text-danger">{{ $errors->first('service_title') }}</strong>
							</div>
							@endif
						</div>
						<div class="form-group {{ $errors->has('category_id')?'is-invalid':'' }}">
							<label for="category_id">Service Category</label>
							<select name="category_id" id="category_id" class="form-control">
								<option>Select Category....</option>
								@foreach($category as $c)
								<option @hasSection('category')  {{ $service->category_id== $c->id?'selected=selected':'' }} @endif value="{{ $c->id }}">{{ $c->category_name }}</option>
								@endforeach
							</select>
							@if($errors->has('category_id'))
							<div>
								<strong class="text-danger">{{ $errors->first('category_id') }}</strong>
							</div>
							@endif
						</div>
						<div class="col-md-6 pull-left form-group {{ $errors->has('price')?'is-invalid':'' }}">
							<label for="price">Price</label>
							<div class="input-group  ">
							<span class="input-group-addon">$</span>
							<input type="text" name="price" class="form-control" value="{{ old('price') }}@yield('price')" placeholder="Price">
							{{-- <span class="input-group-addon">.00</span> --}}
							
						</div>
							@if($errors->has('price'))
							<strong class="text-danger">{{ $errors->first('price') }}</strong>
							@endif
						</div>
						<div class="col-md-6 pull-right form-group {{ $errors->has('like')?'is-invalid':'' }}">
							<label for="like">Like</label>
							<div class="input-group">
							<span class="input-group-addon">Like</span>
							<input type="text" name="like" class="form-control" value="{{ old('like') }}@yield('like')" placeholder="eg. 1000 likes">
							{{-- <span class="input-group-addon"></span> --}}
						</div>
						@if($errors->has('like'))
							<strong class="text-danger">{{ $errors->first('like') }}</strong>
							@endif
						</div>
						
						<div class="form-group{{ $errors->has('file')?'is-invalid':'' }}">
							<label for="file">Choose file</label>

							<input type="file" name="file" id="file">
							@if($errors->has('file'))
							<strong class="text-danger">{{ $errors->first('file') }}</strong>
							@endif
							<div class=" media">
								<img class="img-responsive media-object" src="{{ asset(image_path().'serviceimg') }}/@yield('file')" alt="">
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary pull-right">{{ request('service')?'Update':'Submit' }}</button>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!-- col-6 -->
			<div class="col-md-6">
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
						<textarea class="textarea form-control{{ $errors->has('description')?'is-invalid':'' }}"  name="description" rows="7" cols="80" placeholder="Write description">{{ old('description') }} @yield('description')</textarea>
						@if($errors->has('description'))
						<strong class="text-danger">{{ $errors->first('description') }}</strong>
						@endif
					</div>
				</div>
				<!-- /.box -->
			</div>
</form>