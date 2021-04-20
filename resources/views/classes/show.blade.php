@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 d-flex flex-row justify-content-between">
                      <a href="{{route('class.index')}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                      </a>
                    </div>
                    <div class="col-12 mt-4">
                      <div class="row mt-4">
                        <div class="col-12">
                          <h2>Data Kelas</h2>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Nama</span>
                              <p>{{ $class->name }}</p>
                            </div>
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Kompetensi Keahlian</span>
                              <p>{{ $class->competition->name }}</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 mt-4 pt-3">
                          <h2>Daftar Siswa</h2>
                        </div>
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table table-datatable align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Jenis Kelamin</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($class->students as $student)
                                  <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->nisn}}</td>
                                    <td>{{$student->nis}}</td>
                                    <td>{{$student->gender_label}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
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