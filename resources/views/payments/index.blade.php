@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            @include('components.message')
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Histori Pembayaran SPP</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('payment.create')}}" class="btn btn-sm btn-success">Entri Pembayaran</a>
                            <a href="{{route('payment.export')}}" target="_blank" class="btn btn-sm btn-danger">
                                <i class="fas fa-print mr-2"></i>
                                Print Laporan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-datatable align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Petugas</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Waktu Pembayaran</th>
                                    <th scope="col">Total Pembayaran</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->student->name}}</td>
                                    <td>{{$payment->date_label}}</td>
                                    <td>{{$payment->paid_label}}</td>
                                    <td>
                                        <div class="text-right">
                                            <a href='{{route("$route.show", $payment->id)}}' class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-eye mr-1"></i>
                                                Detail
                                            </a>
                                            <a href='{{route("$route.print", $payment->id)}}' class="btn btn-info btn-sm mr-1" target="_blank">
                                                <i class="fas fa-print mr-1"></i>
                                                Print
                                            </a>
                                            @role('admin')
                                                <a href="{{route("$route.edit", $payment->id)}}" class="btn btn-warning btn-sm mr-1">
                                                    <i class="fas fa-pen mr-1"></i>
                                                    Edit
                                                </a>
                                                <button data-url="{{route("$route.destroy", $payment->id)}}" data-url-callback="{{route("$route.index")}}" class="btn btn-danger btn-sm mr-1 delete-button">
                                                    <i class="fas fa-trash-alt mr-1"></i>
                                                    Hapus
                                                </button>
                                            @endrole
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection