@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Complaint Details</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Post No:</th>
                        <td>{{ $complaint->post_no }}</td>
                    </tr>
                    <tr>
                        <th>Post Address:</th>
                        <td>{{ $complaint->post_address }}</td>
                    </tr>
                    <tr>
                        <th>Type of Fault:</th>
                        <td>{{ $complaint->type_of_fault }}</td>
                    </tr>
                    <tr>
                        <th>Date of Complaint:</th>
                        <td>{{ $complaint->date_of_complaint }}</td>
                    </tr>
                    <tr>
                        <th>Complainant Name:</th>
                        <td>{{ $complaint->complainant_name }}</td>
                    </tr>
                    <tr>
                        <th>Complaint RUT:</th>
                        <td>{{ $complaint->complaint_rut }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $complaint->phone }}</td>
                    </tr>
                    <tr>
                        <th>Image:</th>
                        <td>
                            <a href="{{ $complaint->image }}" target="_blank">
                                <img src="{{ $complaint->image }}" alt="Complaint Image" style="width: 50px; height: 50px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Comuna:</th>
                        <td>{{ $complaint->comuna }}</td>
                    </tr>
                    <tr>
                        <th>Sector:</th>
                        <td>{{ $complaint->sector }}</td>
                    </tr>
                    <tr>
                        <th>Population:</th>
                        <td>{{ $complaint->population }}</td>
                    </tr>
                    <tr>
                        <th>Assigned To Contractor:</th>
                        @if($complaint->contractor)
                        <td>{{ $complaint->contractor->user->name??"" }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>{{ $complaint->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
