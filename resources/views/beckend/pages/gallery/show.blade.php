@extends('beckend.layouts.app')
@push('title')
    Show
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
                <h1 class="m-0 text-danger">Galleries</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('galleries.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Show</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card card-danger card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title text-danger">Gallery Edit</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="text" name="title"
                                        class="form-control form-control-danger @error('title') is-invalid @enderror"
                                        placeholder="Gallery Title" data-toggle="tooltip" data-placement="top"
                                        title="Gallery Title" value="{{ old('title', $gallery->title) }}" />
                                    @error('title')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <div>
                                        <img src="{{ asset('/storage/assets/images/gallery/' . ($gallery->image ?? 'gallery.png')) }}"
                                            alt="gallery-image" class="img-fluid mb-2"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>

                                </div>
                                <div class="row mb-3 d-flex align-items-center">
                                    @foreach ($gallery->galleryItems as $value)
                                        <div class="col-3">
                                            <img src="{{ asset('/storage/assets/images/gallery/' . ($value->image_name ?? 'gallery.png')) }}" alt="" style="width:100%">
                                            <small>{{ $value->caption }}</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('galleries.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('adminAppendScripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
