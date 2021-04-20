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
      width: 70%;
      margin-left: 15%;
    }
    .body .table tr td {
      padding: .5rem;
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
    <h2>Resi Pembayaran SPP</h2>
  </div>
  <div class="body">
    
    <table class="table">
      <tr>
        <td><h3>Detail Pembayaran</h3></td>
      </tr>
      <tr>
        <td class="title">Nama Siswa</td>
        <td class="value">: {{$payment->student->name}}</td>
      </tr>
      <tr>
        <td class="title">NISN Siswa</td>
        <td class="value">: {{$payment->student->nisn}}</td>
      </tr>
      <tr>
        <td class="title">NIS Siswa</td>
        <td class="value">: {{$payment->student->nis}}</td>
      </tr>
      <tr>
        <td class="title">Petugas Penerima</td>
        <td class="value">: {{$payment->user->name}}</td>
      </tr>
      <tr>
        <td class="title">SPP</td>
        <td class="value">: {{$payment->fee->year_label}} - {{$payment->fee->fee_label}}</td>
      </tr>
      <tr>
        <td class="title">Tanggal Pembayaran</td>
        <td class="value">: {{$payment->date_label}}</td>
      </tr>
      <tr>
        <td class="title">Total Pembayaran</td>
        <td class="value">: {{$payment->paid_label}}</td>
      </tr>
    </table>
  </div>
  <div class="footer">
    <p>Haraf resi disimpan sebagai bukti pembayaran.</p>
  </div>
</body>
</html>