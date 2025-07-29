@extends('frontend.layouts.app')
@push('title')
    {{ $gallery->title ?? '' }} |
@endpush
@push('appendCss')
@endpush
@push('meta')
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $gallery->title }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($gallery->details ?? ''), 160) }}" />
    <meta property="og:image" content="{{ asset('/storage/assets/images/gallery/' . $gallery->image) }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ getSetting()->site_title }}" />
    <meta name="description" content="{{ getSetting()->site_desc }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $gallery->title }}" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($gallery->details ?? ''), 160) }}" />
    <meta name="twitter:image" content="{{ asset('/storage/assets/images/gallery/' . $gallery->image) }}" />
    <meta name="twitter:url" content="{{ url('/') }}" />
    <meta name="twitter:site" content="@Sports" />
    <meta name="twitter:creator" content="@Sports" />
@endpush
@section('content')
    {{-- header-top-ad --}}
    <div class="container-fluid">
        <div class="container">
            <div class="header-bottom-ad">
                <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_special_header_top) }}" alt="header-bottom-ad">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row content-details">
                {{-- right content --}}
                <div class="col-lg-8">
                    <div class="card border-0  special-left-content mb-5 ">
                        <img class="card-img-top" src="{{ asset('/storage/assets/images/gallery/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <div class="card-body shadow-sm">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12">
                                        </div>
                                    </div>
                                    <h5 class="card-title mt-1 text-center text-danger">
                                        {{ $gallery->title ?? '' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($gallery->galleryItems as $item)
                        <div class="card border-0  special-left-content mb-5">
                            <img class="card-img-top" src="{{ asset('/storage/assets/images/gallery/' . $item->image_name) }}"
                                alt="{{ $item->caption }}">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card-body shadow-sm">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-12">
                                            </div>
                                        </div>
                                        <h5 class="card-title mt-1 text-center text-danger">
                                            {{ $item->caption ?? '' }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- details-bottom-ad --}}
                    <div class="container-fluid">
                        <div class="container">
                            <div class="header-bottom-ad">
                                <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_category_bottom) }}"
                                    alt="header-bottom-ad">
                            </div>
                        </div>
                    </div>
                </div>



                {{-- left content --}}
                <div class="col-lg-4">

                    {{-- latest & trand contents --}}
                    <div class="special-content-right">
                        <ul class="nav nav-tabs"  role="tablist">
                            <li class="nav-item w-100" role="presentation">
                                <button class="nav-link active w-100" id="latest-tab" data-bs-toggle="tab"
                                    data-bs-target="#latest" type="button" role="tab" aria-controls="latest"
                                    aria-selected="true">সর্বশেষ</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="latest" role="tabpanel"
                                aria-labelledby="latest-tab">
                                @foreach (galleryLtstPost($gallery->id) as $item)
                                    <div class="row mb-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/gallery/'.$item->image) }}"
                                                alt="{{ $item->title }}">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="{{ route('photoGalleryDetails', $item->id) }}"
                                                    class="text-decoration-none text-danger">{{ Str::limit($item->title, 40) }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('appendJavascripts')

@endpush
