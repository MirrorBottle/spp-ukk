@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Roles</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('role.create')}}" class="btn btn-sm btn-primary">Add role</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-datatable align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Users</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->users_count}}</td>
                                    <td class="text-right">
                                        <a href="{{route('role.show', $role->id)}}" class="btn btn-primary btn-sm mr-1">
                                            <i class="fas fa-eye mr-1"></i>
                                            Detail
                                        </a>
                                        <a href="{{route('role.edit', $role->id)}}" class="btn btn-warning btn-sm mr-1">
                                            <i class="fas fa-pen mr-1"></i>
                                            Edit
                                        </a>
                                        <button data-url="{{route('role.destroy', $role->id)}}" class="btn btn-danger btn-sm mr-1 delete-btn">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection