@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('Confirm Delete Contest') }}</h3>
        </div>
        <div class="block-content block-content-full">
            <p>{{ __('Are you sure you want to delete the contest?') }}</p>
            <p><strong>{{ __('Winner Prize:') }}</strong> {{ $contest->winner_prize }}</p>
            <p><strong>{{ __('Runner-up Prize:') }}</strong> {{ $contest->runner_up_prize }}</p>
            <p><strong>{{ __('Total Winners:') }}</strong> {{ $contest->contestDetails->total_winners }}</p>
            <p><strong>{{ __('Total Runner-ups:') }}</strong> {{ $contest->contestDetails->total_runner_ups }}</p>
            <p><strong>{{ __('Participants Limit:') }}</strong> {{ $contest->contestDetails->participants_limit }}</p>
            <p><strong>{{ __('Start Date:') }}</strong> {{ $contest->contestDetails->start_date }}</p>
            <p><strong>{{ __('End Date:') }}</strong> {{ $contest->contestDetails->end_date }}</p>
            <p><strong>{{ __('Entry Fee:') }}</strong> {{ $contest->contestDetails->entry_fee }}</p>
            <form action="{{ route('deleteContest', $contest->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('Delete Contest') }}</button>
                <a href="{{ route('listContests') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection
