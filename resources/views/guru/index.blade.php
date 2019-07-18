@extends('layout.app')

@section('content')

<!-- MODAL TAMBAH DATA -->
<div aria-hidden="true" aria-labelledby="guruModalLabel" class="modal fade" id="inputGuru" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="guruModalLabel">Input Data Guru</h5>
				<a aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></a>
			</div>
			<div class="modal-body">
				<form action="/guru/tambah" method="POST">
						{{csrf_field()}}
					  <div class="form-group">
						<label for="Nip">NIP:</label>
						<input name="nip" type="text" class="form-control" id="TEXT">
					  </div>
					  <div class="form-group">
						<label for="Nama Guru">Nama Guru:</label>
						<input name="nama_guru" type="text" class="form-control" id="Nama Guru">
					  </div>
					  <div class="form-group">
						<label for="Email">Email:</label>
						<input name="email_guru" type="email" class="form-control">
					  </div>
					  <div class="form-group">
						<label for="Nama Guru">Tempat Tanggal Lahir:</label>
						<input name="ttl" type="text" class="form-control" id="Nama Guru">
					  </div>
					   <div class="form-group">
						  <label for="sel1">Jenis Kelamin:</label>
						  <select name="jenis_kelamin" class="form-control" id="sel1">
							<option>Laki-laki</option>
							<option>Perempuan</option>
						  </select>
						</div>
					  <div class="form-group">
						<label for="Agama">Agama:</label>
						<select name="agama" class="form-control" id="sel1">
							<option value="Islam">Islam</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Katolik">Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
					  	</select>
					  </div>
					  <div class="form-group">
						<label for="Telepon">Telepon:</label>
						<input name="telepon" type="text" class="form-control" id="Telepon">
					  </div>
					  <div class="form-group">
						<label for="Alamat">Alamat:</label>
						<input name="alamat" type="text" class="form-control" id="Alamat">
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
				<h2>Jumlah Guru Sekarang : {{count($data_guru)}}</h2>
			</div>
			<div class="col-2">
				<button class="btn btn-primary" data-target="#inputGuru" data-toggle="modal" type="button">Tambah Data <i class="fa fa-plus"></i>
				</button>
			</div>
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
				  <tr>
					<th>NIP</th>
					<th>Nama</th>
					<th>Tempat Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Telephone</th>
					<th>Alamat</th>
					<th>Aksi</th>
				  </tr>
				</thead>
				<tbody>
				@foreach($data_guru as $guru)
				  <tr>
					<td>{{ $guru->nip }}</td>
					<td>{{ $guru->nama_guru }}</td>
					<td>{{ $guru->ttl }}</td>
					<td>{{ $guru->jenis_kelamin}}</td>
					<td>{{ $guru->agama }}</td>
					<td>{{ $guru->telepon }}</td>
					<td>{{ $guru->alamat }}</td>
					<td class="text-center">
						<div class="btn-group" role="group" aria-label="Basic example">
							<a href="/guru/{{$guru->id}}/detail" class="btn btn-info btn-sm">Detail</a>
							<a href="/guru/{{$guru->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
							<a href="/guru/{{$guru->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan Dihapus?')">Hapus</a>
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