@extends('frontend.layouts.app')
@push('title')
    @if(isset($category))
        {{ $category->name . ' আজকের খেলাধুলা' ?? '' }} |
    @else
        আজকের খেলাধুলা |
    @endif
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


    {{-- Ajker Khela content --}}
    <div class="container-fluid">
        <div class="container">

            <div class="row ajker-khela-menu my-5">
                <div class="col-lg-12 text-center">
                    @foreach (topMenus()->get() as $categoryMenu)
                        <a href="{{ route('todayCatSports',$categoryMenu->slug) }}" class="fs-4"><span
                                class="badge bg-danger">{{ $categoryMenu->name ?? '' }}</span></a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <h5 class="text-center text-danger border-wavy-full">
                        @if(isset($category))
                            {{ 'আজকের ' .  $category->name . ' খেলাধুলা' ?? '' }} |
                        @else
                            আজকের সকল খেলা
                        @endif
                    </h5>
                </div>
            </div>
            <div class="row my-5 d-flex justify-content-center">

                @foreach ($todaySports as $todaySport)
                    <div class="col-lg-8 shadow ajker-khela mt-4">
                        <div class="d-flex justify-content-center">
                            <p class="bg-danger text-white px-1 rounded-1">{{ $todaySport->match_type ?? '' }}
                                ({{ $todaySport->category->name ?? '' }})</p>
                        </div>
                        <div class="text-center">
                            <h4 class="text-danger">{{ $todaySport->match_title ?? '' }}</h4>
                            <h6 class="text-danger">{{ $todaySport->match_stadium ?? '' }}</h6>
                            <p class="text-danger">বাংলাদেশ সময়:
                                {{ Carbon\Carbon::parse($todaySport->match_time)->format('h:i A') ?? '' }}
                                ({{ \Carbon\Carbon::parse($todaySport->match_time)->locale('bn')->translatedFormat('l') ?? '' }})
                            </p>
                            <div class="wining-posibility my-2">
                                <h6 class="text-danger">ভোট দিন</h6>
                                <div class="d-flex justify-content-center">
                                    @foreach ($todaySport->todaySportOption as $sportOption)
                                        @php
                                            $percent = number_format(($sportOption->vote_count / max($todaySport->total_vote, 1)) * 100,
                                                2,
                                            );
                                        @endphp
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input border-danger is-danger ajker-vote-polling"
                                                type="radio" name="option_id" id="inlineRadio{{ $sportOption->id }}"
                                                value="{{ $sportOption->id }}" data-token="{{ csrf_token() }}" required>
                                            <label class="form-check-label text-danger"
                                                for="inlineRadio{{ $sportOption->id }}">{{ $sportOption->option_name ?? '' }}
                                                <small>({{ $percent }}%)</small></label>
                                        </div>
                                    @endforeach
                                </div>
                                <small id="ajkerSport-voteMessage{{ $todaySport->id }}" class="text-danger mt-2"></small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($todaySports->lastPage() > 1)
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-4">
                        <div class="demo">
                            <nav class="pagination-outer" aria-label="Page navigation">
                                <ul class="pagination">

                                    {{-- First page "«" disabled or active --}}
                                    @if ($todaySports->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="First">
                                            <span class="page-link" aria-hidden="true">«</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $todaySports->url(1) }}" aria-label="First">«</a>
                                        </li>
                                    @endif

                                    {{-- Previous page "‹" --}}
                                    @if ($todaySports->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                                            <span class="page-link" aria-hidden="true">‹</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $todaySports->previousPageUrl() }}"
                                                rel="prev" aria-label="Previous">‹</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements (page numbers) --}}
                                    @foreach ($todaySports->getUrlRange(1, $todaySports->lastPage()) as $page => $url)
                                        <li class="page-item {{ $page == $todaySports->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next page "›" --}}
                                    @if ($todaySports->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $todaySports->nextPageUrl() }}" rel="next"
                                                aria-label="Next">›</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                                            <span class="page-link" aria-hidden="true">›</span>
                                        </li>
                                    @endif

                                    {{-- Last page "»" --}}
                                    @if ($todaySports->currentPage() == $todaySports->lastPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Last">
                                            <span class="page-link" aria-hidden="true">»</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $todaySports->url($todaySports->lastPage()) }}"
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
@endsection
