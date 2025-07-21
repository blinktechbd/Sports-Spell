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
                <h1 class="m-0 text-danger">Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('users.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Create</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">User Create</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name"
                                            class="form-control form-control-danger @error('name') is-invalid @enderror"
                                            placeholder="User Name" data-toggle="tooltip" data-placement="top"
                                            title="User Name" value="{{ old('name') }}"/>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" name="email"
                                            class="form-control form-control-danger @error('email') is-invalid @enderror"
                                            placeholder="User Email" data-toggle="tooltip" data-placement="top"
                                            title="User Email" value="{{ old('email') }}"/>
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="input-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-danger @error('password') is-invalid @enderror"
                                                placeholder="User Password" data-toggle="tooltip" data-placement="top"
                                                title="User Password"/>

                                            <div class="input-group-append">
                                                <span class="input-group-text bg-danger" id="togglePassword"
                                                    style="cursor: pointer;">
                                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="file" name="image"
                                            class="form-control form-control-danger @error('image') is-invalid @enderror"
                                            placeholder="User Image" data-toggle="tooltip" data-placement="top"
                                            title="User Image" accept=".jpeg,.jpg,.png" />
                                        @error('image')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="User Type">
                                            <select name="is_role" id="isRole"
                                                class="form-control select2 select2-danger @error('is_role') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">User Type Select</option>
                                                <option value="superadmin" {{ old('is_role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                                <option value="admin" {{ old('is_role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="editor" {{ old('is_role') == 'editor' ? 'selected' : '' }}>Editor</option>
                                                <option value="user" {{ old('is_role') == 'user' ? 'selected' : '' }}>User</option>
                                            </select>
                                            @error('is_role')
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
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                const input = $('#password');
                const icon = $('#eyeIcon');
                const isPassword = input.attr('type') === 'password';
                input.attr('type', isPassword ? 'text' : 'password');
                icon.toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>
@endpush
