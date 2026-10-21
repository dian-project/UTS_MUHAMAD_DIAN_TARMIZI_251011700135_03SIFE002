
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FurniSpace - Furniture Minimalis')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <style>
        :root {
            --primary: #254f3f;
            --primary-dark: #19392d;
            --cream: #f7f5ef;
            --text: #29352f;
            --muted: #6c757d;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #ffffff;
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        
.navbar {
    background-color: var(--primary-dark) !important;
    padding: 15px 0;
    position: sticky;
    top: 0;
    z-index: 1030;
}


        .navbar-brand {
            color: #ffffff !important;
            font-size: 25px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .navbar .nav-link {
            color: #e4ebe6;
            margin-left: 18px;
            transition: color .2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #ffffff;
        }

        .btn-brand {
            background: var(--primary);
            color: #ffffff;
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 10px 18px;
        }

        .btn-brand:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #ffffff;
        }

        .section-heading {
            color: var(--primary-dark);
            font-weight: 700;
        }

        .search-panel {
            background: var(--cream);
            padding: 24px;
            border-radius: 14px;
        }

        .search-panel .form-control,
        .search-panel .form-select {
            min-height: 45px;
            border-radius: 8px;
            border-color: #dce2dd;
        }

        .search-panel .form-control:focus,
        .search-panel .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 .2rem rgba(37, 79, 63, .12);
        }

        .furniture-card {
            height: 100%;
            border: 1px solid #e8ece8;
            border-radius: 13px;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
        }

        .furniture-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .furniture-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: var(--cream);
        }

        .furniture-card .card-body {
            padding: 18px;
        }

        .furniture-category {
            color: var(--primary);
            background: #eaf1ec;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
        }

        .furniture-price {
            color: var(--primary);
            font-weight: 700;
            font-size: 18px;
        }

        /* Pagination custom */
        .pagination-buttons .pagination {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0;
        }

        .pagination-buttons .page-link {
            color: var(--primary);
            border-radius: 7px;
            padding: 8px 13px;
            border: 1px solid #e1e5e2;
        }

        .pagination-buttons .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
        }

        .pagination-buttons .page-item.disabled .page-link {
            color: #adb5bd;
            background: #f8f9fa;
        }

        .pagination-info {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            text-align: center;
        }

        .site-footer {
            background: var(--primary-dark);
            color: #ffffff;
            padding: 30px 0;
            margin-top: 50px;
        }

        .site-footer p {
            margin: 0;
            color: #dce6df;
        }

        @media (max-width: 767px) {
            .navbar .nav-link {
                margin-left: 0;
                padding: 10px 0;
            }

            .furniture-image {
                height: 210px;
            }

            .search-panel {
                padding: 18px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            FurniSpace<span style="color: #c9d8c5;">.</span>
        </a>

        <button
            class="navbar-toggler bg-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Buka navigasi"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('furnitures.*') ? 'active' : '' }}"
                       href="{{ route('furnitures.index') }}">
                        Katalog
                    </a>
                </li>

                
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
       href="{{ route('about') }}">
        Tentang Kami
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
       href="{{ route('contact') }}">
        Kontak
    </a>
</li>


            </ul>
        </div>

    </div>
</nav>


    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container text-center">
            <p class="fw-bold mb-2">FurniSpace</p>
            <p>Furniture minimalis untuk hunian yang nyaman.</p>
            <p class="mt-3 small">
                &copy; {{ date('Y') }} FurniSpace. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
