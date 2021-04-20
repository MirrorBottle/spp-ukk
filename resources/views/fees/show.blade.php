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
                      <a href="{{route('fee.index')}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                      </a>
                    </div>
                    <div class="col-12 mt-4">
                      <div class="row mt-4">
                        <div class="col-12">
                          <h2>Data SPP</h2>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Tahun</span>
                              <p>{{ $fee->year_label }}</p>
                            </div>
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Nominal</span>
                              <p>{{ $fee->fee_label }}</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 mt-4 pt-3">
                          <h2>Pembayaran</h2>
                        </div>
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table table-datatable align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah Bayar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($fee->payments as $payment)
                                  <tr>
                                    <td>{{$payment->student->name}}</td>
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->paid_label}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="col-12 mt-4 pt-3">
                          <h2>Siswa</h2>
                        </div>
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table table-datatable align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Kelas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($fee->students as $student)
                                  <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->nisn}}</td>
                                    <td>{{$student->class->name}}</td>
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