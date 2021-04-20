@extends('layouts.app')

@section('content')
    @role('staff')
    <div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Siswa</h5>
                                        <span class="h2 font-weight-bold mb-0">{{number_format($students)}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Pembayaran</h5>
                                        <span class="h2 font-weight-bold mb-0">{{number_format($total_payments)}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                            <i class="fas fa-money-check-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Saldo</h5>
                                        <span class="h2 font-weight-bold mb-0">Rp. {{number_format($paid)}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Data</h6>
                                <h2 class="mb-0">Pembayaran SPP Terbaru</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-minimal align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Siswa</th>
                                        <th scope="col">Waktu Pembayaran</th>
                                        <th scope="col">Total Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->user->name}}</td>
                                        <td>{{$payment->student->name}}</td>
                                        <td>{{$payment->date_label}}</td>
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
        @include('layouts.footers.auth', ['text' => 'text-success'])
    </div>
    @endrole
    @student
    <div>
        <div class="header bg-gradient-success pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">
                                    {{Auth::guard('students')->user()->name}} - {{Auth::guard('students')->user()->nisn}}
                                </h6>
                                <h2 class="mb-0">Histori Pembayaran SPP</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-datatable align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Waktu Pembayaran</th>
                                        <th scope="col">Total Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->user->name}}</td>
                                        <td>{{$payment->date_label}}</td>
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
        @include('layouts.footers.auth', ['text' => 'text-success'])
    </div>
    </div>
    @endstudent
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush