<style>
    .navbar-collapse {
    justify-content: flex-end;
    }

    .navbar {
      background-color: #f8f9fa;
    }

    .navbrand {
      padding-left: 245px;
  }

    .btn-rounded{
        border-radius: 50px;
  }

</style>

<nav class="navbar navbar-expand-lg top-navbar">
  <ul class="navbar-nav">
    <li class="nav-item .navbrand">
      <a href="#" class="nav-link">Brownies and Downies - Admin</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <div class="btn-group nav-link">
      <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span>User</span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu dropdown-menu-right" role="menu">
        <a class="dropdown-item" href="#"><span class="fa fa-user"></span> My Account</a> <!-- Add View User Account -->
        <a class="dropdown-item" href="#"><span class="fas fa-sign-out-alt"></span> Logout</a> <!-- Add Log Out -->
      </div>
    </div>
  </ul>
</nav>