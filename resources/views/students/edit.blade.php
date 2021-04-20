@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form class="form" action="{{route('student.update', $student->id)}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Siswa #{{$student->nisn}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nisn" class="font-weight-bold">NISN</label>
                            <input type="text" value="{{ old('nisn', $student->nisn) }}" maxlength="10" class="form-control " name="nisn" id="nisn">
                            @error('nisn')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nis" class="font-weight-bold">NIS</label>
                            <input type="text" value="{{ old('nis', $student->nis) }}" maxlength="8" class="form-control " name="nis" id="nis">
                            @error('nis')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" value="{{ old('name', $student->name) }}" class="form-control " name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="font-weight-bold">No. Telpon</label>
                            <input type="text" value="{{ old('phone_number', $student->phone_number) }}" maxlength="14" class="form-control " name="phone_number" id="phone_number">
                            @error('phone_number')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="font-weight-bold">Tanggal Lahir</label>
                            <div class="input-group">
                               <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker-second" value="{{ old('birthdate', $student->birthdate) }}" placeholder="Select date" type="text" name="birthdate" id="birthdate">
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
                                        <input type="radio" {{ old('gender') === "0" || $student->gender === "0" ? 'checked' : '' }}  id="gender2" name="gender" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="gender2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ old('gender') === "1" || $student->gender === "1" ? 'checked' : '' }} id="gender1" name="gender" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="gender1">Laki-laki</label>
                                    </div>
                                </div>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="4" class="form-control">{{ old('address', $student->address) }}</textarea>
                            @error('address')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fee" class="font-weight-bold">SPP</label>
                            <select name="fee_id" id="fee" class="form-control select2 pt-3">
                                @foreach ($fees as $fee)
                                <option {{$student->fee->id === $fee->id ? "selected" : ""}} value="{{$fee->id}}">{{$fee->year_label}} - {{$fee->fee_label}}</option>
                                @endforeach
                            </select>
                            @error('fee_id')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class" class="font-weight-bold">Kelas</label>
                            <select name="class_id" id="class" class="form-control select2 pt-3">
                                @foreach ($classes as $class)
                                <option {{$student->class->id === $class->id ? "selected" : ""}} value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            @error('class_id')
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