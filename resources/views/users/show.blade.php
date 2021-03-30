@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 d-flex flex-row justify-content-between">
                      <a href="{{route('user.index')}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back
                      </a>
                      <div>
                        <button class="btn btn-warning btn-sm ml-1">
                          <i class="mr-2 fas fa-pen"></i>
                          Edit User
                        </button>
                        <button class="btn btn-danger btn-sm ml-1">
                          <i class="mr-2 fas fa-trash-alt"></i>
                          Delete User
                        </button>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 mt-3">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                        <a class="nav-link" id="v-pills-other-tab" data-toggle="pill" href="#v-pills-other" role="tab" aria-controls="v-pills-other" aria-selected="false">Others</a>
                      </div>
                    </div>
                    <div class="col-md-10 col-sm-12 mt-3">
                      <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                          <h2>Personal Information</h2>
                          <div class="row mt-4">
                            <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                              <img class="img-fluid img-thumbnail rounded img-custom" src="{{asset('storage/files/' . $user->avatar)}}" alt="User avatar" style="width:15rem;height:15rem">
                            </div>
                            <div class="col-md-9 col-sm-12">
                              <div class="row">
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Nama</span>
                                  <p>{{ $user->name }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Email</span>
                                  <p>{{ $user->email }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Tanggal Lahir</span>
                                  <p>{{ $user->birthdate_label }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Gender</span>
                                  <p>{{ $user->gender_label }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">...</div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection