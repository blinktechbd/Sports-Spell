@extends('beckend.layouts.app')
@push('title')
    Create
@endpush
@push('adminAppendCss')
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
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

        .bootstrap-tagsinput {
            width: 100% !important;
            min-height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            background-color: #fff;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
            background-color: #dc3545;
            padding: 0.2em 0.5em;
            border-radius: 3px;
        }
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Contents</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('contents.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Create</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ route('contents.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Content Create</div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Category Name">
                                            <select name="category_id" id="category"
                                                class="form-control select2 select2-danger @error('category_id') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Category Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Subcategory Name">
                                            <select name="subcategory_id" id="subcategory"
                                                class="form-control select2 select2-danger @error('subcategory_id') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Select Subcategory</option>
                                            </select>
                                            @error('subcategory_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="title"
                                            class="form-control form-control-danger @error('title') is-invalid @enderror"
                                            placeholder="Content Title" data-toggle="tooltip" data-placement="top"
                                            title="Content Title" />
                                        @error('title')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="image"
                                                    class="form-control form-control-danger custom-file-input"
                                                    id="customFile" data-toggle="tooltip" data-placement="top"
                                                    title="Content Image">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Content Details">
                                            <textarea name="details" class="form-control" id="summernote" placeholder="Content Details"></textarea>
                                            @error('details')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Content input tags">
                                            <input type="text" id="tags" name="tags" class="form-control"
                                                data-role="tagsinput" placeholder="Enter content input tags">
                                            @error('tags')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
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
    <script src="{{ asset('/storage/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('/storage/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            bsCustomFileInput.init();
            $('#summernote').summernote({
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24']
            });
            $('#category').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/admin/get-subcategories/' + categoryID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subcategory').empty().append(
                                '<option value="">Select Subcategory</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Unable to load subcategories.');
                        }
                    });
                } else {
                    $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>
@endpush
