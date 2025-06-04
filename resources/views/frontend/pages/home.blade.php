<!DOCTYPE html>
<html lang="bn">
@push('title')
    Home |
@endpush
@push('meta')
    <meta name="description" content="A short description of your website for SEO and social media.">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="My Awesome Website">
    <meta property="og:description" content="A short description of your website for SEO and social media.">
    <meta property="og:image" content="{{ asset('/storage/assets/images/logo/og-logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="My Awesome Website">
    <meta name="twitter:description" content="A short description of your website for SEO and social media.">
    <meta name="twitter:image" content="{{ asset('/storage/assets/images/logo/og-logo.png') }}">
@endpush

<head>
    @include('frontend.layouts.head')
</head>

<body>

    <div class="wrapper">
        {{-- header --}}
        <div class="container-fluid bg-danger">
            <div class="container">
                <header class="d-flex justify-content-between align-items-center gap-3">
                    <div class="logo">
                        <img src="{{ asset('/storage/assets/images/logo/logo.png') }}" alt="logo">
                    </div>
                    <div class="menu">
                        <ul class="d-flex">
                            <li><a href="">Home</a></li>
                            <li><a href="">Service</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Home</a></li>
                            <li><a href="">Service</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="acc d-flex gap-4">
                        <div class="search">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="login">
                            <a href=""><i class="fas fa-user"></i></a>
                        </div>
                        <div class="localize">
                            <a href="">EN</a>
                        </div>
                    </div>
                    <div class="mobile-menu d-flex gap-4">
                        <div class="search">
                            <i class="fas fa-search text-white"></i>
                        </div>
                        <div class="localize">
                            <a href="" class="text-white text-decoration-none">EN</a>
                        </div>
                        <div class="login">
                            <a href=""><i class="fas fa-user text-white"></i></a>
                        </div>
                        <div class="login">
                            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                aria-controls="offcanvasExample"><i class="fas fa-bars text-white"></i></a>
                        </div>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <div class="logo">
                                    <img src="{{ asset('/storage/assets/images/logo/logo.png') }}" alt="logo">
                                </div>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="mobile-menu-lists">
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Service</a></li>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Contact Us</a></li>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Service</a></li>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>

        {{-- header-top-ad --}}
        <div class="container-fluid">
            <div class="container bg-danger">

            </div>
        </div>
    </div>


    @include('frontend.layouts.scripts')
</body>

</html>
