@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('Complaint Details') }}</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped">
                <tbody>
                    @if($complaint->complaintDetails)
                        <tr>
                            <th>{{ __('Contractor Update Remarks:') }}</th>
                            <td>{{ $complaint->complaintDetails->update_remarks }}</td>
                        </tr>
                        @if($complaint->complaintDetails->image)
                            <tr>
                                <th>{{ __('Contractor Attachment Image:') }}</th>
                                <td>
                                    <a href="{{ $complaint->complaintDetails->image }}" target="_blank">
                                        <img src="{{ $complaint->complaintDetails->image }}" alt="{{ __('Contractor Attachment Image') }}" style="width: 100px; height: 100px;">
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endif
                    <tr>
                        <th style="width: 30%;">{{ __('Post No:') }}</th>
                        <td>{{ $complaint->post_no }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Post Address:') }}</th>
                        <td>{{ $complaint->post_address }}</td>
                    </tr>
                    
                    <tr>
                        <th>{{ __('Type of Fault:') }}</th>
                        <td>{{ $complaint->type_of_fault?$complaint->type_of_fault->name:'-' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Date of Complaint:') }}</th>
                        <td>{{ $complaint->date_of_complaint }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Complainant Name:') }}</th>
                        <td>{{ $complaint->complainant_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Complaint RUT:') }}</th>
                        <td>{{ $complaint->complaint_rut }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Phone:') }}</th>
                        <td>{{ $complaint->phone }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Image:') }}</th>
                        <td>
                            <a href="{{ $complaint->image }}" target="_blank">
                                <img src="{{ $complaint->image }}" alt="{{ __('Complaint Image') }}" style="width: 50px; height: 50px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Comuna:') }}</th>
                        <td>{{ $complaint->comuna?$complaint->comuna->name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Sector:') }}</th>
                        <td>{{ $complaint->sector?$complaint->sector->name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Population:') }}</th>
                        <td>{{ $complaint->population?$complaint->population->name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Assigned To Contractor:') }}</th>
                        @if($complaint->contractor)
                        <td>{{ $complaint->contractor->user->name??"" }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>{{ __('Status:') }}</th>
                        <td>{{ $complaint->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
