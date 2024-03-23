@extends('layouts.simple')

@section('content')
    <div class="hero-static d-flex align-items-center">
        <div class="content">
          <div class="row justify-content-center push">
            <div class="col-md-8 col-lg-6 col-xl-4">
              <div class="block block-rounded mb-0">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Admin Login</h3>
                </div>
                <div class="block-content">
                  <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5 text-center">
                    <h1 class="h4 mb-1">COMPLAINT MANAGEMENT</h1>
                    <p class="fw-small text-muted">
                      Welcome back, please login
                    </p>

                    <form method="POST" action="{{route('loginPost')}}">
                      @csrf
                      <div class="py-3">
                        <div class="mb-4">
                          <input type="email" class="form-control form-control-alt form-control-lg" name="email" placeholder="Email">
                        </div>
                        <div class="mb-4">
                          <input type="password" class="form-control form-control-alt form-control-lg" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-12">
                          <button type="submit" class="btn w-100 btn-alt-primary">Login</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="fs-sm text-muted text-center">
            <strong>COMPLAINT MANAGEMENT</strong> Copyright &copy; <span data-toggle="year-copy"></span> All rights reserved
          </div>
        </div>
      </div>
@endsection
