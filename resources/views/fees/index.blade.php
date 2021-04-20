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
                            <h3 class="mb-0">SPP</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('fee.create')}}" class="btn btn-sm btn-success">Tambah SPP</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-datatable align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Total Siswa</th>
                                    <th scope="col">Total Pembayaran</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $fee)
                                <tr>
                                    <td>{{$fee->year_label}}</td>
                                    <td>{{$fee->fee_label}}</td>
                                    <td><b>{{$fee->students->count()}}</b> Siswa</td>
                                    <td><b>{{$fee->payments->count()}}</b> Pembayaran</td>
                                    <td>
                                        <x-table-buttons :data="$fee" :route="$route" />
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