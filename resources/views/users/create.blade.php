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
                                <h3 class="mb-0">Add New User</h3>
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
                            <input type="text" value="{{ old('name') }}" class="form-control " name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" value="{{ old('email') }}" class="form-control " name="email" id="email">
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
                                <input class="form-control datepicker" value="{{ old('birthdate') }}" placeholder="Select date" type="text" name="birthdate" id="birthdate">
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
                                        <input type="radio" {{ old('gender') === "0" ? 'checked' : '' }}  id="gender2" name="gender" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="gender2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ old('gender') === "1" ? 'checked' : '' }} id="gender1" name="gender" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="gender1">Laki-laki</label>
                                    </div>
                                </div>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="font-weight-bold">Password</label>
                            <input type="password" value="{{ old('password') }}" class="form-control " name="password" id="password">
                            @error('password')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="font-weight-bold">Konfirmasi Password</label>
                            <input type="password" value="{{ old('password_confirm') }}" class="form-control " name="password_confirm" id="password_confirm">
                            @error('password_confirm')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer py-4 text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save mr-2"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection