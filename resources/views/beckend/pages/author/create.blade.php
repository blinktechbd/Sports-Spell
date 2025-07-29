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
                <h1 class="m-0 text-danger">Authors</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('authors.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Create</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Author Create</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name"
                                            class="form-control form-control-danger @error('name') is-invalid @enderror"
                                            placeholder="Author Name" data-toggle="tooltip" data-placement="top"
                                            title="Author Name" value="{{ old('name') }}"/>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="file" name="image"
                                            class="form-control form-control-danger @error('image') is-invalid @enderror"
                                            placeholder="Author Name" data-toggle="tooltip" data-placement="top"
                                            title="Author Image" value="{{ old('image') }}"/>
                                        @error('image')
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
@push('adminAppendScripts')
    <script>

    </script>
@endpush
