@extends('beckend.layouts.app')
@push('title')
    Today Sport Edit
@endpush
@push('adminAppendCss')
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

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
                <h1 class="m-0 text-danger">Today Sport Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('today-sports.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Edit</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('today-sports.update', $todaySport->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Today Sport Edit</div>
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
                                                    <option value="{{ $category->id }}" @if($category->id === $todaySport->category_id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="match_type"
                                                class="form-control form-control-danger @error('match_type') is-invalid @enderror"
                                                placeholder="Match Type" data-toggle="tooltip" data-placement="top"
                                                title="Match Type Like (ODI Match...)" value="{{ $todaySport->match_type }}"/>
                                            @error('match_type')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="match_title"
                                                class="form-control form-control-danger @error('match_title') is-invalid @enderror"
                                                placeholder="Match Title" data-toggle="tooltip" data-placement="top"
                                                title="Match Title" value="{{ $todaySport->match_title }}"/>
                                            @error('match_title')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="match_stadium"
                                                class="form-control form-control-danger @error('match_stadium') is-invalid @enderror"
                                                placeholder="Match Venue" data-toggle="tooltip" data-placement="top"
                                                title="Match Venue" value="{{ $todaySport->match_stadium }}"/>
                                            @error('match_stadium')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <input type="datetime-local" id="datetime" name="match_time"
                                                class="form-control form-control-danger @error('match_time') is-invalid @enderror"
                                                placeholder="Match Time" data-toggle="tooltip" data-placement="top"
                                                title="Match Time (Bangladesh Time)" value="{{ $todaySport->match_time }}"/>
                                            @error('match_time')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <select name="status" class="form-control form-control-danger">
                                                <option value="active" @if($todaySport->status == 'active') selected @endif>Active</option>
                                                <option value="inactive" @if($todaySport->status == 'inactive') selected @endif>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <p class="text-center text-danger"> ----------------- VOTE OPTIONS [Multiple Add &
                                            Remove] -----------------</p>
                                            <div class="row my-2 d-flex justify-content-end">
                                                <div class="col-1">
                                                    <a href="javascript:void(0)" class="btn btn-outline-light w-100 bg-success vote-option">+</a>
                                                </div>
                                            </div>

                                            @php
                                                $options = old('option') ?? $todaySport->todaySportOption->pluck('option_name')->toArray();
                                            @endphp

                                            @foreach ($options as $index => $value)
                                                <div class="row mb-3">
                                                    <div class="col-11">
                                                        <input type="text" name="option[]"
                                                            value="{{ $value }}"
                                                            class="form-control @error('option.' . $index) is-invalid @enderror"
                                                            placeholder="Option"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Option" />
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="javascript:void(0)" class="btn btn-outline-light w-100 bg-danger exists-prvious-data remove-option">-</a>
                                                    </div>
                                                    @error('option.')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endforeach

                                    </div>
                                    <div class="col-12 append-option">

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
    <script src="{{ asset('/storage/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
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

        $(document).ready(function() {
            $('.vote-option').click(function() {
                var html = `
                <div class="row mb-3 option-row">
                    <div class="col-11">
                        <input type="text" name="option[]" class="form-control" placeholder="Option" />
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-outline-light w-100 bg-danger remove-option">-</button>
                    </div>
                </div>`;
                $('.append-option').append(html);
            });
        });
        // Remove button
        $(document).on('click', '.remove-option', function() {
            $(this).closest('.row').remove();
        });
    </script>
@endpush
