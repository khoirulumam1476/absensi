@extends('layout.app')
@section('content')

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="siswamodal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="siswamodalLabel">Input Data Siswa</h5>
				<a aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></a>
			</div>
			<div class="modal-body">
				<form action="/siswa/tambah" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="email">NIS:</label> 
						<input name="nis" class="form-control" id="email" type="text">
					</div>
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input name="nama" class="form-control" id="Nama" type="nama">
					</div>
					<div class="form-group">
						<label for="tanggal Lahir">Tempat Tanggal Lahir:</label> 
						<input name="ttl" class="form-control" id="tanggal Lahir" type="tanggal lahir">
					</div>
					<div class="form-group">
						<label for="sel1">Jenis Kelamin:</label> 
						<select name="jenis_kelamin" class="form-control" id="sel1">
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
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
						<label for="Alamat">Alamat:</label> 
						<input name="alamat" class="form-control" id="Alamat" type="alamat">
					</div>
					<div class="form-group">
						<label for="sel1">Kelas:</label> 
						<select name="kelas" class="form-control" id="kelas">
							@foreach( $data_kelas as $kelas )
							<option value="{{$kelas->nama_kelas}}">{{$kelas->nama_kelas}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="Wali">Nama Wali:</label> 
						<input name="nama_wali" class="form-control" id="Wali" type="wali">
					</div>
					<div class="form-group">
						<label for="sel1">Jenis Kelamin:</label> 
						<select name="jenis_kelamin_wali" class="form-control" id="sel1">
							<option>Laki-laki</option>
							<option>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Agama">Agama:</label> 
						<select name="agama_wali" class="form-control" id="sel1">
							<option value="Islam">Islam</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Katolik">Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
					  	</select>
					</div>
					<div class="form-group">
						<label for="Pekerjaan">Pekerjaan:</label> 
						<input name="pekerjaan_wali" class="form-control" id="Pekerjaan" type="pekerjaan">
					</div>
					<div class="form-group">
						<label for="Telephone">Telepon:</label> 
						<input name="telepon_wali" class="form-control" id="Telephone" type="telephone">
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
				<h2>Jumlah Siswa Sekarang : {{count($data_siswa)}}</h2>
			</div>
			<div class="col-2">
				<button class="btn btn-primary" data-target="#siswamodal" data-toggle="modal" type="button">Tambah Data <i class="fa fa-plus"></i>
				</button>
			</div>
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Tempat Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Kelas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_siswa as $siswa)
					<tr>
						<td>{{ $siswa->nis }}</td>
						<td class="text-uppercase">{{ $siswa->nama }}</td>
						<td class="text-capitalize">{{ $siswa->ttl }}</td>
						<td class="text-center">{{ $siswa->jenis_kelamin }}</td>
						<td>{{ $siswa->agama }}</td>
						<td>{{ $siswa->alamat }}</td>
						<td>{{ $siswa->kelas }}</td>
						<td class="text-center">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a class="btn btn-info btn-sm">Detail</a>
								<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
								<a href="/siswa/{{$siswa->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan Dihapus?')">Hapus</a>
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