@extends('beckend.layouts.app')
@push('title')
    Today Sport Show
@endpush

@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Today Sport Show</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('today-sports.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Show</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card card-danger card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title text-danger">Today Sport Show</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group" data-toggle="tooltip" data-placement="top"
                                        title="Category Name">
                                        <input type="text" class="form-control form-control-danger" placeholder="Category Name" value="{{ $todaySport->category->name }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="match_type"
                                            class="form-control form-control-danger"
                                            placeholder="Match Type" data-toggle="tooltip" data-placement="top"
                                            title="Match Type Like (ODI Match...)" value="{{ $todaySport->match_type }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="match_title"
                                            class="form-control form-control-danger"
                                            placeholder="Match Title" data-toggle="tooltip" data-placement="top"
                                            title="Match Title" value="{{ $todaySport->match_title }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="match_stadium"
                                            class="form-control form-control-danger @error('match_stadium') is-invalid @enderror"
                                            placeholder="Match Venue" data-toggle="tooltip" data-placement="top"
                                            title="Match Venue" value="{{ $todaySport->match_stadium }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="datetime-local" id="datetime" name="match_time"
                                            class="form-control form-control-danger @error('match_time') is-invalid @enderror"
                                            placeholder="Match Time" data-toggle="tooltip" data-placement="top"
                                            title="Match Time (Bangladesh Time)" value="{{ $todaySport->match_time }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="status"
                                            class="form-control form-control-danger @error('status') is-invalid @enderror"
                                            placeholder="Status" data-toggle="tooltip" data-placement="top"
                                            title="Status" value="{{ $todaySport->status }}" readonly/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="text-center text-danger"> ----------------- VOTE OPTIONS [Multiple Add &
                                        Remove] -----------------</p>
                                    <div class="row">
                                        @foreach ($todaySport->todaySportOption as $index => $todaySportOption)
                                            <div class="col-12 mb-3">
                                                <input type="text" name="option[]" value="{{ $todaySportOption->option_name }}"
                                                    class="form-control @error('option.' . $index) is-invalid @enderror"
                                                    placeholder="Option" data-toggle="tooltip" data-placement="top"
                                                    title="Option" readonly/>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('today-sports.index') }}" class="btn btn-danger">Back to lists</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

