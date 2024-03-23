@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')


    <div class="content2 p-4">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    All complaints <small>Listing</small>
                </h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
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
                            <th>Contractor</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 100px;">Action</th>
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
                                @if($complaint->image)
                                <a href="{{ $complaint->image }}" target="_blank">
                                    <img src="{{ $complaint->image }}" alt="Image" width="50" height="50">
                                </a>
                                @endif
                            </td>
                            <td>{{ $complaint->comuna }}</td>
                            <td>{{ $complaint->sector }}</td>
                            <td>{{ $complaint->population }}</td>
                            <td>
                                @if($complaint->contractor)
                                {{ $complaint->contractor->user->name??'' }}
                                @endif
                            </td>
                            <td>
                                @if($complaint->status)
                                    @if($complaint->status == "open")
                                        <span class="btn btn-sm btn-alt-info">
                                    @elseif($complaint->status == "closed")
                                        <span class="btn btn-sm btn-alt-success">
                                    @elseif($complaint->status == "pending")
                                        <span class="btn btn-sm btn-alt-warning">
                                    @else
                                        <span class="btn btn-sm btn-alt-secondary">
                                    @endif
                                    {{ $complaint->status ?? '-' }}</span>
                                @endif
                            </td>
                            
                            <td>
                                <div class="btn-group">
                                    {{-- @if($complaint->status && $complaint->status != "closed") --}}
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-block-vcenter" onclick="setComplaintId({{ $complaint->id }})">
                                        Assign
                                    </button>
                                    {{-- @endif --}}
                                    <a href="{{ route('editComplaint', $complaint->id) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('showComplaint', $complaint->id) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="View">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <form action="{{ route('deleteComplaint', $complaint->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('Are you sure you want to delete this complaint?')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Delete">
                                            <i class="fa fa-fw fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 d-flex justify-content-center">{{ $complaints->links() }}</div>

                <!-- Modal -->
            <div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form class="modal-content" action="{{ route('assignToContractor') }}" method="POST">
                        @csrf
                        <input type="hidden" id="complaint_id" name="complaint_id">
                        <div class="block block-rounded block-transparent mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Assign to contractor</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <div class="form-group col-md-12 mb-4">
                                    <label class="form-label" for="contractor">Select Contractor</label>
                                    <select class="form-select" id="contractor_id" name="contractor_id" style="width: 100%;" data-placeholder="Select Contractor" required>
                                        <option disabled selected>SELECT</option>
                                        @foreach($contractors as $contractor)
                                        <option value="{{ $contractor->id }}">{{ $contractor->user->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        function setComplaintId(complaintId) {
            document.getElementById('complaint_id').value = complaintId;
        }
    </script>

@endsection
