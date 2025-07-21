<!DOCTYPE html>
<html lang="en">

<head>
    @include('beckend.layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">
        @include('beckend.layouts.header')
        @include('beckend.layouts.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @stack('breadcumb')
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('admin-content')
                </div>
            </section>
        </div>
        <footer class="main-footer bg-danger">
            @include('beckend.layouts.footer')
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    @include('beckend.layouts.scripts')
</body>

</html>
