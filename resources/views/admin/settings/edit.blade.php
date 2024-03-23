@extends('layouts.backend')

@section('content')
  <div class="content2 p-4">
    <form action="{{ route('updateContest', $contest->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Edit Contest</h3>
        </div>
        <div class="block-content block-content-full">
          <div class="row">
              <div class="form-group col-md-4 mb-4">
                  <label class="form-label" for="title">Contest Title <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $contest->title }}" required>
              </div>

              <div class="form-group col-md-3 mb-4">
                <label class="form-label" for="start_date">Start Date<span class="text-danger">*</span></label>
                <input type="text" class="js-flatpickr form-control" id="start_date" name="start_date" value="{{ $contest->contestDetails->start_date }}" placeholder="Y-m-d">
              </div>
              
              <div class="form-group col-md-3 mb-4">
                  <label class="form-label" for="end_date">End Date<span class="text-danger">*</span></label>
                  <input type="text" class="js-flatpickr form-control" id="end_date" name="end_date" value="{{ $contest->contestDetails->end_date }}" placeholder="Y-m-d">
              </div>

              <div class="form-group col-md-2 mb-4">
                <label class="form-label" for="status">Contest Status <span class="text-danger">*</span></label>
                <select class="js-select2 form-select" id="status" name="status" style="width: 100%;" data-placeholder="Select Status">
                  <option value="open" {{ $contest->status == 'open' ? 'selected' : '' }}>Open</option>
                  <option value="closed" {{ $contest->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
              </div>

              <div class="form-group col-md-2 mb-4">
                  <label class="form-label" for="winner_prize">Winner Prize <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="winner_prize" name="winner_prize" value="{{ $contest->winner_prize }}" required>
              </div>

              <div class="form-group col-md-2 mb-4">
                  <label class="form-label" for="runner_up_prize">Runner-up Prize <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="runner_up_prize" name="runner_up_prize" value="{{ $contest->runner_up_prize }}" required>
              </div>

              <div class="form-group col-md-2 mb-4">
                  <label class="form-label" for="total_winners">Total Winners <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="total_winners" name="total_winners" value="{{ $contest->contestDetails->total_winners }}" required>
              </div>

              <div class="form-group col-md-2 mb-4">
                  <label class="form-label" for="total_runner_ups">Total Runner-ups <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="total_runner_ups" name="total_runner_ups" value="{{ $contest->contestDetails->total_runner_ups }}" required>
              </div>

              <div class="form-group col-md-2 mb-4">
                  <label class="form-label" for="participants_limit">Participants Limit <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="participants_limit" name="participants_limit" value="{{ $contest->contestDetails->participants_limit }}" required>
              </div>

              <div class="form-group col-md-2 mb-4">
                  <label class="form-label" for="entry_fee">Entry Fee <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="entry_fee" name="entry_fee" value="{{ $contest->contestDetails->entry_fee }}" required>
              </div>

              <div class="form-group col-12 mb-4">
                <label class="form-label" for="description">Contest Description (OPTIONAL)</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description..">{{ $contest->description }}</textarea>
              </div>

              <div class="form-group col-12 mb-4">
                <button type="submit" class="btn btn-alt-primary col-12">Update Contest</button>
              </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
