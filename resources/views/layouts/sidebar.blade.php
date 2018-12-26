
<ul class="sidebar navbar-nav" style="background: #0e3571e8;">
<li class="nav-item active">
  <a class="nav-link" href="{{ route('home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span>
  </a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="{{ route('renter') }}">
    <i class="fas fa-address-card" aria-hidden="true"></i>
    <span>Renter</span>
  </a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="{{ route('admin.allotment') }}">
    <i class="fa fa-tasks"></i>
    <span>Allotment</span>
  </a>
</li>
<li>
  <li class="nav-item active">
  <a class="nav-link" href="{{ route('payment') }}">
    <i class="fas fa-money-bill"></i>
   <span>Payment</span>
  </a>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: white;">
    <i class="fa fa-cog" aria-hidden="true"></i>
    <span>Configuration</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="{{ route('room.room') }}">
      <i class="fa fa-clone" aria-hidden="true"></i>
      Rooms
    </a>
    <a class="dropdown-item" href="{{ route('admin.user.user') }}">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
      <span>Users</span>
    </a>
        <a class="dropdown-item" href="{{ route('admin.roles.index') }}">
      <i class="fa fa-check" aria-hidden="true"></i>
      <span>Roles</span>
    </a>
    <a class="dropdown-item" href="{{ route('country') }}">
      <i class="fa fa-flag" aria-hidden="true"></i>
      Country
    </a>
  </div>
</li>
</ul>
