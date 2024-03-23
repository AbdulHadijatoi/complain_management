@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Participant List</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Participated in Contest</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $participant)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $participant->user->name??'-' }}</td>
                        <td>{{ $participant->contest ? $participant->contest->title : '-' }}</td>
                        <td>
                            @if($participant->contest && $participant->contest->status)
                                @if($participant->contest->status == "open")
                                    <span class="btn btn-success">
                                @else
                                    <span class="btn btn-warning">
                                @endif
                                {{ $participant->contest ? $participant->contest->status : '-' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($participant->contest)
                            <a href="{{ route('showContest', $participant->contest_id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="View Contest"><i class="fa fa-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12 d-flex justify-content-center">{{ $participants->links() }}</div>
        </div>
    </div>
</div>
@endsection