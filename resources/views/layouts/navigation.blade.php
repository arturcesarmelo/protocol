<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="bi bi-columns-gap"></i> {{__('dashboard.name')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('buildings') ? 'active' : '' }}" href="{{ route('buildings') }}">
            <i class="bi bi-building"></i> {{__('building.name')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('curriers') ? 'active' : '' }}" href="{{ route('curriers') }}">
            <i class="bi bi-send"></i> {{__('currier.name')}}
        </a>
    </li>   
</ul>