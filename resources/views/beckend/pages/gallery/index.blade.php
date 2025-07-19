@extends('beckend.layouts.app')
@push('title')
    Gallery
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
                <h1 class="m-0 text-danger">Galleries</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('galleries.create') }}">Create</a></li>
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
                            <div class="card-title text-danger">Gallery Lists</div>
                        </div>
                        <div class="card-body">
                            <table id="galleriesTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>TITLE</th>
                                        <th>IMAGE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::limit($gallery->title ?? '', 20) }}</td>
                                            <td>
                                                <img class="content-image" src="{{ asset('/storage/assets/images/gallery/' . ($gallery->image ?? 'gallery.png')) }}" alt="gallery-image">
                                            </td>
                                            <td>
                                                <a class="" href="{{ route('galleries.edit',$gallery->id) }}" data-toggle="tooltip" data-placement="top" title="Gallery Edit"><i class="fa fa-edit text-danger"></i></a>
                                                <a class="px-3" href="{{ route('galleries.show',$gallery->id) }}" data-toggle="tooltip" data-placement="top" title="Gallery Show"><i class="fa fa-eye text-danger"></i></a>
                                                @if(Auth::user()->is_role !== 'editor')
                                                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="post" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger p-0" data-toggle="tooltip" data-placement="top" title="User Delete">
                                                            <i class="fa fa-trash"></i>
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
            $("#galleriesTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "pageLength": 25
            })
        });
    </script>
@endpush
