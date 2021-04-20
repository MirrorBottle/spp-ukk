@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form class="form" action="{{route('fee.store')}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tambah SPP Baru</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">batal</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                          <label for="year" class="font-weight-bold">Tahun</label>
                          <div class="input-group">
                             <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                              </div>
                              <input class="form-control yearpicker" value="{{ old('year') }}" placeholder="Pilih tahun" type="text" name="year" id="year">
                          </div>
                          @error('year')
                          <div class="invalid-feedback d-block">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="fee" class="font-weight-bold">Nominal</label>
                          <input type="number" value="{{ old('fee') }}" class="form-control " name="fee" id="fee">
                          @error('fee')
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