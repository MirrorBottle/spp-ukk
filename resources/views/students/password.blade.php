@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
          @include('components.message')
        </div>
        <div class="col-12">
            <div class="card shadow">
                <form class="form" action="{{route('student.password')}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ubah Password</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                          <label for="password" class="font-weight-bold">Password Saat Ini</label>
                          <input type="password" value="{{ old('password') }}" class="form-control " name="password" id="password">
                          @error('password')
                          <div class="invalid-feedback d-block">{{$message}}</div>
                          @enderror
                      </div>
                        <div class="form-group">
                            <label for="new_password" class="font-weight-bold">Password Baru</label>
                            <input type="password" value="{{ old('new_password') }}" class="form-control " name="new_password" id="new_password">
                            @error('new_password')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="font-weight-bold">Konfirmasi Password Baru</label>
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