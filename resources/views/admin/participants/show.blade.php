@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Contest Details</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Winner Prize:</th>
                        <td>{{ $contest->winner_prize }}</td>
                    </tr>
                    <tr>
                        <th>Runner-up Prize:</th>
                        <td>{{ $contest->runner_up_prize }}</td>
                    </tr>
                    <tr>
                        <th>Total Winners:</th>
                        <td>{{ $contest->contestDetails->total_winners }}</td>
                    </tr>
                    <tr>
                        <th>Total Runner-ups:</th>
                        <td>{{ $contest->contestDetails->total_runner_ups }}</td>
                    </tr>
                    <tr>
                        <th>Participants Limit:</th>
                        <td>{{ $contest->contestDetails->participants_limit }}</td>
                    </tr>
                    <tr>
                        <th>Start Date:</th>
                        <td>{{ $contest->contestDetails->start_date }}</td>
                    </tr>
                    <tr>
                        <th>End Date:</th>
                        <td>{{ $contest->contestDetails->end_date }}</td>
                    </tr>
                    <tr>
                        <th>Entry Fee:</th>
                        <td>{{ $contest->contestDetails->entry_fee }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
