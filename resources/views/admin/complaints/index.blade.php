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
                    {{ __('All complaints') }} <small>{{ __('Listing') }}</small>
                </h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">{{ __('No') }}</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Fault') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Ruth') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Comuna') }}</th>
                            <th>{{ __('Sector') }}</th>
                            <th>{{ __('Population') }}</th>
                            <th>{{ __('Contractor') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th class="text-center" style="width: 100px;">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($complaints as $index => $complaint)
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $complaint->post_no }}</td>
                            <td>{{ $complaint->post_address }}</td>
                            <td>{{ $complaint->typeOfFault?$complaint->typeOfFault->name:'-' }}</td>
                            <td>{{ $complaint->date_of_complaint }}</td>
                            <td>{{ $complaint->complainant_name }}</td>
                            <td>{{ $complaint->complaint_rut }}</td>
                            <td>{{ $complaint->phone }}</td>
                            <td>
                                @if($complaint->image)
                                <a href="{{ $complaint->image }}" target="_blank">
                                    <img src="{{ $complaint->image }}" alt="{{ __('Image') }}" width="50" height="50">
                                </a>
                                @endif
                            </td>
                            <td>{{ $complaint->getComuna?$complaint->getComuna->name:"" }}</td>
                            <td>{{ $complaint->getSector?$complaint->getSector->name:'' }}</td>
                            <td>{{ $complaint->getPopulation?$complaint->getPopulation->name:'' }}</td>
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
                                        {{ __('Assign') }}
                                    </button>
                                    {{-- @endif --}}
                                    <a href="{{ route('editComplaint', $complaint->id) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Edit') }}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('showComplaint', $complaint->id) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('View') }}">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <form action="{{ route('deleteComplaint', $complaint->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('{{ __('Are you sure you want to delete this complaint?') }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Delete') }}">
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
                                <h3 class="block-title">{{ __('Assign to contractor') }}</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <div class="form-group col-md-12 mb-4">
                                    <label class="form-label" for="contractor">{{ __('Select Contractor') }}</label>
                                    <select class="form-select" id="contractor_id" name="contractor_id" style="width: 100%;" data-placeholder="{{ __('Select Contractor') }}" required>
                                        <option disabled selected>{{ __('SELECT') }}</option>
                                        @foreach($contractors as $contractor)
                                        <option value="{{ $contractor->id }}">{{ $contractor->user->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-sm btn-primary">{{ __('Assign') }}</button>
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