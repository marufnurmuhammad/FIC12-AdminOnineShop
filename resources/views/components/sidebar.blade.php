<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Online Shop</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item dropdown ">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master User</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('user.index') }}">Data User</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master
                        Category</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('pages.category.index') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('category.index') }}">Data Category</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master
                        Product</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('pages.product.index') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('product.index') }}">Data Product</a>
                    </li>

                </ul>
            </li>
    </aside>
</div>
