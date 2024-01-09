<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="/dashboard">STUDY</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">US</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">STUDY</li>
            <li class="dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Pages</span></a>
            <ul class="dropdown-menu">
                <li class="{{Request::is('dashboard') ? 'active' : ''}}"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="{{ Request::is('product') ? 'active' : ''}}"><a class="nav-link" href="/products/create">Product</a></li>
            </ul>
            </li>
        </ul>
    </aside>
    </div>