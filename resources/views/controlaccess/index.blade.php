@extends('layout.app')

@section('content')

<div class="container text-center">
  <h2>Jumlah Login Sekarang : 2</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Sandi</th>
        <th>Reset</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1001</td>
        <td>dianku90</td>
        <td><a href="">Hapus</a></td>
      </tr>
      <tr>
        <td>2</td>
        <td>1102</td>
        <td>Ananda3</td>
        <td><a href="">Hapus</a></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection