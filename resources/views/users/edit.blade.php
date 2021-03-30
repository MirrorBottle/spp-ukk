@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form class="form" action="{{route('user.store')}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit User #{{$user->id}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" value="{{ old('name', $user->name) }}" class="form-control " name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" value="{{ old('email', $user->email) }}" class="form-control " name="email" id="email">
                            @error('email')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="font-weight-bold">Tanggal Lahir</label>
                            <div class="input-group">
                               <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" value="{{ old('birthdate', $user->birthdate) }}" placeholder="Select date" type="text" name="birthdate" id="birthdate">
                            </div>
                            @error('birthdate')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Jenis Kelamin</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ old('gender') === "0" || $user->gender === "0" ? 'checked' : '' }}  id="gender2" name="gender" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="gender2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ old('gender') === "1" || $user->gender === "1" ? 'checked' : '' }} id="gender1" name="gender" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="gender1">Laki-laki</label>
                                    </div>
                                </div>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="row">
                          <div class="col-md-3 col-12">
                            <img src="{{asset('storage/files/' . $user->avatar)}}" style="width:15rem;height:15rem" alt="Profile image" class="img-fluid img-thumbnail rounded img-custom">
                          </div>
                          <div class="col-md-9 col-12">
                            <div class="form-group">
                              <label for="avatar" class="font-weight-bold">Foto Profile</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                  <label class="custom-file-label" for="avatar">Pilih foto...</label>
                              </div>
                              @error('avatar')
                              <div class="invalid-feedback d-block">{{$message}}</div>
                              @enderror
                          </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer py-4 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection