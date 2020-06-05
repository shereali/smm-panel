 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('content-header-title')
        <small>@yield('content-header-mini-title')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @yield('page-name')</a></li>
        <li class="active">@yield('active-page-name')</li>
      </ol>
    </section>