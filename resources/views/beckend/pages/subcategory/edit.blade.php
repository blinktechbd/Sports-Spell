@extends('beckend.layouts.app')
@push('title')
    Edit
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
                <h1 class="m-0 text-danger">Subcategories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('subcategories.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Edit</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Subcategory Edit</div>
                            </div>
                             <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top" title="Category Name">
                                            <select name="category_id" class="form-control select2 select2-danger @error('category_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Category Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="name"
                                            class="form-control form-control-danger @error('name') is-invalid @enderror"
                                            placeholder="Subcategory Name" data-toggle="tooltip" data-placement="top"
                                            title="Subcategory Name" value="{{ $subcategory->name ?? '' }}"/>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
    $(function () {
        $('.select2').select2()
    });
</script>
@endpush
