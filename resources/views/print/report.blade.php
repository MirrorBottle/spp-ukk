<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pembayaran SPP</title>
  <style>
    html {
      font-family: 'Calibri', sans-serif;
    }
    .header {
      text-align: center;
    }
    .body {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    .body .table {
      width: 100%;
    }
    .body .table tr td,
    .body .table tr th {
      padding: .4rem;
      text-align: center;
      border: 1px solid #000;
    }
    .body .table tr td.title {
      font-weight: bold;
    }
    .footer {
      text-align: center;
      padding-top: 1rem;
    }
    .footer p {
      text-decoration: underline;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Laporan Pembayaran SPP</h2>
  </div>
  <div class="body">
    <table class="table" cellspacing="0">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama siswa</th>
          <th>NISN siswa</th>
          <th>Petugas</th>
          <th>Tanggal Bayar</th>
          <th>Total Pembayaran</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($payments as $payment)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $payment->student->name }}</td>
            <td>{{ $payment->student->nisn }}</td>
            <td>{{ $payment->user->name }}</td>
            <td>{{ $payment->date_label }}</td>
            <td>{{ $payment->paid_label }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>