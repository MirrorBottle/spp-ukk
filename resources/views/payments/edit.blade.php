@extends('layouts.app')

@section('content')
    @include('layouts.headers.header')
    
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form class="form" action="{{route('payment.update', $payment->id)}}" id="form" method="POST" enctype="multipart/form-data">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ubah Data Pembayaran SPP</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="student" class="font-weight-bold">Siswa Pembayar</label>
                          <select name="student_id" id="student" class="form-control select2 pt-3">
                            @foreach ($students as $student)
                            <option {{$payment->student->id === $student->id ? "selected" : ""}} value="{{$student->id}}" data-fee="{{$student->fee->year_label}} - {{$student->fee->fee_label}}">{{$student->nisn}} - {{$student->name}}</option>
                            @endforeach
                          </select>
                          @error('student_id')
                          <div class="invalid-feedback d-block">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="fee" class="font-weight-bold">SPP</label>
                          <input type="text" disabled class="form-control " name="fee" id="fee">
                        </div>
                        <div class="form-group">
                          <label for="date" class="font-weight-bold">Tanggal Pembayaran</label>
                          <div class="input-group">
                             <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                              </div>
                              <input class="form-control datepicker-second" value="{{ $payment->date_label }}" placeholder="Select date" type="text" name="date" id="date">
                          </div>
                          @error('date')
                          <div class="invalid-feedback d-block">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="paid_mock" class="font-weight-bold">Jumlah Bayar</label>
                          <input type="number" value="{{ old('paid', $payment->paid) }}" maxlength="10" class="form-control" name="paid" id="paid">
                          @error('paid')
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
    @push('js')
        <script>
          $(function() {
            const fee = $($(`#student option[selected]`)[0]).data('fee');
            $('input#fee').val(fee);

            $('#student').on('change', function(e) {
              const fee = $($(`option[value='${$('#student').val()}']`)[0]).data('fee');
              $('input#fee').val(fee);
            });
          })
        </script>
    @endpush
    </div>
@endsection