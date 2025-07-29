@extends('beckend.layouts.app')
@push('title')
    Users
@endpush
@push('adminAppendCss')
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <style>
        .table thead {
            background: #FEF6F5;
        }

        .table td,
        .table th {
            padding: 5px 10px;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .page-link {
            color: #dc3545;
        }

        .page-link:hover {
            color: #dc3545;
        }
        .content-image{
            width:32px;
            height: 32px;
            border-radius: 50%;
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
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('users.create') }}">Create</a></li>
                    <li class="breadcrumb-item active text-danger">Lists</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="card card-danger card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title text-danger">User Lists</div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto; width:100%;">
                                <table id="usersTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>IMAGE</th>
                                            <th>ROLE</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name ?? '' }}</td>
                                                <td>{{ $user->email ?? '' }}</td>
                                                <td>
                                                    @if($user->facebook_id || $user->google_id)
                                                        <img class="content-image" src="{{ $user->image }}" alt="profile-image">
                                                    @else
                                                        <img class="content-image" src="{{ asset('/storage/assets/images/profile/' . ($user->image ?? 'profile.png')) }}" alt="profile-image">
                                                    @endif
                                                </td>
                                                <td><span class="badge badge-info">{{ Str::ucfirst($user->is_role ?? '') }}</span></td>
                                                <td class="d-flex justify-content-center">
                                                    @if(Auth::check() && Auth::user()->is_role == 'superadmin')

                                                        <a href="{{ route('users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="User Edit"><i class="fa fa-edit text-danger"></i></a>
                                                        <a class="px-3" href="{{ route('users.show',$user->id) }}" data-toggle="tooltip" data-placement="top" title="User Show"><i class="fa fa-eye text-danger"></i></a>

                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link text-danger p-0" data-toggle="tooltip" data-placement="top" title="User Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    @elseif(Auth::user()->is_role == 'admin')
                                                        @if($user->is_role == 'editor')
                                                            <a href="{{ route('users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="User Edit"><i class="fa fa-edit text-danger"></i></a>
                                                            <a class="px-3" href="{{ route('users.show',$user->id) }}" data-toggle="tooltip" data-placement="top" title="User Show"><i class="fa fa-eye text-danger"></i></a>
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link text-danger p-0" data-toggle="tooltip" data-placement="top" title="User Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @else
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('adminAppendScripts')
    <script src="{{ asset('/storage/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#usersTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "pageLength": 25
            })
        });
    </script>
@endpush
