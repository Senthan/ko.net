<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="\" class="logo" style="">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>P</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Project</b> Management</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title='Menu'>
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="nav-heading-left navbar-custom-menu" style="">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <p class="nav-heading-toggle changeFontSizeForMobile" title="Current Page">
            <i class="fa fa-flag-o pageFlagIcon"></i> @yield('heading') <span class="shortenCurrentPageHeadingForMobile">@yield('headingExtra')</span>
          </p>
        </li>

      </ul>
    </div>


    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">


      <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ $user->user_name ?? "" }}
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

              <p>
                         {{--<small>Member since {{ $user->created_at ? carbon()->parse($user->created_at)->format('jS \o\f F, Y') : ''  }}</small>--}}
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                {{--<a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>--}}
              </div>
              <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat sign-out">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>
