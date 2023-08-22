<!-- Sidebar -->
<div class="sidebar">
    <h2>Fruits Valley</h2>
    <ul>
      <li><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('add_fruits') }}">Add Fruits</a></li>
      <li><a href="{{ route('manage_fruits') }}">Manage Fruits</a></li>
      <li><a href="{{ route('trash_manage_fruits') }}">Trash Bin</a></li>
      <li><a href="{{ route('pending.orders') }}">Pending Orders</a></li>
      <li><a href="{{ route('completed.orders') }}">Completed Orders</a></li>
      <li><a href="{{ route('canceled.orders') }}">Canceled Orders</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </div>
  
  <!-- Topbar -->
  <div class="topbar">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-solid fa-screwdriver-wrench"></i></a>
      </li>
    </ul>
  </div>