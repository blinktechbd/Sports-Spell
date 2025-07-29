@extends('frontend.layouts.app')
@push('title')
    সাইন-আপ |
@endpush
@push('appendCss')
    <style>
        .signup-box{
            margin: 150px 0px;
        }
        .card{
            background: linear-gradient(135deg, #FEF6F5, #FFCDD2);
        }
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
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
        <div class="container">
            <div class="signup-box row d-flex justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card border-1 border-danger">
                        <div class="card-body signup-card-body">
                            <div class="text-center mb-2">
                                {{-- <img class="" src="{{ asset('/storage/assets/images/logo/logo.png') }}" alt="Sports Spell"> --}}
                                <h5 class="fw-bold my-3 text-danger">সাইন-আপ করুন</h5>
                            </div>
                            <form action="{{ route('userSignUp') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control form-control-danger @error('name') is-invalid @enderror border-1 border-danger" placeholder="Name" data-toggle="tooltip" data-placement="top"
                                            title="Enter Your Name" required/>

                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control form-control-danger @error('email') is-invalid @enderror border-1 border-danger" placeholder="Email" data-toggle="tooltip" data-placement="top"
                                            title="Enter Your Email" required/>

                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control form-control-danger @error('password') is-invalid @enderror border-1 border-danger" placeholder="Password" data-toggle="tooltip" data-placement="top"
                                            title="Enter Your Password" required/>

                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" name="image" class="form-control form-control-danger @error('image') is-invalid @enderror border-1 border-danger" placeholder="image" data-toggle="tooltip" data-placement="top"
                                            title="Select Your Profile Image (optional)" accept=".png,.jpeg,.jpg"/>

                                    @error('image')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-sm btn-danger w-100">সাইন-আপ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('appendJavascripts')
@endpush
