@extends('frontend.layouts.app')
@push('title')
    প্রোফাইল |
@endpush
@push('appendCss')
    <style>
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .card-outline-tabs .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        }

        .card-outline-tabs .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #dc3545;
            /* Bootstrap danger color */
        }

        .card-outline-tabs .nav-tabs .nav-link.active {
            border-color: #dee2e6 #dee2e6 #fff;
            background-color: #fff;
            color: #dc3545;
        }

        .profile-box {
            margin: 150px 0px;
        }

        .accordion-button.bg-danger:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.5);
            /* red shadow */
            border-color: #dc3545;
            background-color: #dc3545;
            color: #fff;
        }

        .accordion-button.bg-danger:not(.collapsed) {
            background-color: #dc3545;
            color: white;
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
    <div class="container-fluid">
        <div class="row g-4 d-flex justify-content-center profile-box">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                @if (session('message'))
                    <div class="col-12 d-flex justify-content-center">
                        <div class="alert alert-danger py-1 text-center">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="col-12 d-flex justify-content-center">
                        <div class="alert alert-danger py-1 text-center">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card card-outline-tabs border border-danger">
                    <div class="card-header d-flex justify-content-center p-0">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active text-danger" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="true">Profile Settings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-danger" id="avatar-tab" data-bs-toggle="tab"
                                    data-bs-target="#avatar" type="button" role="tab" aria-controls="avatar"
                                    aria-selected="false">Avatar Settings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-danger" id="comment-tab" data-bs-toggle="tab"
                                    data-bs-target="#comment" type="button" role="tab" aria-controls="comment"
                                    aria-selected="false">Comments</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-danger" id="logout-tab" data-bs-toggle="tab"
                                    data-bs-target="#logout" type="button" role="tab" aria-controls="logout"
                                    aria-selected="false">Logout</button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">

                                <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" name="name"
                                                    class="form-control form-control-danger @error('name') is-invalid @enderror mb-2 border-1 border-danger"
                                                    placeholder="Name" data-toggle="tooltip" data-placement="top"
                                                    title="Name" value="{{ $user->name }}" required />

                                                <input type="email" name="email"
                                                    class="form-control form-control-danger @error('email') is-invalid @enderror mb-2 border-1 border-danger"
                                                    placeholder="Email" data-toggle="tooltip" data-placement="top"
                                                    title="Email" value="{{ $user->email }}" required />

                                                <input type="text" name="pin"
                                                    class="form-control form-control-danger @error('pin') is-invalid @enderror mb-2 border-1 border-danger"
                                                    placeholder="Password" data-toggle="tooltip" data-placement="top"
                                                    title="Password" value="{{ $user->pin }}" required />


                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-sm btn-danger">Profile
                                                        Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                                <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-2 d-flex justify-content-center">
                                                <img src="{{ asset('/storage/assets/images/profile/' . $user->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="col-12">
                                                <input type="file" name="image"
                                                    class="form-control form-control-danger @error('image') is-invalid @enderror mb-2 border-1 border-danger"
                                                    placeholder="Image" data-toggle="tooltip" data-placement="top"
                                                    title="Image" required />
                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-sm btn-danger">Avatar
                                                        Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="accordion" id="accordionExample">
                                                @forelse ($user->comments as $comment)
                                                    <div class="accordion-item border border-danger mb-2">
                                                        <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                                            <button
                                                                class="accordion-button bg-danger text-white {{ !$loop->first ? 'collapsed' : '' }}"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $loop->index }}"
                                                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                                aria-controls="collapse{{ $loop->index }}">
                                                                {{ $comment->content->title ?? 'Untitled' }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $loop->index }}"
                                                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                            aria-labelledby="heading{{ $loop->index }}"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                {{ $comment->comment ?? 'No comment provided.' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <h6 class="text-danger text-center">No data found</h6>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="logout-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                                        </div>
                                    </div>
                                </div>
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
