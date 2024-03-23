@extends('layouts.backend')

@section('content')
<div class="content2 p-4">

  <form action="{{ route('updateComunas') }}" method="POST">
    @csrf
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Comunas</h3>
      </div>
      <div class="block-content block-content-full">
        <div class="form-group mb-4">
          <select class="form-select" style="width: 100%;" data-placeholder="Existing List">
            <option selected disabled>Existing List</option>
            @foreach($comunas as $comuna)
            <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          <div class="form-group col-12 mb-4">
            <label class="form-label" for="new_comuna_name">Add New Comuna</label>
            <input type="text" class="form-control" id="new_comuna_name" name="new_comuna_name" placeholder="Enter New Comuna Name" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-12 mb-4">
            <button type="submit" class="btn btn-alt-primary col-12">Update Comunas</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Form for updating Populations -->
  <form action="{{ route('updatePopulations') }}" method="POST">
    @csrf
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Populations</h3>
      </div>
      <div class="block-content block-content-full">
        <div class="form-group mb-4">
          <select class="form-select" style="width: 100%;" data-placeholder="Existing List">
            <option selected disabled>Existing List</option>
            @foreach($populations as $population)
            <option value="{{ $population->id }}">{{ $population->name }}</option>
            @endforeach
          </select>
        </div>
        <!-- Input field to add a new item -->
        <div class="row">
          <div class="form-group col-12 mb-4">
            <label class="form-label" for="new_population_name">Add New Population</label>
            <input type="text" class="form-control" id="new_population_name" name="new_population_name" placeholder="Enter New Population Name" required>
          </div>
        </div>
        <!-- Submit button -->
        <div class="row">
          <div class="form-group col-12 mb-4">
            <button type="submit" class="btn btn-alt-primary col-12">Update Populations</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Form for updating Sectors -->
  <form action="{{ route('updateSectors') }}" method="POST">
    @csrf
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Sectors</h3>
      </div>
      <div class="block-content block-content-full">
        <div class="form-group mb-4">
          <select class="form-select" style="width: 100%;" data-placeholder="Existing List">
            <option selected disabled>Existing List</option>
            @foreach($sectors as $sector)
            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
            @endforeach
          </select>
        </div>
        <!-- Input field to add a new item -->
        <div class="row">
          <div class="form-group col-12 mb-4">
            <label class="form-label" for="new_sector_name">Add New Sector</label>
            <input type="text" class="form-control" id="new_sector_name" name="new_sector_name" placeholder="Enter New Sector Name" required>
          </div>
        </div>
        <!-- Submit button -->
        <div class="row">
          <div class="form-group col-12 mb-4">
            <button type="submit" class="btn btn-alt-primary col-12">Update Sectors</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Form for updating Type of Faults -->
  <form action="{{ route('updateTypeOfFaults') }}" method="POST">
    @csrf
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Type of Faults</h3>
      </div>
      <div class="block-content block-content-full">
        <!-- Display existing values -->
        <div class="form-group mb-4">
          <select class="form-select" style="width: 100%;" data-placeholder="Existing List">
            <option selected disabled>Existing List</option>
            @foreach($type_of_faults as $fault)
            <option value="{{ $fault->id }}">{{ $fault->name }}</option>
            @endforeach
          </select>
        </div>
        <!-- Input field to add a new item -->
        <div class="row">
          <div class="form-group col-12 mb-4">
            <label class="form-label" for="new_type_of_fault_name">Add New Type of Fault</label>
            <input type="text" class="form-control" id="new_type_of_fault_name" name="new_type_of_fault_name" placeholder="Enter New Type of Fault Name" required>
          </div>
        </div>
        <!-- Submit button -->
        <div class="row">
          <div class="form-group col-12 mb-4">
            <button type="submit" class="btn btn-alt-primary col-12">Update Type of Faults</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
