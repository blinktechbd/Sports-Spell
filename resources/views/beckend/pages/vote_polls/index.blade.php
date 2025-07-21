@extends('beckend.layouts.app')
@push('title')
    Vote Polls
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
                <h1 class="m-0 text-danger">Vote Polls</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('vote-polls.create') }}">Create</a></li>
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
                            <div class="card-title text-danger">Vote Poll Lists</div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto; width:100%;">
                                <table id="votePollsTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>title</th>
                                            <th>TOTAL VOTE</th>
                                            <th>Status</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($votePolls as $votePoll)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $votePoll->title ?? '' }}</td>
                                                <td>{{ $votePoll->total_vote ?? '' }}</td>
                                                <td>
                                                    @if($votePoll->status == 'active')
                                                        <span class="badge badge-success">
                                                            {{ $votePoll->status ?? '' }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger">
                                                            {{ $votePoll->status ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="" href="{{ route('vote-polls.edit', $votePoll->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Vote Poll Edit"><i
                                                            class="fa fa-edit text-danger"></i>
                                                    </a>
                                                    <a class="px-3" href="{{ route('vote-polls.show', $votePoll->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Vote Poll Show">
                                                        <i class="fa fa-eye text-danger"></i>
                                                    </a>
                                                    @if(Auth::user()->is_role !== 'editor')
                                                        <form action="{{ route('vote-polls.destroy', $votePoll->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Vote Poll Delete"
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
            $("#votePollsTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "pageLength": 25
            })
        });
    </script>
@endpush
