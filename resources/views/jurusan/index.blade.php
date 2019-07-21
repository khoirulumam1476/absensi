@extends('layout.app')

@section('content')

<div aria-hidden="true" aria-labelledby="jurusanModalLabel" class="modal fade" id="inputJurusan" role="dialog" tabindex="-1">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="jurusanModalLabel">Input Data Jurusan</h5>
		<a aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></a>
	  </div>
	 	 <div class="modal-body">
			<form action="/jurusan/tambah" method="POST">
		 	 {{csrf_field()}}
				  <div class="form-group">
					<label for="Kode Jurusan">Kode Jurusan</label>
					<input name="kode_jurusan" type="nomor" class="form-control" id="emailAdress" placeholder="Kode jurusan">
				  </div>
				  <div class="form-group">
					<label for="Jurusan">Jurusan</label>
					<input name="jurusan" type="text" class="form-control" id="emailAdress" placeholder="jurusan">
				  </div>
				  <div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button> <input class="btn btn-primary" type="submit" value="Simpan">
				</div>
			</form>
		</div>
	  </div>
	</div>
</div>

<div class="section-content">
	<div class="container"> 
		<div class="row">
	 		@if(session('sukses'))  
				<div class="col-12">
					<div id="success-alert" class="alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
				</div>
			@endif
		<div class="col-10">
		  <h2>Jumlah Jurusan Sekarang : {{count($data_jurusan)}}</h2>
		</div>
		<div class="col-2">
		  <button class="btn btn-primary" data-target="#inputJurusan" data-toggle="modal" type="button">Tambah Data <i class="fa fa-plus"></i>
		  </button>
		</div>
		  <table class="table table-bordered table-striped table-skripsi">
			<thead class="table-dark">
			  <tr>
				<th>Kode Jurusan</th>
				<th>Jurusan</th>
				<th>Aksi</th>
			  </tr>
			</thead>
			<tbody>
			   @foreach($data_jurusan as $jurusan)
			<tr>
			  <td>{{ $jurusan->kode_jurusan }}</td>
			  <td>{{ $jurusan->jurusan }}</td>
			  <td class="text-center">
				<div class="btn-group" role="group" aria-label="Basic example">
				  
				  <a href="/jurusan/{{$jurusan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
				  <a href="/jurusan/{{$jurusan->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan Dihapus?')">Hapus</a>
				</div>
			  </td>
			</tr>
			@endforeach
			</tbody>
		  </table>
		</div>
	</div>
</div>
@endsection