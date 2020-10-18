@section('sidebar')

<ul class="navbar-nav bg-gradient-{{ config('surveillance-ui.sidebar_color') }} sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('surveillance-ui.dashboard.index') }}">
        <div class="sidebar-brand-icon">
            <img class="ml-2" width="50px" height="50px" src="{{ asset('surveillance-ui/images/logo.png') }}" />
        </div>
        <div class="sidebar-brand-text mx-3">{!! config('surveillance-ui.package_name') !!}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('surveillance-ui.dashboard.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('surveillance-ui.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('surveillance-ui::app.dashboard.sidebar_title') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('surveillance-ui.manager.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('surveillance-ui.manager.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>{{ __('surveillance-ui::app.manager.sidebar_title') }}</span></a>
    </li>

    <li class="nav-item {{ Route::is('surveillance-ui.logs.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('surveillance-ui.logs.index') }}">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>{{ __('surveillance-ui::app.logs.sidebar_title') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

@show