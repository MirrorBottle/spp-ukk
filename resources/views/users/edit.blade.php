@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form class="form" action="{{route('user.update', $user->id)}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Petugas #{{$user->id}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">batal</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="username" class="font-weight-bold">Username</label>
                            <input type="text" value="{{ old('username', $user->username) }}" class="form-control " name="username" id="username">
                            @error('username')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" value="{{ old('name', $user->name) }}" class="form-control " name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role" class="font-weight-bold">Hak Akses</label>
                            <select name="role_id" id="role" class="form-control select2 pt-3">
                                @foreach ($roles as $role)
                                <option {{$user->role->id === $role->id ? "selected" : ""}} value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
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