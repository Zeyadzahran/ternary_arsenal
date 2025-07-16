<nav>
    <div class="nav-left">
        <a href="/product" class="logo">
            <span class="logo-icon"></span> 
            <span class="gradient-text">Ternary Arsenal</span>
        </a>
        @auth
            @if (auth()->user()->role === 'ruler')
                <a href="{{ route('users.index') }}">Users</a>
            @endif
        @endauth
    </div>

    <div class="nav-right">
        @auth
            @php
                $pendingCount = \App\Models\Order::where('user_id', Auth::id())->where('status', 'pending')->count();
            @endphp
            <a href="{{ route('cart.show') }}" data-count="{{ $pendingCount }}">
                🛒 Cart
            </a>

            @php
                $user = auth()->user();
            @endphp

            @if ($user->role === 'admin' || $user->role === 'ruler')
                <a href="{{ route('report.form') }}">Reports</a>
            @endif

            <a href="{{ route('request.form') }}">Request Products</a>
        @endauth

        <form method="GET" action="{{ route('product.index') }}">
            <input type="text" name="query" placeholder="Search weapons..." value="{{ request('query') }}">
            <button type="submit">🔍</button>
        </form>

        @auth
            <a href="/profile" class="btn-main">Profile</a>
            <form method="POST" action="/logout">
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
        <a href="{{ route('product.index', ['category' => $category->id]) }}">
            {{ $category->name }}
        </a>
    @endforeach
</div>