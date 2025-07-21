@extends('beckend.layouts.app')
@push('title')
    Vote Poll Create
@endpush
@push('adminAppendCss')
    <style>
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Vote Poll Create</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('vote-polls.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Create</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="{{ route('vote-polls.store') }}" method="post">
                        @csrf
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Vote Poll Create</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="title"
                                                class="form-control form-control-danger @error('title') is-invalid @enderror"
                                                placeholder="Vote Poll Title" data-toggle="tooltip" data-placement="top"
                                                title="Vote Poll Title" value="{{ old('title') }}"/>
                                            @error('title')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <select name="status" class="form-control form-control-danger">
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <p class="text-center text-danger"> ----------------- VOTE OPTIONS [Multiple Add &
                                            Remove] -----------------</p>
                                            @foreach(old('option', ['']) as $index => $value)
                                                <div class="row mb-3">
                                                    <div class="col-11">
                                                        <input type="text" name="option[]"
                                                            value="{{ $value }}"
                                                            class="form-control @error('option.' . $index) is-invalid @enderror"
                                                            placeholder="Option"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Option" />
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="javascript:void(0)" class="btn btn-outline-light w-100 bg-success vote-option">+</a>
                                                    </div>
                                                    @error('option.')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                    </div>
                                    <div class="col-12 append-option">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Submit</button>
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
            $('.vote-option').click(function() {
                var html = `
                <div class="row mb-3 option-row">
                    <div class="col-11">
                        <input type="text" name="option[]" class="form-control" placeholder="Option" />
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-outline-light w-100 bg-danger remove-option">-</button>
                    </div>
                </div>`;
                $('.append-option').append(html);
            });

            // Remove button
            $(document).on('click', '.remove-option', function() {
                $(this).closest('.option-row').remove();
            });
        });
    </script>
@endpush
