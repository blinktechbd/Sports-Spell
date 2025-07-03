<!DOCTYPE html>
<html lang="bn">

<head>
    @include('frontend.layouts.head')
</head>

<body>
    <div class="container-fluid bg-danger sticky-header">
        <div class="container">
            @include('frontend.layouts.header')
        </div>
    </div>

    <div class="wrapper">
        @yield('content')
    </div>

    <div class="container-fluid footer">
        @include('frontend.layouts.footer')
    </div>
    @include('frontend.layouts.scripts')
</body>

</html>
