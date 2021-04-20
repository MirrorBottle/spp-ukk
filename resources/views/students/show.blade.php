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
                        Kembali
                      </a>
                      
                    </div>
                    <div class="col-md-12 col-sm-12 mt-3">
                      <div class="row mt-4">
                        <div class="col-12">
                          <h2>Data Siswa</h2>
                        </div>
                        <div class="col-12">
                          <div class="row mt-4">
                            <div class="col-12">
                              <div class="row">
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Nama</span>
                                  <p>{{ $student->name }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Kelas</span>
                                  <p>{{ $student->class->name }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">NISN</span>
                                  <p>{{ $student->nisn }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">NIS</span>
                                  <p>{{ $student->nis }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">SPP</span>
                                  <p>{{ $student->fee->year_label }} - {{$student->fee->fee_label}}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Tanggal Lahir</span>
                                  <p>{{ $student->birthdate_label }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">Jenis Kelamin</span>
                                  <p>{{ $student->gender_label }}</p>
                                </div>
                                <div class="col-md-6">
                                  <span class="font-weight-bold d-block text-small text-muted">No. Telpon</span>
                                  <p>{{ $student->phone_number }}</p>
                                </div>
                                <div class="col-md-12">
                                  <span class="font-weight-bold d-block text-small text-muted">Alamat</span>
                                  <p>{{ $student->address }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 mt-4 pt-3">
                          <h2>Histori Pembayaran</h2>
                        </div>
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table table-datatable align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">Total Pembayaran</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($student->payments as $payment)
                                  <tr>
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->paid_label}}</td>
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
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection