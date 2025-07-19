@extends('beckend.layouts.app')
@push('title')
    Today Sports
@endpush
@push('adminAppendCss')
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/storage/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

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
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Today Sports</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('today-sports.create') }}">Create</a></li>
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
                            <div class="card-title text-danger">Today Sport Lists</div>
                        </div>
                        <div class="card-body">
                            <table id="todaySportsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>CATEGORY</th>
                                        <th>MATCH TYPE</th>
                                        <th>MATCH TITLE</th>
                                        <th>VENUE</th>
                                        <th>Date</th>
                                        <th>TIME</th>
                                        <th>DAY</th>
                                        <th>TOTAL VOTE</th>
                                        <th>Status</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todaySports as $todaySport)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $todaySport->category->name ?? '' }}</td>
                                            <td>{{ $todaySport->match_type ?? '' }}</td>
                                            <td>{{ Str::limit($todaySport->match_title, 20) ?? '' }}</td>
                                            <td>{{ Str::limit($todaySport->match_stadium, 20) ?? '' }}</td>
                                            <td>{{ Carbon\Carbon::parse($todaySport->match_time)->format('d M Y') ?? '' }}</td>
                                            <td>{{ Carbon\Carbon::parse($todaySport->match_time)->format('h:i A') ?? '' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($todaySport->match_time)->locale('bn')->translatedFormat('l') ?? '' }}</td>
                                            <td>{{ $todaySport->total_vote ?? '' }}</td>
                                            <td>
                                                @if($todaySport->status == 'active')
                                                    <span class="badge badge-success">{{ $todaySport->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $todaySport->status }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a class="" href="{{ route('today-sports.edit', $todaySport->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Today Sport Edit"><i
                                                        class="fa fa-edit text-danger"></i>
                                                </a>
                                                <a class="px-3" href="{{ route('today-sports.show', $todaySport->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Today Sport Show">
                                                    <i class="fa fa-eye text-danger"></i>
                                                </a>
                                                @if(Auth::user()->is_role !== 'editor')
                                                    <form action="{{ route('today-sports.destroy', $todaySport->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Today Sport Delete"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
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
@endsection
@push('adminAppendScripts')
    <script src="{{ asset('/storage/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/storage/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#todaySportsTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "pageLength": 25
            })
        });
    </script>
@endpush
