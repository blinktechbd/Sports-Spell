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
        <div class="container-fluid bg-danger sticky-header">
            <div class="container">
                <header class="d-flex justify-content-between align-items-center gap-3">
                    <div class="logo">
                        <img src="{{ asset('/storage/assets/images/logo/logo.png') }}" alt="logo">
                    </div>
                    <div class="menu">
                        <ul class="d-flex">
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
            </div>
        </div>

        {{-- header-top-ad --}}
        <div class="container-fluid">
            <div class="container">
                <div class="header-bottom-ad">
                    <img src="{{ asset('/storage/assets/images/ads/header-bottom-ad.jpg') }}" alt="header-bottom-ad">
                </div>
            </div>
        </div>

        {{-- special contents --}}
        <div class="container-fluid">
            <div class="container">
                <div class="row special-content">
                    {{-- left content --}}
                    <div class="col-lg-8">
                        <div class="row">
                            {{--special left content --}}
                            <div class="col-sm-7 col-md-7 col-lg-8">
                                <div class="card border-0 shadow-sm special-left-content">
                                    <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                    <div class="card-body">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                        <h5 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></h5>
                                        <p class="card-text text-muted">
                                           {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                           ,400) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{--special middle content --}}
                            <div class="col-sm-5 col-md-5 col-lg-4">
                                <div class="card border-0 shadow-sm special-middle-content">
                                    <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                    <div class="card-body px-2">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                        <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                        <p class="card-text text-muted">
                                           {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                           ,50) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card border-0 shadow-sm special-middle-content mt-2">
                                    <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                    <div class="card-body px-2">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                        <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                        <p class="card-text text-muted">
                                           {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                           ,50) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="card border-0 shadow-sm special-middle-content mt-2">
                                    <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                    <div class="card-body px-2">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                        <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                        <p class="card-text text-muted">
                                           {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                           ,50) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="card border-0 shadow-sm special-middle-content mt-2">
                                    <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                    <div class="card-body px-2">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                        <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                        <p class="card-text text-muted">
                                           {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                           ,50) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="card border-0 shadow-sm special-middle-content mt-2">
                                    <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                    <div class="card-body px-2">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                        <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                        <p class="card-text text-muted">
                                           {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                           ,50) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- cricket wise contents --}}
                        <div class="category-wise-content">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="category-listing d-flex gap-3">
                                        <div class="top"></div>
                                        <div class="bottom"></div>
                                        <div class="category">
                                            <h5 class=""><a href="" class="text-decoration-none text-danger fw-bold">ক্রিকেট</a></h5>
                                        </div>
                                    </div>
                                    <div class="tab d-flex gap-3">
                                        <a href="" class="text-danger fw-bold">বাংলাদেশ</a>
                                        <a href="" class="text-danger fw-bold">আন্তর্জাতিক</a>
                                        <a href="" class="text-danger fw-bold">লিগ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--special left content --}}
                                <div class="col-sm-7 col-md-7 col-lg-8">
                                    <div class="card border-0 shadow-sm special-left-content">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h5 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></h5>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,400) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{--special middle content --}}
                                <div class="col-sm-5 col-md-5 col-lg-4">
                                    <div class="card border-0 shadow-sm special-middle-content">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,50) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,50) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--football wise contents --}}
                        <div class="category-wise-content">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="category-listing d-flex gap-3">
                                        <div class="top"></div>
                                        <div class="bottom"></div>
                                        <div class="category">
                                            <h5 class=""><a href="" class="text-decoration-none text-danger fw-bold">ফুটবল</a></h5>
                                        </div>
                                    </div>
                                    <div class="tab d-flex gap-3">
                                        <a href="" class="text-danger fw-bold">বাংলাদেশ</a>
                                        <a href="" class="text-danger fw-bold">আন্তর্জাতিক</a>
                                        <a href="" class="text-danger fw-bold">লিগ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--special left content --}}
                                <div class="col-sm-7 col-md-7 col-lg-8">
                                    <div class="card border-0 shadow-sm special-left-content">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h5 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></h5>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,400) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{--special middle content --}}
                                <div class="col-sm-5 col-md-5 col-lg-4">
                                    <div class="card border-0 shadow-sm special-middle-content">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,50) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,50) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--tanis wise contents --}}
                        <div class="category-wise-content">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="category-listing d-flex gap-3">
                                        <div class="top"></div>
                                        <div class="bottom"></div>
                                        <div class="category">
                                            <h5 class=""><a href="" class="text-decoration-none text-danger fw-bold">টেনিস</a></h5>
                                        </div>
                                    </div>
                                    <div class="tab d-flex gap-3">
                                        <a href="" class="text-danger fw-bold">বাংলাদেশ</a>
                                        <a href="" class="text-danger fw-bold">আন্তর্জাতিক</a>
                                        <a href="" class="text-danger fw-bold">লিগ</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{--special left content --}}
                                <div class="col-sm-7 col-md-7 col-lg-8">
                                    <div class="card border-0 shadow-sm special-left-content">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h5 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></h5>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,400) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{--special middle content --}}
                                <div class="col-sm-5 col-md-5 col-lg-4">
                                    <div class="card border-0 shadow-sm special-middle-content">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,50) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"  alt="image-1">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }} | Admin</small>
                                            <h6 class="card-title my-2 text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",25) }}</b></h6>
                                            <p class="card-text text-muted">
                                            {{ Str::limit("মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।"
                                            ,50) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- right content --}}
                    <div class="col-lg-4">
                        {{-- special-content-right-ad --}}
                        <div class="special-content-right-ad">
                            <img src="{{ asset('/storage/assets/images/ads/special-content-right-top-ad.gif') }}" alt="special-content-right-ad">
                        </div>

                        {{-- latest & trand contents --}}
                        <div class="special-content-right">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">সর্বশেষ</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="trand-tab" data-bs-toggle="tab" data-bs-target="#trand" type="button" role="tab" aria-controls="trand" aria-selected="false">সর্বাধিক পঠিত</button>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="trand" role="tabpanel" aria-labelledby="trand-tab">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}" alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="" class="text-decoration-none text-danger"><b>{{ Str::limit("ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা",40) }}</b></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- special-content-right-ad --}}
                        <div class="special-content-right-ad my-2">
                            <img src="{{ asset('/storage/assets/images/ads/special-content-right-bottom1-ad.jpg') }}" alt="special-content-right-bottom1-ad">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('frontend.layouts.scripts')
</body>

</html>
