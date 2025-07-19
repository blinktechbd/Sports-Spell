@extends('beckend.layouts.app')
@push('title')
    Profile Settings
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
                <h1 class="m-0 text-danger">Profile Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active text-danger">Profile Settings</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('profile.settings',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Profile Settings</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name"
                                            class="form-control form-control-danger @error('name') is-invalid @enderror"
                                            placeholder="Profile Name" data-toggle="tooltip" data-placement="top"
                                            title="Profile Name" value="{{ $user->name }}"/>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" name="email"
                                            class="form-control form-control-danger @error('email') is-invalid @enderror"
                                            placeholder="Profile Email" data-toggle="tooltip" data-placement="top"
                                            title="Profile Email" value="{{ $user->email }}"/>
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
                                                title="User Password" value="{{ old('pin', $user->pin) }}"/>

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
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Save Settings</button>
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
