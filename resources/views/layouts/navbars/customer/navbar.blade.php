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
                <li class="active"><a href="#">
                        <a href="#"> <i class="ni ni-planet nav-icon"></i> Home</a></li>
                <li class="cust-navbar-dropdown">
                    <a href="#">
                        <i class="ni ni-cart nav-icon"></i> Cart
                    </a>

                    <div class="cart-icon">0</div>
                </li>
                <li class="cust-navbar-dropdown">
                    <a href="#">
                        <i class="ni ni-settings nav-icon"></i> Guide
                    </a>
                </li>
                <li><a href="#"><i class="ni ni-user-run nav-icon"></i> Log out</a></li>
            </ul>
        </div>
    </div>
</nav>
