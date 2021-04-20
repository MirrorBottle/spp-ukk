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
                            <h3 class="mb-0">Siswa</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('student.create')}}" class="btn btn-sm btn-success">Tambah Siswa</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-datatable align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->nisn}}</td>
                                    <td>{{$student->nis}}</td>
                                    <td>{{$student->class->name}}</td>
                                    <td>
                                        <x-table-buttons :data="$student" :route="$route" />
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