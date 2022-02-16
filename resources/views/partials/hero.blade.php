<section class="hero is-link is-small">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <nav class="navbar is-primary">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('home') }}">
                        <img src="https://logos-download.com/wp-content/uploads/2016/09/Laravel_logo_wordmark_logotype.png"
                            style="filter: brightness(0) invert(1)" alt="Logo">
                    </a>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">
                        @if (Auth::guest())
                            <a class="navbar-item " href="{{ route('login') }}">Login</a>
                            <a class="navbar-item " href="{{ route('register') }}">Register</a>
                        @else

                            <div class="dropdown">
                                <button type="button" class="btn btn-info" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                    <span class="badge badge-pill badge-danger">
                                        {{ count((array) session('cart')) }}
                                    </span>
                                </button>

                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span
                                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </div>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ((array) session('cart') as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity'];
                                            @endphp
                                        @endforeach
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                        </div>
                                    </div>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <div class="row cart-detail">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                    <img src="{{ $details['photo'] }}" />
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p>{{ $details['name'] }}</p>
                                                    <span class="price text-info"> ${{ $details['price'] }}</span>
                                                    <span
                                                        class="count">Quantity:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">
                                                View all</a>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>
                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                @yield('title')
            </h1>
            <h2 class="subtitle">
                @yield('subtitle')
            </h2>
        </div>
    </div>
</section>
