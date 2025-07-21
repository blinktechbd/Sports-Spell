@extends('beckend.layouts.app')
@push('title')
    Vote Poll Show
@endpush

@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Vote Poll Show</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('vote-polls.index') }}">Lists</a></li>
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
                            <div class="card-title text-danger">Vote Poll Show</div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="title"
                                            class="form-control form-control-danger"
                                            placeholder="Vote Poll Title" data-toggle="tooltip" data-placement="top"
                                            title="Vote Poll Title" value="{{ $votePoll->title }}" readonly/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="text-center text-danger"> ----------------- VOTE OPTIONS [Multiple Add &
                                        Remove] -----------------</p>
                                    <div class="row">
                                        @foreach ($votePoll->votePollOption as $index => $votePollOption)
                                            <div class="col-12 mb-3">
                                                <input type="text" name="option[]" value="{{ $votePollOption->option_name }}  (vote: {{ $votePollOption->vote_count }})"
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
                            <a href="{{ route('vote-polls.index') }}" class="btn btn-danger">Back to lists</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

