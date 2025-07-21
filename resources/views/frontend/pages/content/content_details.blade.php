@extends('frontend.layouts.app')
@push('title')
    {{ $content->title ?? '' }} |
@endpush
@push('appendCss')
@endpush
@push('meta')
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $content->title }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($content->details ?? ''), 160) }}" />
    <meta property="og:image" content="{{ asset('/storage/assets/images/blog/' . $content->image) }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ getSetting()->site_title }}" />
    <meta name="description" content="{{ getSetting()->site_desc }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $content->title }}" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($content->details ?? ''), 160) }}" />
    <meta name="twitter:image" content="{{ asset('/storage/assets/images/blog/' . $content->image) }}" />
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
                <div class="col-lg-12 d-flex gap-3">
                    <p class="text-danger"><a
                                href="{{ route('category-wise-content', $content->category->slug) }}"
                                class="text-danger">{{ $content->category->name ?? '' }}</a></p>
                    <p class="text-danger"><a
                                href="{{ route('cat-wise-sub-content', [$content->category->slug, $content->subcategory->name]) }}"
                                class="text-danger">{{ $content->subcategory->name ?? '' }}</a></p>
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
                        <img class="card-img-top" src="{{ asset('/storage/assets/images/blogs/' . $content->image) }}"
                            alt="{{ $content->slug }}">
                        <div class="text-center" style="background:#eaecee">
                            <small>{{ $content->caption ?? 'ছবি: সংগৃহীত' }}</small>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-10">
                                <div class="card-body shadow-sm">
                                    <div class="row my-4 d-flex align-items-center">
                                        <div class="col-12 col-sm-6">
                                            <small class="text-muted">{{ bangla_date($content->created_at) }} |
                                                 {{ $content->author->name ?? ''}}</small>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="sharethis-inline-share-buttons z-0"></div>
                                        </div>
                                    </div>

                                    <h3 class="card-title my-2 text-danger">
                                        {{ $content->title ?? '' }}
                                    </h3>

                                    <p class="card-text text-muted my-3">
                                        {!! $content->details ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- details-bottom-ad --}}
                    <div class="container-fluid">
                        <div class="container">
                            <div class="header-bottom-ad">
                                <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_special_header_bottom) }}"
                                    alt="header-bottom-ad">
                            </div>
                        </div>
                    </div>

                    {{-- tag content --}}
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row my-4">
                                <h5><a href="{{ route('category-wise-content', $content->category->slug) }}"
                                        class="text-danger">{{ $content->category->name ?? '' }}</a> থেকে আরও পড়ুন
                                </h5>
                                <div class="col-lg-12">
                                    @foreach (json_decode($content->tags) as $tag)
                                        <a href="{{ route('tagSearch',['search'=>$tag]) }}" class="btn btn-sm btn-danger">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- comments --}}
                    <div class="container-fluid">
                        <div class="container">
                            <form action="{{ route('comments') }}" method="post">
                                @csrf
                                <div class="row my-4">
                                    @if (session('success'))
                                        <div class="col-12 d-flex justify-content-center">
                                            <div class="alert alert-success py-1 text-center">
                                                {{ session('success') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <input type="hidden" name="content_id" value="{{ $content->id }}">
                                        <textarea name="comment" class="form-control form-control-danger border-1 border-danger @error('comment') is-invalid @enderror" placeholder="আপনার মন্তব্য দিন" required></textarea>
                                        @if(Auth::check())
                                            <div class="d-flex justify-content-end my-3">
                                                <button class="btn btn-danger btn-sm">পোস্ট</button>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-end my-3">
                                                <a href="{{ route('login') }}" class="btn btn-danger btn-sm">লগইন</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                {{-- left content --}}
                <div class="col-lg-4">


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
                                    <div class="row mb-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/'.$letestCont->image) }}"
                                                alt="{{ $letestCont->slug }}">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                                            <p><a href="{{ route('categoryWiseContentDetails',[$letestCont->category->slug, $letestCont->subcategory->name, $letestCont->slug]) }}"
                                                    class="text-decoration-none text-danger">{{ Str::limit($letestCont->title, 40) }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="trand" role="tabpanel" aria-labelledby="trand-tab">
                                @foreach (trdng_post() as $maxVisitor)
                                    <div class="row mb-3">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <img src="{{ asset('/storage/assets/images/blogs/'.$maxVisitor->image) }}"
                                                alt="{{ $maxVisitor->slug }}">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8 d-flex d-flex align-items-center">
                                            <p>
                                                <a href="{{ route('categoryWiseContentDetails',[$maxVisitor->category->slug, $maxVisitor->subcategory->name, $maxVisitor->slug]) }}"
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

    {{-- details-bottom-ad --}}
    <div class="container-fluid">
        <div class="container">
            <div class="header-bottom-ad">
                <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_special_header_bottom) }}" alt="header-bottom-ad">
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
                                <h4 class=""><a
                                        href="{{ route('cat-wise-sub-content', [$content->category->slug, $content->subcategory->name]) }}"
                                        class="text-decoration-none text-danger">আরও
                                        পড়ুন</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($moreContents as $moreContent)
                        <div class="col-sm-6 col-md-6 col-lg-4 mt-2">
                            <a href="{{ route('categoryWiseContentDetails', [$moreContent->category?->slug, $moreContent?->subcategory?->name, $moreContent?->slug]) }}"
                                class="text-decoration-none">
                                <div class="card border-0 shadow-sm special-left-content">
                                    <img class="card-img-top"
                                        src="{{ asset('/storage/assets/images/blogs/' . $moreContent->image) }}"
                                        alt="{{ $moreContent->slug }}">
                                    <div class="card-body">
                                        <small class="text-muted">{{ bangla_date($moreContent->created_at) }} |
                                             {{ $moreContent->author->name ?? ''}}</small>

                                        <h4 class="card-title my-2 text-danger">
                                            {{ Str::limit($moreContent->title, 40) }}
                                        </h4>

                                        <p class="card-text text-muted">
                                            {{ Str::limit(strip_tags($moreContent->details), 70) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
