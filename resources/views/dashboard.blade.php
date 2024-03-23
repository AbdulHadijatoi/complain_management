@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')

    <div class="content2 p-4">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Recently submitted complaints
                </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table responsive table-bordered table-striped table-vcenter fs-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">No</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Fault</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Ruth</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Comuna</th>
                            <th>Sector</th>
                            <th>Population</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complaints as $index => $complaint)
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $complaint->post_no }}</td>
                            <td>{{ $complaint->post_address }}</td>
                            <td>{{ $complaint->type_of_fault }}</td>
                            <td>{{ $complaint->date_of_complaint }}</td>
                            <td>{{ $complaint->complainant_name }}</td>
                            <td>{{ $complaint->complaint_rut }}</td>
                            <td>{{ $complaint->phone }}</td>
                            <td>
                                <a href="{{ $complaint->image }}" target="_blank">
                                    <img src="{{ $complaint->image }}" alt="Image" width="50" height="50">
                                </a>
                            </td>
                            
                            <td>{{ $complaint->comuna }}</td>
                            <td>{{ $complaint->sector }}</td>
                            <td>{{ $complaint->population }}</td>
                            <td>
                                <span class="btn btn-warning">{{ $complaint->status ?? '-' }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
