<header class="d-flex justify-content-between align-items-center gap-3">
    <div class="logo">
        <img src="{{ asset('/storage/assets/images/logo/logo.png') }}" alt="logo">
    </div>
    {{-- menu --}}
    <div class="menu">
        <ul class="d-flex">
            <li><a href="{{ route('category-wise-content','world-cup') }}">বিশ্বকাপ</a></li>
            <li><a href="{{ route('category-wise-content','cricket') }}">ক্রিকেট</a></li>
            <li><a href="{{ route('category-wise-content','foot-ball') }}">ফুটবল</a></li>
            <li><a href="{{ route('category-wise-content','tanis') }}">টেনিস</a></li>
            <li><a href="{{ route('category-wise-content','basket-ball') }}">বাস্কেটবল</a></li>
            <li><a href="{{ route('category-wise-content','voli-ball') }}">ভলিবল</a></li>
            <li><a href="{{ route('category-wise-content','today-sports') }}">আজকের খেলাধুলা</a></li>
            <li class="has-submenu">
                <a href="{{ route('category-wise-content','more-sports') }}">আরও খেলাধুলা</a>
                <ul class="sub-menu shadow">
                    <div class="row p-0 m-0">
                        <div class="col-md-4 p-0 m-0 text-center">
                            <li><a href="">বিশ্বকাপ</a></li>
                            <li><a href="">ক্রিকেট</a></li>
                            <li><a href="">ফুটবল</a></li>
                            <li><a href="">টেনিস</a></li>
                        </div>
                        <div class="col-md-4 p-0 m-0 text-center">
                            <li><a href="">বাস্কেটবল</a></li>
                            <li><a href="">ভলিবল</a></li>
                            <li><a href="">বিশ্বকাপ</a></li>
                            <li><a href="">আজকের খেলাধুলা</a></li>
                        </div>
                        <div class="col-md-4 p-0 m-0 text-center">
                            <li><a href="">ক্রিকেট</a></li>
                            <li><a href="">ফুটবল</a></li>
                            <li><a href="">টেনিস</a></li>
                            <li><a href="">ভলিবল</a></li>
                        </div>

                    </div>
                </ul>
            </li>
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
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i
                    class="fas fa-bars text-white"></i></a>
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
                    <li><a href="">বিশ্বকাপ</a></li>
                    <li><a href="">ক্রিকেট</a></li>
                    <li><a href="">ফুটবল</a></li>
                    <li><a href="">টেনিস</a></li>
                    <li><a href="">বাস্কেটবল</a></li>
                    <li><a href="">ভলিবল</a></li>
                    <li><a href="">আজকের খেলাধুলা</a></li>
                    <li><a href="">আরও খেলাধুলা</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
