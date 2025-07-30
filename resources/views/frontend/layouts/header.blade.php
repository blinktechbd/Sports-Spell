<header class="d-flex justify-content-between align-items-center gap-3">
    <a href="{{ route('home') }}" class="text-decoration-none">
        <div class="logo">
            <img class="bg-white px-2" src="{{ asset('/storage/assets/images/logo/' . getSetting()->logo) }}" alt="logo">
        </div>
    </a>

    @php
        $allMenus = topMenus()->get();
        $firstMenus = $allMenus->take(6);
        $moreMenus = $allMenus->slice(6);
        $chunks = $moreMenus->chunk(ceil($moreMenus->count() / 3));
    @endphp
    <div class="menu">
        <ul class="d-flex">
            @foreach ($firstMenus as $menu)
                <li>
                    <a href="{{ route('category-wise-content', $menu->slug) }}">
                        {{ $menu->name }}
                    </a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('category-wise-content', 'today-sports') }}">
                    আজকের খেলা
                </a>
            </li>
            @if ($moreMenus->isNotEmpty())
                <li class="has-submenu">
                    <a href="#">অন্যান্য</a>
                    <ul class="sub-menu shadow">
                        <div class="row p-0 m-0">
                            @foreach ($chunks as $chunk)
                                <div class="col-md-4 p-0 m-0 text-center">
                                    @foreach ($chunk as $menu)
                                        <li>
                                            <a href="{{ route('category-wise-content', $menu->slug) }}">
                                                {{ $menu->name ?? '' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            @endforeach
                            <div class="col-md-4 p-0 m-0 text-center">
                                <li>
                                    <a href="{{ route('photoGalleries') }}">
                                        গ্যালারি
                                    </a>
                                </li>
                            </div>
                        </div>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <div class="acc d-flex gap-4">
        <div class="search" data-bs-toggle="modal" data-bs-target="#searchModal" style="cursor: pointer;">
            <i class="fas fa-search"></i>
        </div>
        @if (Auth::check())
            <div class="login">
                <a href="{{ route('profile') }}"><i class="fas fa-user"></i></a>
            </div>
        @else
            <div class="login">
                <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
            </div>
        @endif

        <div class="localize">
            {{-- <div id="google_translate_element"></div> --}}
            {{-- <a href="">EN</a> --}}
        </div>


    </div>
    <div class="mobile-menu d-flex gap-4">
        <div class="search" data-bs-toggle="modal" data-bs-target="#searchModal" style="cursor: pointer;">
            <i class="fas fa-search text-white"></i>
        </div>
        {{-- <div class="localize">
            <div id="google_translate_element"></div>
            <a href="" class="text-white text-decoration-none">EN</a>
        </div> --}}
        @if (Auth::check())
            <div class="login">
                <a href="{{ route('profile') }}"><i class="fas fa-user text-white"></i></a>
            </div>
        @else
            <div class="login">
                <a href="{{ route('login') }}"><i class="fas fa-user text-white"></i></a>
            </div>
        @endif
        <div class="login">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i
                    class="fas fa-bars text-white"></i></a>
        </div>
        <div class="offcanvas offcanvas-start w-75" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel" style="background: #FEF6F5">
            <div class="offcanvas-header bg-danger m-0 px-4 py-0">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="logo">
                        <img class="bg-white px-2" src="{{ asset('/storage/assets/images/logo/' . getSetting()->logo) }}" alt="logo">
                    </div>
                </a>
                <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="mobile-menu-lists">
                    @foreach ($allMenus as $item)
                        <li style="background: #fdedec"><a class="text-center text-danger px-2" href="{{ route('category-wise-content', $item->slug) }}">{{ $item->name }}</a></li>
                    @endforeach
                    <li style="background: #fdedec"><a class="text-center text-danger px-2" href="{{ route('category-wise-content', 'today-sports') }}">আজকের খেলা</a></li>
                    <li style="background: #fdedec"><a class="text-center text-danger px-2" href="{{ route('photoGalleries') }}">গ্যালারি</a></li>
                    <li class="d-flex justify-content-center gap-3 mt-2">
                        <a  href="{{ getSetting()->social_fb ?? '#' }}" target="_blank"
                            class="d-inline-flex align-items-center text-white justify-content-center
                                        rounded-circle text-danger text-decoration-none"
                            style="width: 30px; height: 30px; background: #dc3545;">
                            <i class="{{ getSetting()->social_fb_icon ?? 'fab fa-facebook-f' }}"></i>
                        </a>
                        <a  href="{{ getSetting()->social_tw ?? '#' }}" target="_blank"
                            class="d-inline-flex align-items-center text-white justify-content-center
                                        rounded-circle text-danger text-decoration-none"
                            style="width: 30px; height: 30px; background: #dc3545;">
                            <i class="{{ getSetting()->social_tw_icon ?? 'fab fa-twitter' }}"></i>
                        </a>
                        <a  href="{{ getSetting()->social_ln ?? '#' }}" target="_blank"
                            class="d-inline-flex align-items-center text-white justify-content-center
                                        rounded-circle text-danger text-decoration-none"
                            style="width: 30px; height: 30px; background: #dc3545;">
                            <i class="{{ getSetting()->social_ln_icon ?? 'fab fa-linkedin' }}"></i>
                        </a>
                        <a  href="{{ getSetting()->social_yt ?? '#' }}" target="_blank"
                            class="d-inline-flex align-items-center text-white justify-content-center
                                        rounded-circle text-danger text-decoration-none"
                            style="width: 30px; height: 30px; background: #dc3545;">
                            <i class="{{ getSetting()->social_yt_icon ?? 'fab fa-youtube' }}"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</header>


