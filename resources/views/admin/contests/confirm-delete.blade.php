@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Confirm Delete Contest</h3>
        </div>
        <div class="block-content block-content-full">
            <p>Are you sure you want to delete the contest?</p>
            <p><strong>Winner Prize:</strong> {{ $contest->winner_prize }}</p>
            <p><strong>Runner-up Prize:</strong> {{ $contest->runner_up_prize }}</p>
            <p><strong>Total Winners:</strong> {{ $contest->contestDetails->total_winners }}</p>
            <p><strong>Total Runner-ups:</strong> {{ $contest->contestDetails->total_runner_ups }}</p>
            <p><strong>Participants Limit:</strong> {{ $contest->contestDetails->participants_limit }}</p>
            <p><strong>Start Date:</strong> {{ $contest->contestDetails->start_date }}</p>
            <p><strong>End Date:</strong> {{ $contest->contestDetails->end_date }}</p>
            <p><strong>Entry Fee:</strong> {{ $contest->contestDetails->entry_fee }}</p>
            <form action="{{ route('deleteContest', $contest->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Contest</button>
                <a href="{{ route('listContests') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
