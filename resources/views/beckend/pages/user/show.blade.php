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
        .content-image {
            width: 100px;
            height: 100px;
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
                    <li class="breadcrumb-item active text-danger">Show</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('users.show', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">User Show</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name"
                                            class="form-control form-control-danger @error('name') is-invalid @enderror"
                                            placeholder="User Name" data-toggle="tooltip" data-placement="top"
                                            title="User Name" value="{{ old('name', $user->name) }}" readonly />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="email"
                                            class="form-control form-control-danger @error('email') is-invalid @enderror"
                                            placeholder="User Email" data-toggle="tooltip" data-placement="top"
                                            title="User Email" value="{{ old('email', $user->email) }}" readonly />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="input-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-danger @error('password') is-invalid @enderror"
                                                placeholder="User Password" data-toggle="tooltip" data-placement="top"
                                                title="User Password" value="{{ old('pin', $user->pin) }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div>
                                            <img class="content-image"
                                                src="{{ asset('/storage/assets/images/profile/' . ($user->image ?? 'profile.png')) }}"
                                                alt="profile-image">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="User Type">
                                            <select name="is_role" id="category"
                                                class="form-control select2 select2-danger @error('is_role') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;" disabled>
                                                <option value="">User Type Select</option>
                                                <option value="superadmin" @if (old('is_role', $user->is_role) == 'superadmin') selected @endif>Superadmin</option>
                                                <option value="admin" @if (old('is_role', $user->is_role) == 'admin') selected @endif>Admin</option>
                                                <option value="editor" @if (old('is_role', $user->is_role) == 'editor') selected @endif>Editor</option>
                                                <option value="user" @if (old('is_role', $user->is_role) == 'user') selected @endif>User</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Back to lists</a>
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
