@extends('layouts.backend')

@section('content')
<div class="content2 p-4">

    <div class="row">
      {{-- COMUNAS --}}
      <div class="col-md-6">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Comunas') }}</h3>
                <button type="button" class="btn btn-sm btn-alt-secondary open-modal" data-bs-toggle="modal" data-bs-target="#comunasModal" data-bs-placement="bottom" data-bs-original-title="{{ __('Add New Comuna') }}">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">{{ __('No') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comunas as $index => $comuna)
                        <tr>
                            <td class="text-center">{{ $comuna->id }}</td>
                            <td>{{ $comuna->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary edit-comuna" data-id="{{ $comuna->id }}" data-name="{{ $comuna->name }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Edit') }}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{route('deleteComuna',$comuna->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('{{ __('Are you sure you want to delete this comuna?') }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Delete') }}">
                                            <i class="fa fa-fw fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <!-- Edit Comuna Modal -->
      <div class="modal fade" id="editComunaModal" tabindex="-1" aria-labelledby="editComunaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editComunaModalLabel">{{ __('Edit Comuna') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateComuna') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="comuna_id" id="editComunaId">
                        <div class="mb-3">
                            <label for="edit_comuna_name" class="form-label">{{ __('Comuna Name') }}</label>
                            <input type="text" class="form-control" id="edit_comuna_name" name="edit_comuna_name" placeholder="{{ __('Enter Comuna Name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

      {{-- SECTORS --}}
      <div class="col-md-6">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Sectors') }}</h3>
                <button type="button" class="btn btn-sm btn-alt-secondary open-modal" data-bs-toggle="modal" data-bs-target="#sectorsModal" data-bs-placement="bottom" data-bs-original-title="{{ __('Add New Sector') }}">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">{{ __('No') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Comuna') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sectors as $index => $sector)
                        <tr>
                            <td class="text-center">{{ $sector->id }}</td>
                            <td>{{ $sector->name }}</td>
                            <td>{{ $sector->comuna ? $sector->comuna->name : '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary edit-sector" data-id="{{ $sector->id }}" data-name="{{ $sector->name }}" data-comuna="{{ $sector->comuna_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Edit') }}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{route('deleteSector',$sector->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('{{ __('Are you sure you want to delete this sector?') }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Delete') }}">
                                            <i class="fa fa-fw fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <!-- Edit Sector Modal -->
      <div class="modal fade" id="editSectorModal" tabindex="-1" aria-labelledby="editSectorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectorModalLabel">{{ __('Edit Sector') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateSector') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="sector_id" id="editSectorId">
                        <div class="mb-3">
                            <label for="edit_sector_name" class="form-label">{{ __('Sector Name') }}</label>
                            <input type="text" class="form-control" id="edit_sector_name" name="edit_sector_name" placeholder="{{ __('Enter Sector Name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_sector_comuna" class="form-label">{{ __('Comuna') }}</label>
                            <select class="form-select" id="edit_sector_comuna" name="edit_sector_comuna" required>
                                <option value="">-- Select Comuna --</option>
                                @foreach($comunas as $comuna)
                                <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

      {{-- POPULATIONS --}}
      <div class="col-md-6">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Populations') }}</h3>
                <button type="button" class="btn btn-sm btn-alt-secondary open-modal" data-bs-toggle="modal" data-bs-target="#populationsModal" data-bs-placement="bottom" data-bs-original-title="{{ __('Add New Population') }}">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">{{ __('No') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Sector') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($populations as $index => $population)
                        <tr>
                            <td class="text-center">{{ $population->id }}</td>
                            <td>{{ $population->name }}</td>
                            <td>{{ $population->sector ? $population->sector->name : '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary edit-population" data-id="{{ $population->id }}" data-name="{{ $population->name }}" data-sector="{{ $population->sector_id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Edit') }}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{route('deletePopulation',$population->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('{{ __('Are you sure you want to delete this population?') }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Delete') }}">
                                            <i class="fa fa-fw fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <!-- Edit Population Modal -->
      <div class="modal fade" id="editPopulationModal" tabindex="-1" aria-labelledby="editPopulationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPopulationModalLabel">{{ __('Edit Population') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updatePopulation') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="population_id" id="editPopulationId">
                        <div class="mb-3">
                            <label for="edit_population_name" class="form-label">{{ __('Population Name') }}</label>
                            <input type="text" class="form-control" id="edit_population_name" name="edit_population_name" placeholder="{{ __('Enter Population Name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_population_sector" class="form-label">{{ __('Sector') }}</label>
                            <select class="form-select" id="edit_population_sector" name="edit_population_sector" required>
                                <option value="">-- Select Sector --</option>
                                @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

      {{-- Type of Faults --}}
      <div class="col-md-6">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Type of Faults') }}</h3>
                <button type="button" class="btn btn-sm btn-alt-secondary open-modal" data-bs-toggle="modal" data-bs-target="#typeOfFaultsModal" data-bs-placement="bottom" data-bs-original-title="{{ __('Add New Type of Faults') }}">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">{{ __('No') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($type_of_faults as $index => $fault)
                        <tr>
                            <td class="text-center">{{ $fault->id }}</td>
                            <td>{{ $fault->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary edit-fault" data-id="{{ $fault->id }}" data-name="{{ $fault->name }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('Edit') }}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{route('deleteFault',$fault->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('{{ __('Are you sure you want to delete this type of fault?') }}')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{ __('Delete') }}">
                                            <i class="fa fa-fw fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <!-- Edit Type of Fault Modal -->
      <div class="modal fade" id="editFaultModal" tabindex="-1" aria-labelledby="editFaultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFaultModalLabel">{{ __('Edit Type of Fault') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateFault') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="fault_id" id="editFaultId">
                        <div class="mb-3">
                            <label for="edit_fault_name" class="form-label">{{ __('Fault Name') }}</label>
                            <input type="text" class="form-control" id="edit_fault_name" name="edit_fault_name" placeholder="{{ __('Enter Fault Name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

    </div>
</div>

<!-- Modals -->
<!-- Comunas Modal -->
<div class="modal fade" id="comunasModal" tabindex="-1" aria-labelledby="comunasModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comunasModalLabel">{{ __('Add New Comuna') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('updateComunas') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="new_comuna_name" class="form-label">{{ __('Comuna Name') }}</label>
            <input type="text" class="form-control" id="new_comuna_name" name="new_comuna_name" placeholder="{{ __('Enter New Comuna Name') }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Sectors Modal -->
<div class="modal fade" id="sectorsModal" tabindex="-1" aria-labelledby="sectorsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sectorsModalLabel">{{ __('Add New Sector') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('updateSectors') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="comuna_id" class="form-label">{{ __('Select Comuna') }}</label>
            <select class="form-select" id="comuna_id" name="comuna_id" required>
              <option value="" selected disabled>{{ __('Select Comuna') }}</option>
              @foreach($comunas as $comuna)
              <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="new_sector_name" class="form-label">{{ __('Sector Name') }}</label>
            <input type="text" class="form-control" id="new_sector_name" name="new_sector_name" placeholder="{{ __('Enter New Sector Name') }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Populations Modal -->
<div class="modal fade" id="populationsModal" tabindex="-1" aria-labelledby="populationsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="populationsModalLabel">{{ __('Add New Population') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('updatePopulations') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="sector_id_population" class="form-label">{{ __('Select Sector') }}</label>
            <select class="form-select" id="sector_id_population" name="sector_id" required>
              <option value="" selected disabled>{{ __('Select Sector') }}</option>
              @foreach($sectors as $sector)
              <option value="{{ $sector->id }}">{{ $sector->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="new_population_name" class="form-label">{{ __('Population Name') }}</label>
            <input type="text" class="form-control" id="new_population_name" name="new_population_name" placeholder="{{ __('Enter New Population Name') }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Type of Faults Modal -->
<div class="modal fade" id="typeOfFaultsModal" tabindex="-1" aria-labelledby="typeOfFaultsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="typeOfFaultsModalLabel">{{ __('Add New Type of Fault') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('updateTypeOfFaults') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="new_type_of_fault_name" class="form-label">{{ __('Type of Fault Name') }}</label>
            <input type="text" class="form-control" id="new_type_of_fault_name" name="new_type_of_fault_name" placeholder="{{ __('Enter New Type of Fault Name') }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>

@section('js_after')
  <script>
    // Edit Comuna Modal
    $('.edit-comuna').click(function() {
        var comunaId = $(this).data('id');
        var comunaName = $(this).data('name');
        $('#editComunaId').val(comunaId);
        $('#edit_comuna_name').val(comunaName);
        $('#editComunaModal').modal('show');
    });

    // Edit Sector Modal
    $('.edit-sector').click(function() {
        var sectorId = $(this).data('id');
        var sectorName = $(this).data('name');
        var comunaId = $(this).data('comuna');
        $('#editSectorId').val(sectorId);
        $('#edit_sector_name').val(sectorName);
        $('#edit_sector_comuna').val(comunaId);
        $('#editSectorModal').modal('show');
    });

    // Edit Population Modal
    $('.edit-population').click(function() {
        var populationId = $(this).data('id');
        var populationName = $(this).data('name');
        var sectorId = $(this).data('sector');
        $('#editPopulationId').val(populationId);
        $('#edit_population_name').val(populationName);
        $('#edit_population_sector').val(sectorId);
        $('#editPopulationModal').modal('show');
    });

    // Edit Type of Fault Modal
    $('.edit-fault').click(function() {
        var faultId = $(this).data('id');
        var faultName = $(this).data('name');
        $('#editFaultId').val(faultId);
        $('#edit_fault_name').val(faultName);
        $('#editFaultModal').modal('show');
    });
  </script>
  @endsection

@endsection
