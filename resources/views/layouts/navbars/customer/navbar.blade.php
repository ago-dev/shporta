<nav class="cust-navbar">
    <div class="cust-container">

        <div class="cust-navbar-header">
            <button class="cust-navbar-toggler" data-toggle="open-cust-navbar1">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="nav-brand-link" href="{{ route('home') }}">
                <div class="brand-container">
                    <div class="shporta-logo"></div>
                    <h1 class="nav-brand">Shporta
                    </h1>
                    <span class="nav-brand-slogan">Love your hunger</span>
                </div>
            </a>
        </div>

        <div class="cust-navbar-menu" id="open-cust-navbar1">
            <ul class="cust-navbar-nav">
                <li>
                        <a href="/welcome">
                            <i class="ni ni-planet nav-icon"></i>
                            Home
                        </a>
                </li>
                <li class="cust-navbar-dropdown">
                    <a href="/cart">
                        <i class="ni ni-cart nav-icon"></i> Cart
                    </a>

                    <div class="cart-icon">{{ Cart::getTotalQuantity()}}</div>
                </li>
                <li class="cust-navbar-dropdown">
                    <a href="#">
                        <i class="ni ni-settings nav-icon"></i> Guide
                    </a>
                </li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run nav-icon"></i> Log out</a></li>
            </ul>
        </div>
    </div>
</nav>
