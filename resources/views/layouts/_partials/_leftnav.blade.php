<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ $user->name ?? "" }}</p>
        <!-- Status -->
{{--        <a href="#"><i class="fa fa-circle  {{ $user->isOnline() ? 'text-success' : 'text-danger' }}"></i> {{ $user->isOnline() ? 'Online' : 'Offline' }}</a>--}}
      </div>
    </div>


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">

      <li ><a href="{{ route('project.index') }}" id="leftNavigationSearchBtn"><i class="fa fa-history"></i> <span>Project Management</span></a></li>

      <li class="treeview">
        <a href="#"><i class="fa fa-gears"></i> <span>Settings</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('user.index') }}"><i class="fa fa-file-excel-o"></i>User Management</a></li>
            <li><a href="{{ route('role.index') }}"><i class="fa fa-file-excel-o"></i>Role & Permission Management</a></li>

        </ul>
      </li>


    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
