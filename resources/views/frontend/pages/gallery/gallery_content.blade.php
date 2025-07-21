@extends('frontend.layouts.app')
@push('title')
    গ্যালারি |
@endpush
@push('appendCss')
<style>
    .pagination-outer {
            text-align: center;
        }

        .pagination {
            font-family: 'Raleway', sans-serif;
            display: inline-flex;
            position: relative;
        }

        .pagination li a.page-link {
            color: #FF0000;
            background: #fdedec80;
            font-size: 17px;
            font-weight: 700;
            text-align: center;
            line-height: 33px;
            height: 35px;
            width: 35px;
            padding: 0;
            margin: 0 7px;
            border: none;
            border-radius: 0;
            display: block;
            position: relative;
            z-index: 0;
            transition: all 0.1s ease 0s;
        }

        .pagination li:first-child a.page-link,
        .pagination li:last-child a.page-link {
            font-size: 23px;
            line-height: 30px;
        }

        .pagination li a.page-link:hover,
        .pagination li a.page-link:focus,
        .pagination li.active a.page-link:hover,
        .pagination li.active a.page-link {
            color: #fff;
            background: transparent;
        }

        .pagination li a.page-link:before,
        .pagination li a.page-link:after {
            content: '';
            background-color: #FF0000;
            height: 60%;
            width: 100%;
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
            transition: all 0.3s ease 0s;
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        }

        .pagination li a.page-link:after {
            top: auto;
            bottom: 0;
        }

        .pagination li a.page-link:hover:before,
        .pagination li a.page-link:focus:before,
        .pagination li.active a.page-link:hover:before,
        .pagination li.active a.page-link:before {
            opacity: 1;
            top: 3px;
        }

        .pagination li a.page-link:hover:after,
        .pagination li a.page-link:focus:after,
        .pagination li.active a.page-link:hover:after,
        .pagination li.active a.page-link:after {
            opacity: 1;
            bottom: 3px;
        }

        .page-item.active .page-link {
            background-color: #FF0000;
            !important;
            border: none !important;
        }
</style>
@endpush
@push('meta')
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ getSetting()->meta_title }}" />
    <meta property="og:description" content="{{ getSetting()->meta_desc }}" />
    <meta property="og:image" content="{{ asset('/storage/assets/images/logo/' . getSetting()->meta_img) }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ getSetting()->site_title }}" />
    <meta name="description" content="{{ getSetting()->site_desc }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ getSetting()->meta_title }}" />
    <meta name="twitter:description" content="{{ getSetting()->meta_desc }}" />
    <meta name="twitter:image" content="{{ asset('/storage/assets/images/logo/' . getSetting()->meta_img) }}" />
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

    {{-- menu listing --}}
    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row menu-listing">
                <div class="col-lg-12 d-flex gap-2">
                    <h5 class="text-danger"><a href="{{ route('photoGalleries') }}"
                                class="text-danger">গ্যালারি</a></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row category-content mb-4">
                <div class="row">
                    @foreach ($gallaries as $gallary)
                        <div class="col-6 col-sm-4 col-md-4 col-lg-4 mt-3">
                            <a href="{{ route('photoGalleryDetails', $gallary->id) }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm special-left-content">
                                    <img class="card-img-top"
                                        src="{{ asset('storage/assets/images/gallery/' . $gallary->image) }}"
                                        alt="{{ $gallary->title }}">
                                    <div class="card-body">
                                        <h6 class="card-title text-center text-danger">
                                            {{ Str::limit($gallary->title, 40) }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                @if ($gallaries->lastPage() > 1)
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mt-4">
                            <div class="demo">
                                <nav class="pagination-outer" aria-label="Page navigation">
                                    <ul class="pagination">
                                        {{-- First page "«" disabled or active --}}
                                        @if ($gallaries->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true" aria-label="First">
                                                <span class="page-link" aria-hidden="true">«</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $gallaries->url(1) }}"
                                                    aria-label="First">«</a>
                                            </li>
                                        @endif
                                        {{-- Previous page "‹" --}}
                                        @if ($gallaries->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                                                <span class="page-link" aria-hidden="true">‹</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $gallaries->previousPageUrl() }}"
                                                    rel="prev" aria-label="Previous">‹</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements (page numbers) --}}
                                        @foreach ($gallaries->getUrlRange(1, $gallaries->lastPage()) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $gallaries->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        {{-- Next page "›" --}}
                                        @if ($gallaries->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $gallaries->nextPageUrl() }}"
                                                    rel="next" aria-label="Next">›</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                                                <span class="page-link" aria-hidden="true">›</span>
                                            </li>
                                        @endif

                                        {{-- Last page "»" --}}
                                        @if ($gallaries->currentPage() == $gallaries->lastPage())
                                            <li class="page-item disabled" aria-disabled="true" aria-label="Last">
                                                <span class="page-link" aria-hidden="true">»</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $gallaries->url($gallaries->lastPage()) }}"
                                                    aria-label="Last">»</a>
                                            </li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('appendJavascripts')
@endpush
