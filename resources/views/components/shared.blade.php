<div class=" dropdown-header noti-title">
    <h6 class="text-overflow m-0">Welcome!</h6>
</div>
<a href="./examples/profile.html" class="dropdown-item">
    <i class="ni ni-single-02"></i>
    <span>My profile</span>
</a>
<a href="https://fb.com/ohmygodvt95" class="dropdown-item">
    <i class="ni ni-support-16"></i>
    <span>Support</span>
</a>
<div class="dropdown-divider"></div>
<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="ni ni-user-run"></i>
    <span>Logout</span>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
