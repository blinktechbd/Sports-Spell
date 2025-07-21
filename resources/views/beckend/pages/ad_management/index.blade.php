@extends('beckend.layouts.app')
@push('title')
    Ad Management
@endpush
@push('adminAppendCss')
    <style>
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Admangement</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active text-danger">Upload</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-8">
                    <form action="{{ route('admanagements') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Ad Upload</div>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_special_header_top" data-toggle="tooltip" data-placement="top"
                                            title="Special Header Top" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100" src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_special_header_top ?? '')) }}" alt="special-header-top-ad">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_special_header_bottom" data-toggle="tooltip" data-placement="top"
                                            title="Special Header Bottom" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100" src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_special_header_bottom ?? '')) }}" alt="special-header-bottom-ad">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_category_bottom" data-toggle="tooltip" data-placement="top"
                                            title="Category Bottom" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100"  src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_category_bottom ?? '')) }}" alt="category-bottom-ad">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_double_category_bottom" data-toggle="tooltip" data-placement="top"
                                            title="Double Category Bottom" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100" src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_double_category_bottom ?? '')) }}" alt="double-category-bottom-ad">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_sidebar_ad_one" data-toggle="tooltip" data-placement="top"
                                            title="Sidebar Ad One" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100" src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_sidebar_ad_one ?? '')) }}" alt="sidebar-ad-one-ad">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_sidebar_ad_two" data-toggle="tooltip" data-placement="top"
                                            title="Sidebar Ad Two" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100" src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_sidebar_ad_two ?? '')) }}" alt="sidebar-ad-two-ad">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-11">
                                        <input type="file" name="home_sidebar_ad_three" data-toggle="tooltip" data-placement="top"
                                            title="Sidebar Ad Three" class="form-control form-control-danger" accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                    <div class="col-1">
                                        <img class="w-100" src="{{ asset('/storage/assets/images/ads/'.($adManagement->home_sidebar_ad_three ?? '')) }}" alt="sidebar-ad-three-ad">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('adminAppendScripts')
<script>

</script>
@endpush
