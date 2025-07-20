<nav class="main-nav">
    <div class="nav-left">
        <a href="/product" class="logo" style="display: flex; align-items: center; gap: 8px;">
            <img src="https://res.cloudinary.com/ddlxp23kv/image/upload/v1752774717/photo_2025-07-17_16-14-56_cyyyzj.jpg"
                alt="Logo"
                style="height: 40px; width: 40px; object-fit: cover; border-radius: 50%;">
            <span class="gradient-text">Ternary Arsenal</span>
        </a>
    </div>

    <div class="nav-right">
        @auth
        <form method="GET" action="{{ route('product.index') }}" class="nav-search-form">
            <input type="text" name="query" placeholder="Search weapons..." value="{{ request('query') }}">
            <button type="submit">🔍</button>
        </form>
            <div class="nav-item-wrapper">
                @php
                    $pendingCount = \App\Models\Order::where('user_id', Auth::id())->where('status', 'pending')->count();
                @endphp
                <a href="{{ route('cart.show') }}" class="nav-btn {{ request()->routeIs('cart.show') ? 'active' : '' }}" data-count="{{ $pendingCount }}">
                    <span class="nav-btn-icon">🛒</span>
                    <span class="nav-btn-text">Cart</span>
                </a>
            </div>

            <div class="nav-item-wrapper">
                <a href="{{ route('request.form') }}" class="nav-btn {{ request()->routeIs('request.form') ? 'active' : '' }}">
                    <span class="nav-btn-icon">✉️</span>
                    <span class="nav-btn-text">Requests</span>
                </a>
            </div>

            @php
                $user = auth()->user();
            @endphp

            @if ($user->role === 'admin' || $user->role === 'ruler')
                <div class="nav-item-wrapper">
                    <a href="{{ route('report.form') }}" class="nav-btn {{ request()->routeIs('report.form') ? 'active' : '' }}">
                        <span class="nav-btn-icon">📊</span>
                        <span class="nav-btn-text">Reports</span>
                    </a>
                </div>
            @endif

            @if ($user->role === 'ruler')
                <div class="nav-item-wrapper">
                    <a href="{{ route('users.index') }}" class="nav-btn {{ request()->routeIs('users.index') ? 'active' : '' }}">
                        <span class="nav-btn-icon">👥</span>
                        <span class="nav-btn-text">Users</span>
                    </a>
                </div>
            @endif

            <a href="/profile" class="btn-main">Profile</a>
            <form method="POST" action="/logout" class="nav-form">
                @csrf
                <button type="submit" class="btn-main">Log Out</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="btn-main">Login</a>
            <a href="{{ route('register') }}" class="btn-main">Sign Up</a>
        @endguest
    </div>
</nav>

<div class="sub-nav">
    @foreach($categories as $category)
        <a href="{{ route('product.index', ['category' => $category->id]) }}" 
           class="sub-nav-link {{ request('category') == $category->id ? 'active' : '' }}">
            {{ $category->name }}
        </a>
    @endforeach
</div>

<style>
   .main-nav {
    position: sticky;
    top: 0;
    z-index: 999;
    background: #100e0e; 
}

    .nav-item-wrapper {
        position: relative;
    }

    .nav-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        color: var(--electric-light);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        background: rgba(151, 71, 255, 0.1);
        border: 1px solid transparent;
    }

    .nav-btn:hover {
        background: rgba(151, 71, 255, 0.2);
        border-color: rgba(151, 71, 255, 0.3);
    }

    .nav-btn.active {
        background: rgba(0, 245, 255, 0.2);
        border-color: rgba(0, 245, 255, 0.3);
        color: var(--electric-blue);
    }

    .nav-btn-icon {
        font-size: 1.1rem;
    }

    .nav-btn-text {
        font-size: 0.95rem;
    }

    [data-count]::after {
        content: attr(data-count);
        position: absolute;
        top: -5px;
        right: -5px;
        background: var(--electric-pink);
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: bold;
        box-shadow: 0 0 0 2px var(--electric-dark);
    }

    /* Active state for sub-nav */
    .sub-nav-link.active {
        color: var(--electric-blue);
    }

    .sub-nav-link.active::after {
        width: 100%;
    }
    .sub-nav {
    position: sticky;
    top: 70px;
    z-index: 998;
    background: #100e0e; 
}

</style>