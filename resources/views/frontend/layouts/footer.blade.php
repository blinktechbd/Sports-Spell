<div class="container">
    <div class="row">
        <div class="col-lg-4 text-center">
            <div class="logo">
                <img class="bg-white px-2" src="{{ asset('/storage/assets/images/logo/'.getSetting()->logo) }}" alt="footer-logo">
            </div>
            <div class="descripton">
                <p class="mt-4 text-justify">{{ getSetting()->site_desc ?? '' }}</p>
            </div>
        </div>
        <div class="col-lg-4 text-center">
            <p class="fs-5 fw-bold">Sports Spell</p>
            <ul class="list-unstyled">
                <li><a href="{{ route('home') }}" class="text-decoration-none text-white">হোম</a></li>
                <li><a href="{{ route('about') }}" class="text-decoration-none text-white">আমাদের সম্পর্কে</a></li>
                <li><a href="{{ route('contact') }}" class="text-decoration-none text-white">যোগাযোগ</a></li>
                <li><a href="{{ route('privacyPolicy') }}" class="text-decoration-none text-white">গোপনীয়তা নীতি</a></li>
                <li><a href="{{ route('termsPolicy') }}" class="text-decoration-none text-white">শর্তবলি ও নীতিমালা </a></li>
            </ul>
        </div>
        <div class="col-lg-4 text-center">
            <p class="fs-5 fw-bold">যোগাযোগ</p>
            <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-white"><i class="fas fa-envelope"></i> {{ getSetting()->email ?? '' }}</a></li>
                <li><a href="#" class="text-decoration-none text-white"><i class="fas fa-map-marker-alt"></i> {{ getSetting()->address ?? '' }}</a></li>
                <li class="d-flex justify-content-center gap-3 mt-2">
                    <a href="{{ getSetting()->social_fb ?? '#' }}" target="_blank"
                        class="d-inline-flex align-items-center justify-content-center
                                    rounded-circle text-danger bg-white text-decoration-none"
                        style="width: 30px; height: 30px;">
                        <i class="{{ getSetting()->social_fb_icon ?? 'fab fa-facebook-f' }}"></i>
                    </a>
                    <a href="{{ getSetting()->social_tw ?? '#' }}" target="_blank"
                        class="d-inline-flex align-items-center justify-content-center
                                    rounded-circle text-danger bg-white text-decoration-none"
                        style="width: 30px; height: 30px;">
                        <i class="{{ getSetting()->social_tw_icon ?? 'fab fa-twitter' }}"></i>
                    </a>
                    <a href="{{ getSetting()->social_ln ?? '#' }}" target="_blank"
                        class="d-inline-flex align-items-center justify-content-center
                                    rounded-circle text-danger bg-white text-decoration-none"
                        style="width: 30px; height: 30px;">
                        <i class="{{ getSetting()->social_ln_icon ?? 'fab fa-linkedin' }}"></i>
                    </a>
                    <a href="{{ getSetting()->social_yt ?? '#' }}" target="_blank"
                        class="d-inline-flex align-items-center justify-content-center
                                    rounded-circle text-danger bg-white text-decoration-none"
                        style="width: 30px; height: 30px;">
                        <i class="{{ getSetting()->social_yt_icon ?? 'fab fa-youtube' }}"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

