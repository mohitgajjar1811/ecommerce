<div class="sidebar">

    <h2><i class="fas fa-shopping-cart"></i> <span>E-Shop Admin</span></h2>

    <a href="{{route('admin.dashboard')}}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-th-large"></i> <span>Dashboard</span>
    </a>

    <a href="{{route('admin.product')}}" class="{{ request()->routeIs('admin.product') ? 'active' : '' }}">
        <i class="fas fa-box"></i> <span>Product Data</span>
    </a>

    <a href="{{route('admin.unit')}}" class="{{ request()->routeIs('admin.unit') ? 'active' : '' }}">
        <i class="fas fa-ruler-combined"></i> <span>Unit Data</span>
    </a>

    <a href="{{route('admin.category')}}" class="{{ request()->routeIs('admin.category') ? 'active' : '' }}">
        <i class="fas fa-tags"></i> <span>Category Data</span>
    </a>

    <a href="{{route('admin.order')}}" class="{{ request()->routeIs('admin.order') ? 'active' : '' }}">
        <i class="fas fa-shopping-bag"></i> <span>Order Data</span>
    </a>

    <a href="{{route('admin.cart')}}" class="{{ request()->routeIs('admin.cart') ? 'active' : '' }}">
        <i class="fas fa-shopping-cart"></i> <span>Cart</span>
    </a>

    <a href="{{route('user.show')}}" class="{{ request()->routeIs('user.show') ? 'active' : '' }}">
        <i class="fas fa-users"></i> <span>Users</span>
    </a>

</div>