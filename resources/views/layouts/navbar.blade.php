<nav>
    <div class="nav-left">
        <a href="/product" class="logo" style="display: flex; align-items: center; gap: 8px;">
            <img src="https://res.cloudinary.com/ddlxp23kv/image/upload/v1752774717/photo_2025-07-17_16-14-56_cyyyzj.jpg"
                alt="Logo"
                style="height: 40px; width: 40px; object-fit: cover; border-radius: 50%;">
            <span class="gradient-text">Ternary Arsenal</span>
        </a>

        @auth
            @if (auth()->user()->role === 'ruler')
                <a href="{{ route('users.index') }}" class="logo ">Users</a>
            @endif
        @endauth
    </div>

    <div class="nav-right">
        @auth
            @php
                $pendingCount = \App\Models\Order::where('user_id', Auth::id())->where('status', 'pending')->count();
            @endphp
            <a href="{{ route('cart.show') }}" class="nav-link" data-count="{{ $pendingCount }}">
                <span>🛒</span> Cart
            </a>

            @php
                $user = auth()->user();
            @endphp

            @if ($user->role === 'admin' || $user->role === 'ruler')
                <a href="{{ route('report.form') }}" class="nav-link">Reports</a>
            @endif

            <a href="{{ route('request.form') }}" class="nav-link">Request Products</a>
        @endauth

        <form method="GET" action="{{ route('product.index') }}" class="nav-search-form">
            <input type="text" name="query" placeholder="Search weapons..." value="{{ request('query') }}">
            <button type="submit">🔍</button>
        </form>

        @auth
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
        <a href="{{ route('product.index', ['category' => $category->id]) }}" class="sub-nav-link">
            {{ $category->name }}
        </a>
    @endforeach
</div>