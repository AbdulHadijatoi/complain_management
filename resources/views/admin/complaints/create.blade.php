@extends('layouts.backend')

@section('content')
  <div class="content2 p-4">
    <form action="{{ route('storeComplaint') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Create Complaint</h3>
        </div>
        <div class="block-content block-content-full">
          <div class="row">

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="post_no">Post Number <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="post_no" name="post_no" required>
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="post_address">Post Address</label>
              <input type="text" class="form-control" id="post_address" name="post_address">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="type_of_fault">Type of Fault</label>
              <input type="text" class="form-control" id="type_of_fault" name="type_of_fault">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="date_of_complaint">Date of Complaint</label>
              <input type="date" class="form-control" id="date_of_complaint" name="date_of_complaint">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="complainant_name">Complainant Name</label>
              <input type="text" class="form-control" id="complainant_name" name="complainant_name">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="complaint_rut">Complaint RUT</label>
              <input type="text" class="form-control" id="complaint_rut" name="complaint_rut">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="image">Image (Optional)</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="comuna">Comuna</label>
              <select class="js-select2 form-select" id="comuna" name="comuna" style="width: 100%;" data-placeholder="Select Comuna">
                <option></option>
                @foreach($comunas as $comuna)
                <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="sector">Sector</label>
              <select class="js-select2 form-select" id="sector" name="sector" style="width: 100%;" data-placeholder="Select Sector">
                <option></option>
                @foreach($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-4 mb-4">
              <label class="form-label" for="population">Population</label>
              <select class="js-select2 form-select" id="population" name="population" style="width: 100%;" data-placeholder="Select Population">
                <option></option>
                @foreach($populations as $population)
                <option value="{{ $population->id }}">{{ $population->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Add other form fields -->

            <div class="form-group col-12 mb-4">
              <button type="submit" class="btn btn-alt-primary col-12">Create Complaint</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
