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
        <div class="row row-deck">
            <div class="col-sm-6 col-xxl-3">
              <!-- Pending Orders -->
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $complaintCounts['open'] }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ __('Open Complaints') }}</dd>
                  </dl>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a href="{{ route('filteredComplainList','open') }}" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>{{ __('View all open') }}</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
              <!-- END Pending Orders -->
            </div>
            <div class="col-sm-6 col-xxl-3">
              <!-- New Customers -->
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $complaintCounts['pending'] }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ __('Pending Complaints') }}</dd>
                  </dl>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a href="{{ route('filteredComplainList','pending') }}" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>{{ __('View all pending') }}</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
              <!-- END New Customers -->
            </div>
            <div class="col-sm-6 col-xxl-3">
              <!-- Messages -->
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $complaintCounts['closed'] }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ __('Closed Complaints') }}<dd>
                  </dl>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a href="{{ route('filteredComplainList','closed') }}" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>{{ __('View all closed') }}</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
              <!-- END Messages -->
            </div>
            <div class="col-sm-6 col-xxl-3">
              <!-- Conversion Rate -->
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $complaintCounts['rejected'] }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ __('Rejected Complaints') }}</dd>
                  </dl>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a href="{{ route('filteredComplainList','rejected') }}" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>{{ __('View rejected') }}</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
              <!-- END Conversion Rate-->
            </div>
          </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{ __('Recently submitted complaints') }}
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
                            <th>{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestPendingComplaints as $index => $complaint)
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
                                    <img src="{{ $complaint->image }}" alt="{{ __('Image') }}" width="50" height="50">
                                </a>
                            </td>
                            
                            <td>{{ $complaint->comuna }}</td>
                            <td>{{ $complaint->sector }}</td>
                            <td>{{ $complaint->population }}</td>
                            <td>
                                <span class="btn btn-sm btn-alt-warning">{{ $complaint->status ?? '-' }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
                   
