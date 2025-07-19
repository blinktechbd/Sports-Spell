@extends('beckend.layouts.app')
@push('title')
    Create
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
                <h1 class="m-0 text-danger">Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('categories.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Create</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Category Create</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Category Type">
                                            <select name="type" id="type"
                                                class="form-control select2 select2-danger @error('type') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="default">Default Category</option>
                                                <option value="special">Special Category</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="name"
                                            class="form-control form-control-danger @error('name') is-invalid @enderror"
                                            placeholder="Category Name" data-toggle="tooltip" data-placement="top"
                                            title="Category Name" />
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
