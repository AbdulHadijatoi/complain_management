@extends('layouts.backend')
@section('content')
    <div class="content2 p-4">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('All Contractors') }}</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">{{ __('No') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Total Open Complaints') }}</th>
                            <th>{{ __('Total Closed Complaints') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contractors as $index => $contractor)
                            <tr>
                                <td class="text-center">{{ ++$index }}</td>
                                <td>{{ $contractor->user->name }}</td>
                                <td>{{ $contractor->user->email }}</td>
                                <td>{{ $contractor->openComplaints->count() }}</td>
                                <td>{{ $contractor->closedComplaints->count() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('editContractor', $contractor->id) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Edit') }}">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <!-- Add more actions if needed -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 d-flex justify-content-center">{{ $contractors->links() }}</div>
            </div>
        </div>
    </div>
@endsection
