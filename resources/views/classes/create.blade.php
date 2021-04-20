@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form class="form" action="{{route('class.store')}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tambah Kelas Baru</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('class.index')}}" class="btn btn-sm btn-danger">batal</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                          <label for="name" class="font-weight-bold">Nama</label>
                          <input type="text" value="{{ old('name') }}" class="form-control " name="name" id="name">
                          @error('name')
                          <div class="invalid-feedback d-block">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="competition" class="font-weight-bold">Kompetensi Keahlian</label>
                          <select name="competition_id" id="competition" class="form-control select2 pt-3">
                              @foreach ($competitions as $competition)
                              <option value="{{$competition->id}}">{{$competition->name}}</option>
                              @endforeach
                          </select>
                          @error('competition_id')
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