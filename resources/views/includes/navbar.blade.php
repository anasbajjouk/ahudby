
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Anthology Of Czech Music</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('authorUserIndex') }}">Authors/Music</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('photoUserIndex') }}">Photos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('periodUserIndex') }}">Texts</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('videoUserIndex') }}">Videos</a>
        </li>

        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" 
                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('admin.index') }}">Admin Dashboard</a>
              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
          </li>
        @endauth



        <li class="nav-item">
          <form class="" method="" action="">
            <div class="col-md-12 ">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>