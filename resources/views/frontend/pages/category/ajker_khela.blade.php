@extends('frontend.layouts.app')
@push('title')
    Category |
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


    {{-- Ajker Khela content --}}
    <div class="container-fluid">
        <div class="container">

            <div class="row ajker-khela-menu my-5">
                <div class="col-lg-12 text-center">
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">বিশ্বকাপ</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">ক্রিকেট</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">ফুটবল</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">টেনিস</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">হকি</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">কাবাডি</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">বাস্কেটবল</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">ভলিবল</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">বেসবল</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">গল্‌ফ</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">অ্যাথলিট</span></a>
                    <a href="" class="fw-bold fs-5"><span class="badge bg-danger">টেবিল টেনিস</span></a>
                </div>
            </div>

            {{-- <div class="row">
                div.col-lg-
            </div> --}}

        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <h5 class="text-center text-danger border-wavy-full">আজকের ক্রিকেট খেলা</h5>
                    </div>
                </div>
              <div class="row my-5 d-flex justify-content-center">
                <div class="col-lg-8 shadow ajker-khela mt-4">
                    <div class="d-flex justify-content-center">
                        <p class="bg-danger text-white px-1 rounded-1">ওডিআই ম্যাচ</p>
                    </div>
                    <div class="text-center">
                        <h5 class="text-danger fw-bold">বাংলাদেশ–পাকিস্তান</h5>
                        <h6 class="text-danger">শেরে বাংলা জাতীয় ক্রিকেট স্টেডিয়াম বাংলাদেশ</h6>
                        <p class="text-danger">বাংলাদেশ সময়:  1:33 PM (শনিবার)</p>
                        <div class="wining-posibility my-2">
                            <h6 class="text-danger">ভোট দিন</h6>
                           <div class="d-flex justify-content-center">
                             <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label text-danger" for="inlineRadio1">বাংলাদেশ <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                <label class="form-check-label text-danger" for="inlineRadio3">ড্র <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label text-danger" for="inlineRadio2">পাকিস্তান <small>(69.80%)</small></label>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 shadow ajker-khela mt-4">
                    <div class="d-flex justify-content-center">
                        <p class="bg-danger text-white px-1 rounded-1">ওডিআই ম্যাচ</p>
                    </div>
                    <div class="text-center">
                        <h5 class="text-danger fw-bold">বাংলাদেশ–পাকিস্তান</h5>
                        <h6 class="text-danger">শেরে বাংলা জাতীয় ক্রিকেট স্টেডিয়াম বাংলাদেশ</h6>
                        <p class="text-danger">বাংলাদেশ সময়:  1:33 PM (শনিবার)</p>
                        <div class="wining-posibility my-2">
                            <h6 class="text-danger">ভোট দিন</h6>
                           <div class="d-flex justify-content-center">
                             <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label text-danger" for="inlineRadio1">বাংলাদেশ <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                <label class="form-check-label text-danger" for="inlineRadio3">ড্র <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label text-danger" for="inlineRadio2">পাকিস্তান <small>(69.80%)</small></label>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 shadow ajker-khela mt-4">
                    <div class="d-flex justify-content-center">
                        <p class="bg-danger text-white px-1 rounded-1">ওডিআই ম্যাচ</p>
                    </div>
                    <div class="text-center">
                        <h5 class="text-danger fw-bold">বাংলাদেশ–পাকিস্তান</h5>
                        <h6 class="text-danger">শেরে বাংলা জাতীয় ক্রিকেট স্টেডিয়াম বাংলাদেশ</h6>
                        <p class="text-danger">বাংলাদেশ সময়:  1:33 PM (শনিবার)</p>
                        <div class="wining-posibility my-2">
                            <h6 class="text-danger">ভোট দিন</h6>
                           <div class="d-flex justify-content-center">
                             <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label text-danger" for="inlineRadio1">বাংলাদেশ <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                <label class="form-check-label text-danger" for="inlineRadio3">ড্র <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label text-danger" for="inlineRadio2">পাকিস্তান <small>(69.80%)</small></label>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 shadow ajker-khela mt-4">
                    <div class="d-flex justify-content-center">
                        <p class="bg-danger text-white px-1 rounded-1">ওডিআই ম্যাচ</p>
                    </div>
                    <div class="text-center">
                        <h5 class="text-danger fw-bold">বাংলাদেশ–পাকিস্তান</h5>
                        <h6 class="text-danger">শেরে বাংলা জাতীয় ক্রিকেট স্টেডিয়াম বাংলাদেশ</h6>
                        <p class="text-danger">বাংলাদেশ সময়:  1:33 PM (শনিবার)</p>
                        <div class="wining-posibility my-2">
                            <h6 class="text-danger">ভোট দিন</h6>
                           <div class="d-flex justify-content-center">
                             <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label text-danger" for="inlineRadio1">বাংলাদেশ <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                <label class="form-check-label text-danger" for="inlineRadio3">ড্র <small>(69.80%)</small></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-danger is-danger" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label text-danger" for="inlineRadio2">পাকিস্তান <small>(69.80%)</small></label>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>



@endsection
