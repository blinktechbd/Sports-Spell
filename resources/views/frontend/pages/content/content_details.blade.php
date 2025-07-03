@extends('frontend.layouts.app')
@push('title')
    Content Details |
@endpush
@push('appendCss')
@endpush
@push('meta')
    <meta name="description" content="A short description of your website for SEO and social media.">
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="My Awesome Website" />
    <meta property="og:description" content="A brief description of your page that will appear in shares." />
    <meta property="og:image" content="{{ asset('/storage/assets/images/logo/og-logo.png') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Sports" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Your Page Title Here" />
    <meta name="twitter:description" content="A brief description of your page." />
    <meta name="twitter:image" content="{{ asset('/storage/assets/images/logo/og-logo.png') }}" />
    <meta name="twitter:url" content="{{ url('/') }}" />
    <meta name="twitter:site" content="@Sports" />
    <meta name="twitter:creator" content="@Sports" />
@endpush
@section('content')
    {{-- header-top-ad --}}
    <div class="container-fluid">
        <div class="container">
            <div class="header-bottom-ad">
                <img src="{{ asset('/storage/assets/images/ads/header-bottom-ad.jpg') }}" alt="header-bottom-ad">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row my-3 breadcumb">
                <div class="col-lg-12">
                    <a class="text-danger"><b>Cricket &#187; Bangladesh</b></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row content-details">
                {{-- right content --}}
                <div class="col-lg-8">
                    <div class="card border-0  special-left-content mb-5 ">
                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                            alt="image-1">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-10">
                                <div class="card-body shadow-sm">
                                    <div class="d-flex justify-content-between align-items-center my-4">
                                        <div>
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                                | Admin</small>
                                        </div>
                                        <div class="sharethis-inline-share-buttons z-0"></div>
                                    </div>

                                    <h4 class="card-title my-2 text-danger">
                                        <b>{{ 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা' }}</b>
                                    </h4>

                                    <p class="card-text text-muted my-3">
                                        {{ 'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে।

                                                                                তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা।

                                                                                তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ। মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে।

                                                                                ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ। মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের।

                                                                                এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ। মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি।' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- details-bottom-ad --}}
                    <div class="container-fluid">
                        <div class="container">
                            <div class="header-bottom-ad">
                                <img src="{{ asset('/storage/assets/images/ads/header-bottom-ad.jpg') }}"
                                    alt="header-bottom-ad">
                            </div>
                        </div>
                    </div>

                    {{-- tag content --}}
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row my-4">
                                <h5><a href="" class="text-danger"><b>ক্রিকেট</b></a> থেকে আরও পড়ুন</h5>

                                <div class="col-lg-12">
                                    <a href="" class="btn btn-sm btn-danger">ক্রিকেট</a>
                                    <a href="" class="btn btn-sm btn-danger">ক্রিকেট</a>
                                    <a href="" class="btn btn-sm btn-danger">ক্রিকেট</a>
                                    <a href="" class="btn btn-sm btn-danger">ক্রিকেট</a>
                                    <a href="" class="btn btn-sm btn-danger">ক্রিকেট</a>
                                    <a href="" class="btn btn-sm btn-danger">ক্রিকেট</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                {{-- left content --}}
                <div class="col-lg-4">


                    {{-- polling vote --}}
                    @include('frontend.layouts.online_poll')


                    {{-- special-content-right-ad --}}
                    <div class="special-content-right-ad my-5">
                        <img src="{{ asset('/storage/assets/images/ads/special-content-right-top-ad.gif') }}"
                            alt="special-content-right-ad">
                    </div>

                    {{-- latest & trand contents --}}
                    <div class="special-content-right">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="latest-tab" data-bs-toggle="tab"
                                    data-bs-target="#latest" type="button" role="tab" aria-controls="latest"
                                    aria-selected="true">সর্বশেষ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="trand-tab" data-bs-toggle="tab" data-bs-target="#trand"
                                    type="button" role="tab" aria-controls="trand" aria-selected="false">সর্বাধিক
                                    পঠিত</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="latest" role="tabpanel"
                                aria-labelledby="latest-tab">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="trand" role="tabpanel" aria-labelledby="trand-tab">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <img src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                            alt="image-1">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                        <p><a href=""
                                                class="text-decoration-none text-danger"><b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- details-bottom-ad --}}
    <div class="container-fluid">
        <div class="container">
            <div class="header-bottom-ad">
                <img src="{{ asset('/storage/assets/images/ads/header-bottom-ad.jpg') }}" alt="header-bottom-ad">
            </div>
        </div>
    </div>

    {{-- more related posts --}}
    <div class="container-fluid">
        <div class="container my-5">

            <div class="row related-content">
                <div class="category-wise-content">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="category-listing d-flex gap-3">
                            <div class="top"></div>
                            <div class="bottom"></div>
                            <div class="category">
                                <h5 class=""><a href="" class="text-decoration-none text-danger fw-bold">আরও
                                        পড়ুন</a></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                        <a href="{{ route('category-wise-content-details', ['cricket', 'bangladesh', 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা']) }}"
                            class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content">
                                <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                    alt="image-1">
                                <div class="card-body">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                        | Admin</small>

                                    <h5 class="card-title my-2 text-danger">
                                        <b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b>
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit(
                                            'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।',
                                            70,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                        <a href="{{ route('category-wise-content-details', ['cricket', 'bangladesh', 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা']) }}"
                            class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content">
                                <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                    alt="image-1">
                                <div class="card-body">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                        | Admin</small>

                                    <h5 class="card-title my-2 text-danger">
                                        <b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b>
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit(
                                            'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।',
                                            70,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                        <a href="{{ route('category-wise-content-details', ['cricket', 'bangladesh', 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা']) }}"
                            class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content">
                                <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                    alt="image-1">
                                <div class="card-body">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                        | Admin</small>

                                    <h5 class="card-title my-2 text-danger">
                                        <b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b>
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit(
                                            'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।',
                                            70,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                        <a href="{{ route('category-wise-content-details', ['cricket', 'bangladesh', 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা']) }}"
                            class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content">
                                <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                    alt="image-1">
                                <div class="card-body">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                        | Admin</small>

                                    <h5 class="card-title my-2 text-danger">
                                        <b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b>
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit(
                                            'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।',
                                            70,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                        <a href="{{ route('category-wise-content-details', ['cricket', 'bangladesh', 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা']) }}"
                            class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content">
                                <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                    alt="image-1">
                                <div class="card-body">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                        | Admin</small>

                                    <h5 class="card-title my-2 text-danger">
                                        <b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b>
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit(
                                            'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।',
                                            70,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                        <a href="{{ route('category-wise-content-details', ['cricket', 'bangladesh', 'ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা']) }}"
                            class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content">
                                <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/image-1.jpg') }}"
                                    alt="image-1">
                                <div class="card-body">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F j, Y') }}
                                        | Admin</small>

                                    <h5 class="card-title my-2 text-danger">
                                        <b>{{ Str::limit('ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা ভুটানের বিপক্ষে ঘরের মাঠে অভিষেকের অপেক্ষায় হামজা', 40) }}</b>
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit(
                                            'মঙ্গলবার বাফুফে ভবনে অনুষ্ঠিত ম্যাচ-পূর্ববর্তী সংবাদ সম্মেলনে কোচ ক্যাবরেরা ও অধিনায়ক জামাল ভুঁইয়া উপস্থিত ছিলেন। কোচ জানান, ইংল্যান্ড থেকে এসে হামজা গতকালই দলের সঙ্গে অনুশীলনে অংশ নিয়েছেন এবং ভুটানের বিপক্ষে ম্যাচে তাকে মাঠে দেখা যাবে বলে আশা করা হচ্ছে। তবে ইতালিপ্রবাসী ফাহমিদুল ইসলামকে মূল দলে রাখা হবে কি না, সে বিষয়ে এখনো সিদ্ধান্ত হয়নি। এছাড়া, কানাডাপ্রবাসী ফুটবলার শমিত সোম আগামীকাল দলের সঙ্গে যোগ দেওয়ার কথা রয়েছে। ভুটানের সঙ্গে প্রীতি ম্যাচ ছাড়াও ১০ জুন এএফসি এশিয়ান কাপ বাছাইপর্বে সিঙ্গাপুরের বিপক্ষে ম্যাচ রয়েছে বাংলাদেশের। এ দুটি ম্যাচ সামনে রেখে ঘোষিত ২৬ সদস্যের প্রাথমিক দলে এই তিন প্রবাসী ফুটবলারকেই রাখা হয়েছে। এর আগে মার্চ মাসে ভারতের বিপক্ষে এশিয়ান কাপ বাছাইপর্বে আন্তর্জাতিক অভিষেক হয় হামজার। এবার ঘরের মাঠে সমর্থকদের সামনে খেলার অপেক্ষায় আছেন তিনি, আর তা নিয়ে ফুটবলপ্রেমীদের মধ্যে তৈরি হয়েছে ব্যাপক উৎসাহ ও উত্তেজনা। তবে টিকিট প্রাপ্তি নিয়ে সমর্থকদের মধ্যে রয়েছে কিছুটা অসন্তোষ ও ক্ষোভ।',
                                            70,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('appendJavascripts')
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=6852650f8a97b30019349ff6&product=inline-share-buttons&source=platform"
        async="async"></script>
@endpush
