
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Bike Shop')</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('front-assets/assets/favicon.ico') }}">

    <!-- BOOTSTRAP ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- THEME CSS -->
    <link href="{{ asset('front-assets/css/styles.css') }}" rel="stylesheet">

    <!-- INTERNAL CSS -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #5e6060, #bfbaba, #141414);
            font-family: Arial, sans-serif;
            color: #120202;
            margin: 0;
        }

        /* NAVBAR */
        .navbar.navbar-expand-lg {
            background: #030f29 !important;
            padding: 15px 0;
        }

        .navbar .navbar-brand {
            color: white !important;
            font-size: 32px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .navbar .nav-link {
            color: white !important;
            font-size: 15px;
            transition: 0.3s;
        }

        .navbar .nav-link:hover {
            color: #58a6ff !important;
        }

        .navbar .navbar-toggler {
            border: 1px solid white;
        }

        .navbar .navbar-toggler-icon {
            filter: invert(1);
        }

        /* CART */
        .navbar .btn-outline-dark {
            color: white !important;
            border-color: white !important;
            transition: 0.3s;
        }

        .navbar .btn-outline-dark:hover {
            background: #087cff !important;
            border-color: #087cff !important;
        }

        #item-count {
            background: #087cff !important;
            color: white !important;
        }

        /* DROPDOWN */
        .navbar .dropdown-menu {
            border: none;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .navbar .dropdown-item {
            padding: 10px 15px;
        }

        .navbar .dropdown-item:hover {
            background: #e9f1f1;
            color: #087cff;
        }

        /* PRODUCTS */
        .products {
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
            padding: 20px 15px;
        }

        /* PRODUCT CARD */
        .product-card {
            width: 410px;
            height: 410px;
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            background: #1f1818;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            cursor: pointer;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        /* PRODUCT BADGE */
        .product-card .badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #ef4444;
            color: white;
            font-size: 11px;
            font-weight: bold;
            padding: 7px 12px;
            border-radius: 20px;
            z-index: 5;
        }

        /* PRODUCT OVERLAY */
        .product-card .overlay {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 15px;
            padding-top: 90px;
            color: white;
            background: linear-gradient(transparent, rgba(0,0,0,0.95));
        }

        .product-card .overlay h2 {
            font-size: 18px;
            margin-bottom: 5px;
            color: white;
        }

        .product-card .overlay p {
            font-size: 12px;
            color: #ddd;
            margin-bottom: 12px;
        }

        /* PRICE */
        .price {
            color: #58a6ff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .price del {
            color: #ddd;
            font-size: 15px;
        }

        /* BUY BUTTON */
        .buy-btn {
            display: block;
            width: 100%;
            text-align: center;
            background: #087cff;
            color: white;
            text-decoration: none;
            padding: 9px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .buy-btn:hover {
            background: #005dcc;
            color: white;
        }

        /* FOOTER */
        .footer {
            margin-top: 50px;
            background: #030f29;
            color: white;
            padding: 40px 30px 15px;
        }

        .footer-box {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            max-width: 1100px;
            margin: auto;
        }

        .footer-item h3 {
            color: #58a6ff;
            margin-bottom: 15px;
        }

        .footer-item p {
            color: #ddd;
            margin: 8px 0;
        }

        .copyright {
            text-align: center;
            border-top: 1px solid #333;
            margin-top: 30px;
            padding-top: 15px;
            color: #aaa;
            font-size: 13px;
        }

        /* TABLET */
        @media (max-width: 1000px) {
            .product-card {
                width: 380px;
                height: 380px;
            }
        }

        /* MOBILE */
        @media (max-width: 850px) {
            .navbar .navbar-collapse {
                padding-top: 15px;
            }

            .navbar .navbar-nav {
                margin-bottom: 15px;
            }

            .navbar .nav-link {
                padding: 12px 15px;
            }

            .products {
                flex-direction: column;
                align-items: center;
                gap: 18px;
                padding: 15px;
            }

            .product-card {
                width: 100%;
                max-width: 410px;
                height: 410px;
            }

            .footer-box {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 30px;
            }
        }

        /* SMALL PHONE */
        @media (max-width: 500px) {
            .navbar .navbar-brand {
                font-size: 28px;
            }

            .product-card {
                width: 100%;
                height: 390px;
            }

            .product-card .overlay {
                padding: 15px;
                padding-top: 80px;
            }

            .product-card .overlay h2 {
                font-size: 17px;
            }

            .product-card .overlay p {
                font-size: 11px;
            }

            .price {
                font-size: 16px;
            }

            .footer {
                padding: 35px 20px 15px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-4 px-lg-5">

            <a class="navbar-brand" href="{{ route('shop') }}">
                BIKE SHOP
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('shop') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            About
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                            id="navbarDropdown"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Shop
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('shop') }}">
                                    All Products
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <a class="dropdown-item" href="#popular">
                                    Popular Items
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#new-arrivals">
                                    New Arrivals
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- CART BUTTON -->
                <a href="{{ route('item-carts.carts') }}"
                    class="btn btn-outline-dark me-3">

                    <i class="bi-cart-fill me-1"></i>
                    Cart

                    <span class="badge bg-dark text-white ms-1 rounded-pill"
                        id="item-count">0</span>
                </a>

                <!-- LOGIN / REGISTER -->
                @guest

                    <a href="{{ route('login') }}" class="btn text-white mx-2">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-dark">
                        Register
                    </a>

                @else

                    <!-- USER DROPDOWN -->
                    <div class="dropdown mx-3">

                        <a href="#"
                            class="text-decoration-none text-white dropdown-toggle"
                            role="button"
                            id="userDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu">

                            @if(Auth::user()->role == "User")

                                <li>
                                    <a href="#" class="dropdown-item">
                                        Profile
                                    </a>
                                </li>

                            @else

                                <li>
                                    <a href="{{ url('/backend') }}" class="dropdown-item">
                                        Admin Panel
                                    </a>
                                </li>

                            @endif

                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>

                @endguest

            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-box">

            <div class="footer-item" id="about">
                <h3>About Us</h3>
                <p>Welcome to Bike Shop.</p>
                <p>Your trusted online shopping store.</p>
            </div>

            <div class="footer-item">
                <h3>Contact</h3>

                <p>
                    <i class="bi bi-telephone"></i>
                    Phone: 09-987333527
                </p>

                <p>
                    <i class="bi bi-envelope"></i>
                    Email: solomon2512006@gmail.com
                </p>
            </div>

            <div class="footer-item">
                <h3>Opening Hours</h3>
                <p>Monday - Friday</p>
                <p>9:00 AM - 5:00 PM</p>
            </div>

        </div>

        <div class="copyright">
            Copyright &copy; Bike Shop 2026
        </div>

    </footer>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- THEME JS -->
    <script src="{{ asset('front-assets/js/scripts.js') }}"></script>

    <!-- INTERNAL ADD TO CART JS -->
    <script>
    $(document).ready(function () {

        console.log("Add to Cart JS Loaded!");

        // Get Cart Data
        function getCartItems() {
            try {
                let items = JSON.parse(localStorage.getItem("shops") || "[]");
                return Array.isArray(items) ? items : [];
            } catch (error) {
                console.error("Cart data error:", error);
                return [];
            }
        }

        // Update Cart Count
        function count() {
            let items = getCartItems();
            let total = 0;

            $.each(items, function (i, item) {
                total += Number(item.qty) || 0;
            });

            $("#item-count").text(total);
        }

        // Add To Cart
        $(document).on("click", ".addToCart", function (e) {

            e.preventDefault();

            console.log("Add To Cart Button Clicked!");

            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            let price = Number($(this).attr("data-price"));
            let discount = Number($(this).attr("data-discount")) || 0;
            let image = $(this).attr("data-image");

            if (!id || !name || !Number.isFinite(price)) {
                console.error("Product information is missing!");
                alert("Product information is incomplete!");
                return;
            }

            let items = getCartItems();

            let existing = items.find(function (item) {
                return String(item.id) === String(id);
            });

            if (existing) {
                existing.qty = (Number(existing.qty) || 0) + 1;
            } else {
                items.push({
                    id: id,
                    name: name,
                    price: price,
                    discount: discount,
                    image: image,
                    qty: 1
                });
            }

            localStorage.setItem("shops", JSON.stringify(items));

            count();

            console.log("Cart Items:", items);
        });

        // Initial Cart Count
        count();

    });
    </script>

    <!-- PAGE SCRIPTS -->
    @yield('scripts')

</body>
</html>
