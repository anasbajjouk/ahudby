

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item menu-open">
          <a href="{{ route('admin.index') }}" class="nav-link active">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Users
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All User</p>
              </a>
            </li>

            @if(Auth::user()->isAdmin)

              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>

            @endif

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-music"></i>
            <p>
              Compositions
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('composition.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Compositions</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('composition.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Composition</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Authors
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

             <li class="nav-item">
              <a href="{{ route('author.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Authors</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ route('author.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Author</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-video"></i>
            <p>
              Videos
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('video.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Videos</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('video.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Post A Video</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-images"></i>
            <p>
              Pictures
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('photo.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Photos</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('photo.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Post A Photo</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-history"></i>
            <p>
              Periods
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('period.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Periods</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('period.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create A Period</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-calendar-alt"></i>
            <p>
              Events
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('event.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Events</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('event.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create A Event</p>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
