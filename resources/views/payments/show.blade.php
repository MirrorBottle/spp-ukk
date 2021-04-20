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
                      <a href="{{route('payment.index')}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                      </a>
                    </div>
                    <div class="col-12 mt-4">
                      <div class="row mt-4">
                        <div class="col-12">
                          <h2>Data Pembayaran</h2>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Siswa</span>
                              <p>{{ $payment->student->name }} - {{$payment->student->nisn}}</p>
                            </div>
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Petugas</span>
                              <p>{{ $payment->user->name }}</p>
                            </div>
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Tanggal Pembayaran</span>
                              <p>{{ $payment->date_label }}</p>
                            </div>
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">Jumlah Bayar</span>
                              <p>{{ $payment->paid_label }}</p>
                            </div>
                            <div class="col-md-6">
                              <span class="font-weight-bold d-block text-small text-muted">SPP</span>
                              <p>{{ $payment->fee->year_label }} - {{$payment->fee->fee_label}}</p>
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