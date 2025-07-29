@extends('frontend.layouts.app')
@push('title')
    Home |
@endpush
@push('meta')
    {{-- <!-- Open Graph / Facebook -->
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
    <meta name="twitter:creator" content="@Sports" /> --}}
@endpush
@section('content')
    @if ($specialConts)
        {{-- header-top-ad --}}
        <div class="container-fluid">
            <div class="container">
                <div class="header-bottom-ad">
                    <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_special_header_top) }}" alt="header-bottom-ad">
                </div>
            </div>
        </div>
        <div class="container-fluid special-item">
            <div class="container">
                <div class="row my-4 top-special-content">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="category-listing d-flex gap-3">
                            <div class="top"></div>
                            <div class="bottom"></div>
                            <div class="category">
                                <h5><a href="{{ route('category-wise-content', $specialCat->slug) }}"
                                        class="text-decoration-none text-danger">
                                        {{ $specialCat->name }}
                                    </a></h5>
                            </div>
                        </div>
                        <div class="tab d-flex gap-3">
                            @foreach ($specialCat->subcategories as $sub)
                                <a href="{{ route('cat-wise-sub-content', [$sub->category->slug, $sub->name]) }}"
                                    class="text-danger">{{ $sub->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row special-content">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 order-2 order-sm-2 order-md-2 order-lg-1">
                                @if (isset($specialConts[1]))
                                    <a href="{{ route('categoryWiseContentDetails', [$specialConts[1]?->category?->slug, $specialConts[1]?->subcategory?->name, $specialConts[1]?->slug]) }}"
                                        class="text-decoration-none">
                                        <div class="card border-0 shadow-sm special-middle-content">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/assets/images/blogs/' . $specialConts[1]['image']) }}"
                                                alt="{{ $specialConts[1]['slug'] }}">
                                            <div class="card-body px-2">
                                                <small class="text-muted">{{ bangla_date($specialConts[1]['created_at']) }} |
                                                    {{ $specialConts[1]['author']['name'] ?? ''}}</small>
                                                <h6 class="card-title my-2 text-danger">
                                                    {{ Str::limit($specialConts[1]['title'], 25) }}
                                                </h6>
                                                <p class="card-text text-muted">
                                                    {{ Str::limit(strip_tags($specialConts[1]['details']), 35) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                @if (isset($specialConts[2]))
                                    <a href="{{ route('categoryWiseContentDetails', [$specialConts[2]?->category?->slug, $specialConts[2]?->subcategory?->name, $specialConts[2]?->slug]) }}"
                                        class="text-decoration-none">
                                        <div class="card border-0 shadow-sm special-middle-content mt-2">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/assets/images/blogs/' . $specialConts[2]['image']) }}"
                                                alt="{{ $specialConts[2]['slug'] }}">
                                            <div class="card-body px-2">
                                                <small class="text-muted">{{ bangla_date($specialConts[2]['created_at']) }} |
                                                    {{ $specialConts[2]['author']['name'] ?? ''}}</small>
                                                <h6 class="card-title my-2 text-danger">
                                                    {{ Str::limit($specialConts[2]['title'], 25) }}
                                                </h6>
                                                <p class="card-text text-muted">
                                                    {{ Str::limit(strip_tags($specialConts[2]['details']), 35) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            @if (isset($specialConts[0]))
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-1 order-sm-1 order-md-1 order-lg-2 mb-sm-2 mb-md-2">
                                    <a href="{{ route('categoryWiseContentDetails', [$specialConts[0]?->category?->slug, $specialConts[0]?->subcategory?->name, $specialConts[0]?->slug]) }}"
                                        class="text-decoration-none">
                                        <div class="card border-0 shadow-sm special-left-content">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/assets/images/blogs/' . $specialConts[0]['image']) }}"
                                                alt="{{ $specialConts[0]['slug'] }}">
                                            <div class="card-body">
                                                <small class="text-muted">{{ bangla_date($specialConts[0]['created_at']) }} |
                                                    {{ $specialConts[0]['author']['name'] ?? ''}}</small>
                                                <h4 class="card-title my-2 text-danger">
                                                   {{ Str::limit($specialConts[0]['title'], 40) }}
                                                </h4>
                                                <p class="card-text text-muted">
                                                    {{ Str::limit(strip_tags($specialConts[0]['details']), 300) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 order-3 order-sm-3 order-md-3 order-lg-3">
                                @if (isset($specialConts[3]))
                                    <a href="{{ route('categoryWiseContentDetails', [$specialConts[3]?->category?->slug, $specialConts[3]?->subcategory?->name, $specialConts[3]?->slug]) }}"
                                        class="text-decoration-none">
                                        <div class="card border-0 shadow-sm special-middle-content">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/assets/images/blogs/' . $specialConts[3]['image']) }}"
                                                alt="{{ $specialConts[3]['slug'] }}">
                                            <div class="card-body px-2">
                                                <small class="text-muted">{{ bangla_date($specialConts[3]['created_at']) }} |
                                                    {{ $specialConts[3]['author']['name'] ?? ''}}</small>
                                                <h6 class="card-title my-2 text-danger">
                                                    {{ Str::limit($specialConts[3]['title'], 25) }}
                                                </h6>
                                                <p class="card-text text-muted">
                                                    {{ Str::limit(strip_tags($specialConts[3]['details']), 35) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                @if (isset($specialConts[4]))
                                    <a href="{{ route('categoryWiseContentDetails', [$specialConts[4]?->category?->slug, $specialConts[4]?->subcategory?->name, $specialConts[4]?->slug]) }}"
                                        class="text-decoration-none">
                                        <div class="card border-0 shadow-sm special-middle-content mt-2">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/assets/images/blogs/' . $specialConts[4]['image']) }}"
                                                alt="{{ $specialConts[4]['slug'] }}">
                                            <div class="card-body px-2">
                                                <small class="text-muted">{{ bangla_date($specialConts[4]['created_at']) }} |
                                                    {{ $specialConts[4]['author']['name'] ?? ''}}</small>
                                                <h6 class="card-title my-2 text-danger">
                                                    {{ Str::limit($specialConts[4]['title'], 25) }}
                                                </h6>
                                                <p class="card-text text-muted">
                                                    {{ Str::limit(strip_tags($specialConts[4]['details']), 35) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
            <div class="row special-content">
                {{-- left content --}}
                <div class="col-lg-8">
                    <div class="row">
                        {{-- special left content --}}
                        @if (isset($contents[0]))
                            <div class="col-sm-7 col-md-7 col-lg-8">
                                <a href="{{ route('categoryWiseContentDetails', [$contents[0]?->category?->slug, $contents[0]?->subcategory?->name, $contents[0]?->slug]) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-left-content">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/blogs/' . $contents[0]['image']) }}"
                                            alt="{{ $contents[0]['slug'] }}">
                                        <div class="card-body">
                                            <small class="text-muted">{{ bangla_date($contents[0]['created_at']) }} |
                                                {{ $contents[0]['author']['name'] ?? ''}}</small>
                                            <h4 class="card-title my-2 text-danger">
                                                {{ Str::limit($contents[0]['title'], 40) }}
                                            </h4>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($contents[0]['details']), 400) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        {{-- special middle content --}}
                        <div class="col-sm-5 col-md-5 col-lg-4">
                            @if (isset($contents[1]))
                                <a href="{{ route('categoryWiseContentDetails', [$contents[1]?->category?->slug, $contents[1]?->subcategory?->name, $contents[1]?->slug]) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/blogs/' . $contents[1]['image']) }}"
                                            alt="{{ $contents[1]['slug'] }}">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ bangla_date($contents[1]['created_at']) }} |
                                                {{ $contents[1]['author']['name'] ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($contents[1]['title'], 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($contents[1]['details']), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            @if (isset($contents[2]))
                                <a href="{{ route('categoryWiseContentDetails', [$contents[2]?->category?->slug, $contents[2]?->subcategory?->name, $contents[2]?->slug]) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/blogs/' . $contents[2]['image']) }}"
                                            alt="{{ $contents[2]['slug'] }}">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ bangla_date($contents[2]['created_at']) }} |
                                                {{ $contents[2]['author']['name'] ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($contents[2]['title'], 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($contents[2]['details']), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            @if (isset($contents[3]))
                                <a href="{{ route('categoryWiseContentDetails', [$contents[3]?->category?->slug, $contents[3]?->subcategory?->name, $contents[3]?->slug]) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/blogs/' . $contents[3]['image']) }}"
                                            alt="{{ $contents[3]['slug'] }}">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ bangla_date($contents[3]['created_at']) }} |
                                                {{ $contents[3]['author']['name'] ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($contents[3]['title'], 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($contents[3]['details']), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            @if (isset($contents[4]))
                                <a href="{{ route('categoryWiseContentDetails', [$contents[4]?->category?->slug, $contents[4]?->subcategory?->name, $contents[4]?->slug]) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/blogs/' . $contents[4]['image']) }}"
                                            alt="{{ $contents[4]['slug'] }}">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ bangla_date($contents[4]['created_at']) }} |
                                                {{ $contents[4]['author']['name'] ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($contents[4]['title'], 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($contents[4]['details']), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            @if (isset($contents[5]))
                                <a href="{{ route('categoryWiseContentDetails', [$contents[5]?->category?->slug, $contents[5]?->subcategory?->name, $contents[5]?->slug]) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-middle-content mt-2">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/blogs/' . $contents[5]['image']) }}"
                                            alt="{{ $contents[5]['slug'] }}">
                                        <div class="card-body px-2">
                                            <small class="text-muted">{{ bangla_date($contents[5]['created_at']) }} |
                                                {{ $contents[5]['author']['name'] ?? ''}}</small>
                                            <h6 class="card-title my-2 text-danger">
                                                {{ Str::limit($contents[5]['title'], 25) }}
                                            </h6>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($contents[5]['details']), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>

                    @forelse($topHomeCatData as $topCat)
                        <div class="category-wise-content">
                            <div class="row mt-4">
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="category-listing d-flex gap-3">
                                        <div class="top"></div>
                                        <div class="bottom"></div>
                                        <div class="category">
                                            <h5 class=""><a
                                                    href="{{ route('category-wise-content', $topCat->slug) }}"
                                                    class="text-decoration-none text-danger">{{ $topCat->name ?? '' }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="tab d-flex gap-3">
                                        @foreach ($topCat->subcategories as $subcategory)
                                            <a href="{{ route('cat-wise-sub-content', [$topCat->slug, $subcategory->name]) }}"
                                                class="text-danger">{{ $subcategory->name ?? '' }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- category wise content --}}
                            <div class="row">
                                {{-- left content --}}
                                <div class="col-sm-7 col-md-7 col-lg-8">
                                    @if (!empty($topCat['contents'][0]))
                                        @php $leftContent = $topCat['contents'][0]; @endphp
                                        <a href="{{ route('categoryWiseContentDetails', [$leftContent?->category?->slug, $leftContent?->subcategory?->name, $leftContent?->slug]) }}"
                                            class="text-decoration-none">
                                            <div class="card border-0 shadow-sm special-left-content">
                                                <img class="card-img-top"
                                                    src="{{ asset('/storage/assets/images/blogs/' . $leftContent['image']) }}"
                                                    alt="featured-image">
                                                <div class="card-body">
                                                    <small class="text-muted">
                                                        {{ bangla_date($leftContent['created_at']) }} | {{ $leftContent['author']['name'] ?? ''}}
                                                    </small>
                                                    <h4 class="card-title my-2 text-danger">
                                                        {{ Str::limit($leftContent['title'], 40) }}
                                                    </h4>
                                                    <p class="card-text text-muted">
                                                        {{ Str::limit(strip_tags($leftContent['details']), 400) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                </div>

                                {{-- middle content --}}
                                <div class="col-sm-5 col-md-5 col-lg-4">
                                    @foreach ($topCat['contents'] as $index => $content)
                                        @if ($index > 0 && $index <= 2)
                                            <a href="{{ route('categoryWiseContentDetails', [$content?->category?->slug, $content?->subcategory?->name, $content?->slug]) }}"
                                                class="text-decoration-none">
                                                <div
                                                    class="card border-0 shadow-sm special-middle-content {{ $index > 1 ? 'mt-2' : '' }}">
                                                    <img class="card-img-top"
                                                        src="{{ asset('/storage/assets/images/blogs/' . $content['image']) }}"
                                                        alt="featured-image">
                                                    <div class="card-body px-2">
                                                        <small class="text-muted">
                                                            {{ bangla_date($content['created_at']) }} | {{ $content['author']['name'] ?? ''}}
                                                        </small>
                                                        <h6 class="card-title my-2 text-danger">
                                                            {{ Str::limit($content['title'], 25) }}
                                                        </h6>
                                                        <p class="card-text text-muted">
                                                            {{ Str::limit(strip_tags($content['details']), 50) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @empty
                        <small class="text-danger">কোনো তথ্য পাওয়া যায়নি</small>
                    @endforelse

                </div>

                {{-- right content --}}
                <div class="col-lg-4">

                    {{-- polling vote --}}
                    @include('frontend.layouts.online_poll')


                    {{-- special-content-right-ad --}}
                    <div class="special-content-right-ad">
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
                                            <p><a href="{{ route('categoryWiseContentDetails', [$letestCont?->category?->slug, $letestCont?->subcategory?->name, $letestCont?->slug]) }}"
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
                                            <p><a href="{{ route('categoryWiseContentDetails', [$maxVisitor?->category?->slug, $maxVisitor?->subcategory?->name, $maxVisitor?->slug]) }}"
                                                    class="text-decoration-none text-danger">{{ Str::limit($maxVisitor->title, 40) }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- special-content-right-ad --}}
                    <div class="special-content-right-ad my-2">
                        <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_sidebar_ad_two) }}"
                            alt="special-content-right-bottom1-ad">
                    </div>

                    {{-- special-content-right-ad --}}
                    <div class="special-content-right-ad my-2">
                        <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_sidebar_ad_three) }}"
                            alt="special-content-right-bottom1-ad">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- header-top-ad --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-10">
                    <div class="header-bottom-ad">
                        <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_category_bottom) }}"
                            alt="header-bottom-ad">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            @foreach ($chunkedBottomCatData as $pair)
                <div class="row partitioning-column">
                    @foreach ($pair as $bottomHomeCatData)
                        <div class="col-lg-6">
                            <div class="category-wise-content">
                                <div class="row my-4">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <div class="category-listing d-flex gap-3">
                                            <div class="top"></div>
                                            <div class="bottom"></div>
                                            <div class="category">
                                                <h5><a href="{{ route('category-wise-content', $bottomHomeCatData->slug) }}"
                                                        class="text-decoration-none text-danger">
                                                        {{ $bottomHomeCatData->name }}
                                                    </a></h5>
                                            </div>
                                        </div>
                                        <div class="tab d-flex gap-3">
                                            @foreach ($bottomHomeCatData->subcategories as $sub)
                                                <a href="{{ route('cat-wise-sub-content', [$sub->category->slug, $sub->name]) }}"
                                                    class="text-danger">{{ $sub->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Left content --}}
                                    <div class="col-sm-7 col-md-7 col-lg-8 mt-2">
                                        @if ($bottomHomeCatData->contents->first())
                                            @php $mainContent = $bottomHomeCatData->contents->first(); @endphp
                                            <a href="{{ route('categoryWiseContentDetails', [$mainContent->category?->slug, $mainContent->subcategory?->name, $mainContent?->slug]) }}"
                                                class="text-decoration-none">
                                                <div class="card border-0 shadow-sm special-left-content">
                                                    <img class="card-img-top"
                                                        src="{{ asset('/storage/assets/images/blogs/' . $mainContent->image) }}"
                                                        alt="{{ $mainContent->title }}">
                                                    <div class="card-body">
                                                        <small class="text-muted">
                                                            {{ bangla_date($mainContent->created_at) }} | {{ $mainContent['author']['name'] ?? ''}}
                                                        </small>
                                                        <h4 class="card-title my-2 text-danger">
                                                            {{ Str::limit($mainContent->title, 25) }}
                                                        </h4>
                                                        <p class="card-text text-muted">
                                                             {{ Str::limit(strip_tags($content['details']), 170) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- Right contents --}}
                                    <div class="col-sm-5 col-md-5 col-lg-4">
                                        @foreach ($bottomHomeCatData->contents->slice(1, 2) as $content)
                                            <a href="{{ route('categoryWiseContentDetails', [$content->category?->slug, $content->subcategory?->name, $content?->slug]) }}"
                                                class="text-decoration-none">
                                                <div class="card border-0 shadow-sm special-middle-content mt-2">
                                                    <img class="card-img-top"
                                                        src="{{ asset('/storage/assets/images/blogs/' . $content->image) }}"
                                                        alt="{{ $content->title }}">
                                                    <div class="card-body px-2">
                                                        <small class="text-muted">
                                                            {{ bangla_date($content->created_at) }} | {{ $content['author']['name'] ?? ''}}
                                                        </small>
                                                        <h6 class="card-title my-2 text-danger">
                                                            {{ Str::limit($content->title, 30) }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- Bottom Category Ad  --}}
                    <div class="container-fluid my-3">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-10">
                                    <div class="header-bottom-ad">
                                        <img src="{{ asset('/storage/assets/images/ads/'.ad_management()->home_double_category_bottom) }}"
                                            alt="header-bottom-ad">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Gallary Photo --}}
    <div class="container-fluid photo-gallary py-5">
        <div class="container">
            @include('frontend.pages.home.photo_gallary')
        </div>
    </div>
@endsection

@push('appendJavascripts')
@endpush
