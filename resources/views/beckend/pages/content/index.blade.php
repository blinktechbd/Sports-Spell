@extends('beckend.layouts.app')
@push('title')
    Content
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
            width:55px;
        }
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Contents</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('contents.create') }}">Create</a></li>
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
                            <div class="card-title text-danger">Content Lists</div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto; width:100%;">
                                <table id="contentsTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Details</th>
                                            <th>Author</th>
                                            <th>Visitor</th>
                                            <th>Created</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents as $content)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $content->category->name ?? '' }}</td>
                                                <td>{{ $content->subcategory->name ?? '' }}</td>
                                                <td>{{ Str::limit($content->title, 15, '...') ?? '' }}</td>
                                                <td>
                                                    <img class="content-image" src="{{ asset('/storage/assets/images/blogs/'.$content->image) }}" alt="">
                                                </td>
                                                <td>{{ Str::limit(strip_tags($content->details), 20, '...') }}</td>
                                                <td>{{ $content->author->name ?? '' }}</td>
                                                <td>{{ $content->visitor_count ?? '' }}</td>
                                                <td>{{ bangla_date($content->created_at) ?? '' }} (<small>{{ Carbon\Carbon::parse($content->created_at)->format('h:i A') }}</small>)</td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="" href="{{ route('contents.edit',$content->id) }}" data-toggle="tooltip" data-placement="top" title="Content Edit"><i class="fa fa-edit text-danger"></i></a>
                                                    <a class="px-3" href="{{ route('contents.show',$content->id) }}" data-toggle="tooltip" data-placement="top" title="Content Show"><i class="fa fa-eye text-danger"></i></a>
                                                    @if(Auth::user()->is_role !== 'editor')
                                                        <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" data-toggle="tooltip" data-placement="top" title="Content Delete" onclick="return confirm('Are you sure?')">
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
            $("#contentsTable").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": true,
                "pageLength": 25
            })
        });
    </script>
@endpush
