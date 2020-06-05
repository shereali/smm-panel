 <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
        </li>
          @if(route('admin'))
        <li>
          <a href="{{ url('admin/category') }}">
            <i class="fa fa-plus"></i>
            <span>Add Category</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a> 
        </li>
          @elseif(!route('admin'))
           <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar"></i> <span>Finance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('payment-gateway') }}"><i class="fa fa-plus"></i> Payment Gateway</a></li>
          </ul>
        </li>
          @endif
          @if(route('admin'))
        <li>
          <a href="{{ url('admin/services/create') }}">
            <i class="fa fa-plus"></i>
            <span>Add Service</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
        </li>
        <li>
          <a href="{{ url('admin/services') }}">
            <i class="fa fa-laptop"></i>
            <span>View Service</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
          {{-- <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
          </ul> --}}
        </li>
        <li>
          <a href="{{ url('admin/order') }}">
            <i class="fa fa-shopping-cart"></i> <span>Order</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
        </li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(route('admin'))
            <li><a href="{{ url('admin/settings/homepage') }}"><i class="fa fa-circle-o"></i> Home Page</a></li>
            <li><a href="{{ url('admin/settings/logo') }}"><i class="fa fa-circle-o"></i>Logo</a></li>
            <li><a href="{{ url('admin/settings/slider') }}"><i class="fa fa-circle-o"></i>Slider</a></li>
            <li><a href="{{ url('admin/settings/general-settings') }}"><i class="fa fa-circle-o"></i>General Settings</a></li>
            <li><a href="{{ url('admin/settings/deposit') }}"><i class="fa fa-circle-o"></i>Deposit Method</a></li>
            @else
            <li><a href="{{ url('profile') }}"><i class="fa fa-circle-o"></i>Profile</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->