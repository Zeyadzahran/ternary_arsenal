
    <nav>
        <div class="nav-left">
            <a href="/product">Arsenal</a>
        </div>

        <div class="nav-right">
           <form method="GET" action="{{ route('product.index') }}">
                <input type="text" name="query" placeholder="Search weapons...">
                <button type="submit">Search</button>
            </form>

            @auth
            <a href="/profile">Profile</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Log Out</button>
            </form>
            @endauth

            @guest
            <form method="POST" action="/login">
                @csrf
                <button type="submit">login</button>
            </form>
            <form method="POST" action="/register">
                @csrf
                <button type="submit">Sign up</button>
            </form>
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

