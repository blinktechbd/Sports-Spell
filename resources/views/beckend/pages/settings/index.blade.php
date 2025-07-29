@extends('beckend.layouts.app')
@push('title')
    Settings
@endpush
@push('adminAppendCss')
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .select2-container .select2-selection--single {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #cfc9c9;
        }
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('settings') }}">Settings</a></li>
                    <li class="breadcrumb-item active text-danger">Settings</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-6">
                    <div class="card card-danger card-outline card-outline-tabs">
                        <div class="card-header d-flex justify-content-center p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-danger" id="custom-tabs-four-site-settings-tab"
                                        data-toggle="pill" href="#custom-tabs-four-site-settings" role="tab"
                                        aria-controls="custom-tabs-four-site-settings" aria-selected="true">Site
                                        Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" id="custom-tabs-four-meta-settings-tab"
                                        data-toggle="pill" href="#custom-tabs-four-meta-settings" role="tab"
                                        aria-controls="custom-tabs-four-meta-settings" aria-selected="false">Meta
                                        settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" id="custom-tabs-social-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-social-settings" role="tab"
                                        aria-controls="custom-tabs-social-settings" aria-selected="false">Social
                                        Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" id="custom-tabs-page-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-page-settings" role="tab"
                                        aria-controls="custom-tabs-page-settings" aria-selected="false">Page Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-site-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-site-settings-tab">
                                    <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="email" name="email"
                                                        class="form-control form-control-danger @error('email') is-invalid @enderror"
                                                        placeholder="Email" data-toggle="tooltip" data-placement="top"
                                                        title="Email" value="{{ $setting->email }}"/>

                                                    <input type="text" name="address"
                                                        class="form-control form-control-danger @error('address') is-invalid @enderror mt-2"
                                                        placeholder="Address" data-toggle="tooltip" data-placement="top"
                                                        title="Address" value="{{ $setting->address }}"/>

                                                    <input type="text" name="site_title"
                                                        class="form-control form-control-danger @error('site_title') is-invalid @enderror mt-2"
                                                        placeholder="Site Title" data-toggle="tooltip" data-placement="top"
                                                        title="Site Title" value="{{ $setting->site_title }}"/>

                                                    <input type="text" name="site_desc"
                                                        class="form-control form-control-danger @error('site_desc') is-invalid @enderror mt-2"
                                                        placeholder="Site Description" data-toggle="tooltip"
                                                        data-placement="top" title="Site Description" value="{{ $setting->site_desc }}"/>
                                                    <div>
                                                        <img src="{{ asset('/storage/assets/images/logo/' . $setting->logo) }}" alt="logo"
                                                            class="img-fluid" style="max-width: 155px; max-height: 50px;">
                                                    </div>
                                                    <input type="file" name="logo"
                                                        class="form-control form-control-danger @error('logo') is-invalid @enderror mt-2"
                                                        placeholder="Logo" data-toggle="tooltip" data-placement="top"
                                                        title="Logo" accept=".png, .jpg, .jpeg" />
                                                    <div class="mt-2">
                                                        <img src="{{ asset('/storage/assets/images/logo/' . $setting->favicon) }}" alt="favicon"
                                                            class="img-fluid" style="max-width: 100%;">
                                                    </div>
                                                    <input type="file" name="favicon"
                                                        class="form-control form-control-danger @error('favicon') is-invalid @enderror mt-2"
                                                        placeholder="Favicon" data-toggle="tooltip" data-placement="top"
                                                        title="Favicon" accept=".png, .jpg, .jpeg" />

                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="submit" class="btn btn-sm btn-danger">Settings
                                                            Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-meta-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-meta-settings-tab">
                                    <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" name="meta_title"
                                                        class="form-control form-control-danger @error('meta_title') is-invalid @enderror"
                                                        placeholder="Meta Title" data-toggle="tooltip"
                                                        data-placement="top" title="Meta Title" value="{{ $setting->meta_title }}"/>

                                                    <textarea name="meta_desc" class="form-control form-control-danger mt-2" id=""
                                                        placeholder="Meta Description" data-toggle="tooltip" data-placement="top" title="Meta Description">{{ $setting->meta_desc }}</textarea>
                                                    <div>
                                                        <img src="{{ asset('/storage/assets/images/logo/' . $setting->meta_img) }}" alt="meta-image"
                                                            class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                                    </div>
                                                    <input type="file" name="meta_img"
                                                        class="form-control form-control-danger @error('meta_img') is-invalid @enderror mt-2"
                                                        placeholder="Meta Image" data-toggle="tooltip"
                                                        data-placement="top" title="Meta Image"
                                                        accept=".png, .jpg, .jpeg" />

                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="submit" class="btn btn-sm btn-danger">Settings
                                                            Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-social-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-social-settings-tab">
                                    <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" name="social_fb_icon"
                                                        class="form-control form-control-danger @error('social_fb_icon') is-invalid @enderror"
                                                        placeholder="Facebook Icon" data-toggle="tooltip"
                                                        data-placement="top" title="Facebook Icon" value="{{ $setting->social_fb_icon }}"/>

                                                    <input type="text" name="social_fb"
                                                        class="form-control form-control-danger @error('social_fb') is-invalid @enderror mt-2"
                                                        placeholder="Facebook URL" data-toggle="tooltip"
                                                        data-placement="top" title="Facebook URL" value="{{ $setting->social_fb }}" />

                                                    <input type="text" name="social_tw_icon"
                                                        class="form-control form-control-danger @error('social_tw_icon') is-invalid @enderror mt-2"
                                                        placeholder="Twitter Icon" data-toggle="tooltip"
                                                        data-placement="top" title="Twitter Icon" value="{{ $setting->social_tw_icon }}" />

                                                    <input type="text" name="social_tw"
                                                        class="form-control form-control-danger @error('social_tw') is-invalid @enderror mt-2"
                                                        placeholder="Twitter URL" data-toggle="tooltip"
                                                        data-placement="top" title="Twitter URL" value="{{ $setting->social_tw }}" />

                                                    <input type="text" name="social_ln_icon"
                                                        class="form-control form-control-danger @error('social_ln_icon') is-invalid @enderror mt-2"
                                                        placeholder="LinkedIn Icon" data-toggle="tooltip"
                                                        data-placement="top" title="LinkedIn Icon" value="{{ $setting->social_ln_icon }}" />

                                                    <input type="text" name="social_ln"
                                                        class="form-control form-control-danger @error('social_ln') is-invalid @enderror mt-2"
                                                        placeholder="LinkedIn URL" data-toggle="tooltip"
                                                        data-placement="top" title="LinkedIn URL" value="{{ $setting->social_ln }}" />

                                                    <input type="text" name="social_yt_icon"
                                                        class="form-control form-control-danger @error('social_yt_icon') is-invalid @enderror mt-2"
                                                        placeholder="YouTube Icon" data-toggle="tooltip"
                                                        data-placement="top" title="YouTube Icon" value="{{ $setting->social_yt_icon }}" />

                                                    <input type="text" name="social_yt"
                                                        class="form-control form-control-danger @error('social_yt') is-invalid @enderror mt-2"
                                                        placeholder="YouTube URL" data-toggle="tooltip"
                                                        data-placement="top" title="YouTube URL" value="{{ $setting->social_yt }}" />



                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="submit" class="btn btn-sm btn-danger">Settings
                                                            Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-page-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-page-settings-tab">
                                    <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group" data-toggle="tooltip" data-placement="top" title="About Details">
                                                        <label for="" class="text-danger">About</label>
                                                        <textarea name="about" class="form-control summernote" id="" placeholder="About Details">
                                                            {{ $setting->about }}
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group" data-toggle="tooltip" data-placement="top" title="Contact Details">
                                                        <label for="" class="text-danger">Contact</label>
                                                        <textarea name="contact" class="form-control summernote" id="" placeholder="Contact Details">
                                                            {{ $setting->contact }}
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group" data-toggle="tooltip" data-placement="top" title="Privacy Policy Details">
                                                        <label for="" class="text-danger">Privacy Policy</label>
                                                        <textarea name="privacy_policy" class="form-control summernote" id="" placeholder="Privacy Policy Details">
                                                            {{ $setting->privacy_policy }}
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group" data-toggle="tooltip" data-placement="top" title="Terms and Policies Details">
                                                        <label for="" class="text-danger">Terms Policies</label>
                                                        <textarea name="terms_policy" class="form-control summernote" id="" placeholder="Terms and Policies Details">
                                                            {{ $setting->terms_policy }}
                                                        </textarea>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="submit" class="btn btn-sm btn-danger">Settings
                                                            Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('adminAppendScripts')
    <script src="{{ asset('/storage/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.summernote').summernote({
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20','22','24']
            });
        });
    </script>
@endpush
