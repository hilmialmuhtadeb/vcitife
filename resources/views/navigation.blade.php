<nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/logo1.png" alt="" width="120">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active ' : ''}}nav-link ">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}"
                        class="{{ request()->is('products') ? 'active ' : ''}}nav-link ">Produk</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('guide.index') }}"
                        class="{{ request()->is('guide') ? 'active ' : ''}}nav-link ">Panduan</a>
                </li>
                @can('crud')
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                        class="{{ request()->is('admin') ? 'active ' : ''}}nav-link ">Admin</a>
                </li>
                @endcan
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth

                <li class="nav-item">
                    <a class="nav-link" h ref="{{ route('carts.index') }}">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        Keranjang
                        @if (auth()->user()->isCartEmpty)
                        <span class="badge badge-danger badge-pill">
                            {{ auth()->user()->countCart }}
                        </span>
                        @endif
                    </a>
                </li>

                @endauth
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            Keluar
                        </a>

                        <a class="dropdown-item" href="{{ route('carts.history') }}">
                            Riwayat Belanja
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
