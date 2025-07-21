@extends('frontend.layouts.app')
@push('title')
    About Us |
@endpush
@push('appendCss')
@endpush
@push('meta')
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ getSetting()->meta_title ?? '' }}" />
    <meta property="og:description" content="{{ getSetting()->meta_desc ?? '' }}" />
    <meta property="og:image" content="{{ asset('/storage/assets/images/logo/og-logo.png') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Sports" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ getSetting()->meta_title ?? '' }}" />
    <meta name="twitter:description" content="{{ getSetting()->meta_desc ?? '' }}" />
    <meta name="twitter:image" content="{{ asset('/storage/assets/images/logo/og-logo.png') }}" />
    <meta name="twitter:url" content="{{ url('/') }}" />
    <meta name="twitter:site" content="@Sports" />
    <meta name="twitter:creator" content="@Sports" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="my-5 text-danger">আমাদের সম্পর্কে</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="container">
            <div class="row about-details">
                <div class="col-lg-12">
                    <p class="text-center">
                        {!! getSetting()->about ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </div>


@endsection
