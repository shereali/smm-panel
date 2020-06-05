@include('layouts.partials.header')
<div class="wrapper">
<header class="main-header">
	@section('main-header')
 		 <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>MM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SMM </b>Panel</span>
    </a>
	
	@show
    @include('layouts.partials.navigation')
</header>
<aside class="main-sidebar">
	@section('main-sidebar')
		
	@show	
</aside>
<div class="content-wrapper">

		@section('content-header')
				
		@show
			
		@section('content')
				
		@show

</div>
@section('main-footer')
@show
@section('control-sidebar')
@show
</div>
@include('layouts.partials.footer')