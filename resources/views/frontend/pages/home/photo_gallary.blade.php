<div class="row partitioning-column">
    <div class="col-lg-12">
        <div class="category-wise-content">
            <div class="row my-4">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div class="category-listing d-flex gap-3">
                        <div class="top"></div>
                        <div class="bottom"></div>
                        <div class="category">
                            <h5 class=""><a href="{{ route('photoGalleries') }}"
                                    class="text-decoration-none text-danger">ফটো গ্যালারির</a>
                            </h5>
                        </div>
                    </div>
                    <div class="tab d-flex gap-3">
                        <a href="{{ route('photoGalleries') }}" class="text-danger">সবগুলো দেখুন</a>
                    </div>
                </div>
            </div>

            <div class="row">
                @if ($gallaries->first())
                    @php $leftContent = $gallaries->first(); @endphp
                    {{-- left content --}}
                    <div class="col-lg-6">
                        <a href="{{ route('photoGalleryDetails', $leftContent->id) }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm special-left-content mt-2">
                                <img class="card-img-top"
                                    src="{{ asset('/storage/assets/images/gallery/' . $leftContent->image) }}"
                                    alt="{{ $leftContent->title }}">
                                <div class="card-body px-2 py-2 m-0">
                                    <h5 class="card-title my-3 text-danger">
                                        {{ Str::limit($leftContent->title, 40) }}
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                {{-- right content --}}
                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($gallaries->slice(1) as $rightContent)
                            <div class="col-lg-6">
                                <a href="{{ route('photoGalleryDetails', $rightContent->id) }}"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm special-left-content mt-2">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/assets/images/gallery/' . $rightContent->image) }}"
                                            alt="image-1">
                                        <div class="card-body px-2 py-0 m-0">
                                            <h6 class="card-title my-2 text-danger">
                                               {{ Str::limit($rightContent->title, 30) }}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
