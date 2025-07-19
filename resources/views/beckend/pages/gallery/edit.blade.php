@extends('beckend.layouts.app')
@push('title')
    Edit
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
                <h1 class="m-0 text-danger">Gallery</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('galleries.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Create</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('galleries.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                            title="Gallery Title" value="{{ old('title', $gallery->title) }}"/>
                                        @error('title')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div>
                                            <img src="{{ asset('/storage/assets/images/gallery/' . ($gallery->image ?? 'gallery.png')) }}" alt="gallery-image"
                                                 style="width: 100px;">
                                        </div>
                                        <input type="file" name="image"
                                            class="form-control form-control-danger @error('image') is-invalid @enderror"
                                            placeholder="Gallery Image" data-toggle="tooltip" data-placement="top"
                                            title="Gallery Image" accept=".jpeg,.jpg,.png" />
                                        @error('image')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <p class="text-center text-danger"> ----------------- Multiple image with caption -----------------</p>
                                            <div class="row my-2 d-flex justify-content-end">
                                                <div class="col-1">
                                                    <a href="javascript:void(0)" class="btn btn-outline-light w-100 bg-success image-option">+</a>
                                                </div>
                                            </div>


                                            <div class="row mb-3 d-flex align-items-center">
                                                @foreach ($gallery->galleryItems as $value)
                                                    <div class="col-3">
                                                        <img src="{{ asset('/storage/assets/images/gallery/' . ($value->image_name ?? 'gallery.png')) }}" alt="" style="width:100%">
                                                        <small>{{ $value->caption }}</small>
                                                        <a href="{{ route('deleteGalleryItem',$value->id) }}" class="btn btn-sm btn-outline-light w-100 bg-danger exists-prvious-data remove-image-option">Delete</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                    </div>
                                    <div class="col-12 append-image-option">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Update</button>
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
        $(document).ready(function() {
            $('.image-option').click(function() {
                var html = `
                <div class="row mb-3 option-row">
                    <div class="col-6">
                        <input type="file" name="images[]"
                            class="form-control"
                            placeholder="Image Name"
                            data-toggle="tooltip" data-placement="top"
                            title="Image Name" accept=".jpeg,.jpg,.png" required/>
                    </div>
                    <div class="col-5">
                        <input type="text" name="caption[]"
                            class="form-control"
                            placeholder="Caption Name"
                            data-toggle="tooltip" data-placement="top"
                            title="Caption Name" required/>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-outline-light w-100 bg-danger remove-image-option">-</button>
                    </div>
                </div>`;
                $('.append-image-option').append(html);
            });
        });
        // Remove button
        $(document).on('click', '.remove-image-option', function() {
            $(this).closest('.row').remove();
        });
    </script>
@endpush
