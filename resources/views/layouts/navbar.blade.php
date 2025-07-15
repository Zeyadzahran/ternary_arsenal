
    <nav>
        <div class="nav-left">
            <a href="/product">Arsenal</a>
            @auth
                @if (auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                    </li>
                @endif
            @endauth

        </div>

        <div class="nav-right">
                @php
                    $pendingCount = \App\Models\Order::where('user_id', Auth::id())->where('status', 'pending')->count();
                @endphp

                <a href="{{ route('cart.show') }}">
                    🛒 Cart ({{ $pendingCount }})
                </a>


           <form method="GET" action="{{ route('product.index') }}">
                <input type="text" name="query" placeholder="Search weapons...">
                <button type="submit">Search</button>
            </form>

            @auth
            <a href="/profile" class="btn-main">Profile</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Log Out</button>
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

