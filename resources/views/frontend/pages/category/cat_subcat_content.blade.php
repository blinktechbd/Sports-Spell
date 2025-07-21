@extends('frontend.layouts.app')
@push('title')
    {{ $subcategory->name . ' | ' . $subcategory->category->name ?? '' }} |
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
                <div class="col-lg-12 d-flex gap-4">
                    <p class="text-danger"><a href="{{ route('category-wise-content', $subcategory->category->slug) }}" class="text-danger">{{ $subcategory->category->name ?? '' }}</a></p>
                    <p class="text-danger"><a href="{{ route('cat-wise-sub-content',[$subcategory->category->slug,$subcategory->name]) }}" class="text-danger">{{ $subcategory->name ?? '' }}</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- category content --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row category-content mb-4">
                {{-- left content --}}
                <div class="col-lg-8">
                    <div class="row">
                        {{-- left content --}}
                        @if ($catSubContents->count() > 0)
                            <div class="col-sm-7 col-md-7 col-lg-8 mt-2">
                                <a href="{{ route('categoryWiseContentDetails', [$catSubContents[0]?->category?->slug, $catSubContents[0]?->subcategory?->name, $catSubContents[0]?->slug]) }}"
                                        class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-left-content">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/assets/images/blogs/' . $catSubContents[0]['image']) }}"
                                            alt="image-1">
                                        <div class="card-body">
                                            <small
                                                class="text-muted">{{ bangla_date($catSubContents[0]['created_at']) }} |
                                                        {{ $catSubContents[0]['author']['name'] ?? ''}}</small>
                                            <h4 class="card-title my-2 text-danger">
                                                {{ Str::limit($catSubContents[0]['title'], 40) }}
                                            </h4>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags(html_entity_decode($catSubContents[0]['details'])), 400) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        {{-- Middle content --}}
                        <div class="col-sm-5 col-md-5 col-lg-4 mt-2">
                            @foreach ($catSubContents->slice(1, 2) as $catSubContent)
                                <a href="{{ route('categoryWiseContentDetails', [$catSubContent?->category?->slug, $catSubContent?->subcategory?->name, $catSubContent?->slug]) }}"
                                        class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content mb-2">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/assets/images/blogs/' . $catSubContent->image) }}"
                                            alt="image-1">
                                        <div class="card-body px-2">
                                            <small
                                                class="text-muted">{{ bangla_date($catSubContent->created_at) }} |
                                                        {{ $catSubContent->author->name ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($catSubContent->title, 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags(html_entity_decode($catSubContent->details)), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        {{-- Smaller cards --}}
                        @foreach ($catSubContents->slice(4) as $catSubContent)
                            <div class="col-sm-6 col-md-4 col-lg-4 mt-2">
                                <a href="{{ route('categoryWiseContentDetails', [$catSubContent?->category?->slug, $catSubContent?->subcategory?->name, $catSubContent?->slug]) }}"
                                        class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/assets/images/blogs/' . $catSubContent->image) }}"
                                            alt="image-1">
                                        <div class="card-body px-2">
                                            <small
                                                class="text-muted">{{ bangla_date($catSubContent->created_at) }} |
                                                        {{ $catSubContent->author->name ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($catSubContent->title, 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags(html_entity_decode($catSubContent->details)), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    {{-- Pagination --}}
                    @if ($catSubContents->lastPage() > 1)
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center mt-4">
                                <div class="demo">
                                    <nav class="pagination-outer" aria-label="Page navigation">
                                        <ul class="pagination">

                                            {{-- First page "«" disabled or active --}}
                                            @if ($catSubContents->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true" aria-label="First">
                                                    <span class="page-link" aria-hidden="true">«</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $catSubContents->url(1) }}"
                                                        aria-label="First">«</a>
                                                </li>
                                            @endif

                                            {{-- Previous page "‹" --}}
                                            @if ($catSubContents->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                                                    <span class="page-link" aria-hidden="true">‹</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $catSubContents->previousPageUrl() }}"
                                                        rel="prev" aria-label="Previous">‹</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements (page numbers) --}}
                                            @foreach ($catSubContents->getUrlRange(1, $catSubContents->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $catSubContents->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            {{-- Next page "›" --}}
                                            @if ($catSubContents->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $catSubContents->nextPageUrl() }}"
                                                        rel="next" aria-label="Next">›</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                                                    <span class="page-link" aria-hidden="true">›</span>
                                                </li>
                                            @endif

                                            {{-- Last page "»" --}}
                                            @if ($catSubContents->currentPage() == $catSubContents->lastPage())
                                                <li class="page-item disabled" aria-disabled="true" aria-label="Last">
                                                    <span class="page-link" aria-hidden="true">»</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="{{ $catSubContents->url($catSubContents->lastPage()) }}"
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

                {{-- right content --}}
                <div class="col-lg-4 my-2">

                    {{-- polling vote --}}
                    @include('frontend.layouts.online_poll')

                    {{-- special-content-right-ad --}}
                    <div class="special-content-right-ad my-5">
                        <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_sidebar_ad_one) }}"
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
                                @foreach (ltst_post() as $letestCont)
                                    <div class="row mb-2">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/' . $letestCont->image) }}"
                                                alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href=""
                                                    class="text-decoration-none text-danger">{{ Str::limit($letestCont->title, 40) }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="trand" role="tabpanel" aria-labelledby="trand-tab">
                                @foreach (trdng_post() as $maxVisitor)
                                    <div class="row mb-2">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/' . $maxVisitor->image) }}"
                                                alt="image-1">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex d-flex align-items-center">
                                            <p><a href=""
                                                    class="text-decoration-none text-danger">{{ Str::limit($maxVisitor->title, 40) }}</a>
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
