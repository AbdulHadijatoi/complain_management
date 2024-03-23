@extends('layouts.backend')

@section('content')
<div class="content2 p-4">
    <form action="{{ route('updateContractor') }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $contractor->id }}">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Contractor</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $contractor->user->name }}" required>
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $contractor->user->email }}" required>
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="form-group col-12 mb-4">
                        <button type="submit" class="btn btn-alt-primary col-12">Update Contractor</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
