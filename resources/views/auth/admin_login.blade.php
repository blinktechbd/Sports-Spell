<!doctype html>
<html lang="en">
<head>
    @push('title')
        Admin Login
    @endpush
    @include('beckend.layouts.head')
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="text-center">
                    <img class="" src="{{ asset('/storage/assets/images/logo/'.getSetting()->logo) }}" alt="Sports Spell">
                </div>
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control form-control-danger @error('email') is-invalid @enderror" placeholder="Email" />
                        <div class="input-group-text"><span class="bi bi-envelope text-danger"></span></div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control form-control-danger @error('password') is-invalid @enderror" placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill text-danger"></span></div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-sm btn-danger w-100">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('beckend.layouts.scripts')
</body>
</html>
