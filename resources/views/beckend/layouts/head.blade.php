<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@stack('title') | Sports Spell</title>
<link rel="icon" href="{{ asset('/storage/assets/images/logo/' . getSetting()->favicon) }}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="title" content="AdminLTE 4 | Login Page" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('/storage/admin/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/admin/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style>
    .layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]) {
        background-color: #DC3545;
    }
    [class*=sidebar-dark-] {
        background-color: #DC3545;
        color:white;
    }
    [class*=sidebar-dark-] .sidebar a {
        color: #ffffff;
    }
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
        color: #ffffff;
    }
    [class*=sidebar-dark] .brand-link {
        border-bottom: 1px solid #DC3545;
    }
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
        background-color: #FFFFFF1A;
        color: #ffffff;
    }
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #FFFFFF1A;
        color: #ffffff;
    }
</style>
@stack('adminAppendCss')
