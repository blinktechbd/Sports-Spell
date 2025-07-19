<div class="online-poll">
    <h6 class="text-white fw-bold bg-danger py-2 px-3">অনলাইন জরিপ</h6>

    @foreach (votting_polls()->get() as $votePoll)
        <div class="card shadow mb-3 border-0" style="">
            <div class="card-header bg-danger text-white">
                <h6 class="mb-0">{{ $votePoll->title ?? '' }}</h6>
            </div>
            <div class="card-body">
                <h6 class="text-danger">মোট ভোটদাতাঃ {{ convertEnToBnNum($votePoll->total_vote) }} জন</h6>
                <div class="pollForm">
                    @foreach ($votePoll->votePollOption as $item)
                        @php
                            $percent = number_format(($item->vote_count / max($votePoll->total_vote, 1)) * 100, 2);
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input border-danger is-danger mt-0 vote-polling" type="radio"
                                name="option_id" id="lang3" value="{{ $item->id }}"
                                data-token="{{ csrf_token() }}" required>
                            <div class="progress position-relative">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                    style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="position-absolute w-100 text-left px-2 text-white fw-bold">
                                    <div class="d-flex justify-content-between">
                                        <p>{{ $item->option_name ?? '' }}</p>
                                        <p>{{ $percent }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <small id="voteMessage{{ $votePoll->id }}" class="text-danger mt-2"></small>
                </div>
            </div>
        </div>
    @endforeach
</div>
