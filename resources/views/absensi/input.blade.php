@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="wrapper">
			@if(session('sukses'))  
				<div class="col-12">
					<div id="success-alert" class="alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
				</div>
			@endif
			
			<form action="/absensi/simpan" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id_kelas" value="{{ app('request')->input('id_kelas') }}">
				<div class="col-md-4 mb-3">
					<div class="form-row">
						<label for="validationCustom01">Tanggal</label> 
						<input class="form-control" type="text" value="{{ date('Y-m-d H:i:s') }}" disabled>
						<input class="form-control" type="hidden" value="{{ date('Y-m-d H:i:s') }}" name="tanggal">
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="form-row">
						<label for="validationCustom02">Mata Pelajaran</label> 
						<select name="id_mapel" class="form-control" id="sel1">
							@foreach( $data_mapel as $mapel )
						    	<option value="{{$mapel->id}}">{{$mapel->nama_mapel}}</option>
							@endforeach
					  </select>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="form-row">
						<label for="nama-guru">Nama Guru</label> 
						<select name="id_guru" class="form-control" id="sel1">
							@foreach( $data_guru as $guru )
						    	<option value="{{$guru->id}}">{{$guru->nama_guru}}</option>
							@endforeach
					  </select>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="form-row">
						<label for="semester">Semester</label> 
						<select name="semester" class="form-control" id="sel1">
					    	<option value="ganjil">Ganjil</option>
					    	<option value="genap">Genap</option>
					  	</select>
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<div class="form-row">
						<label for="jam_pelajaran">Jam Pelajaran</label> 
						<select name="jam_pelajaran" class="form-control" id="sel1">
					    	<option value="pertama">Pertama</option>
					    	<option value="kedua">Kedua</option>
					    	<option value="ketiga">Ketiga</option>
					    	<option value="keempat">Keempat</option>
					  	</select>
					</div>
				</div>

				<table class="table table-bordered table-striped table-skripsi">
					<thead class="table-dark">
						<tr class="d-flex">
							<th class="col-1">No</th>
							<th class="col-7">Nama</th>
							<th class="col-1">Masuk</th>
							<th class="col-1">Sakit</th>
							<th class="col-1">Izin</th>
							<th class="col-1">Alpa</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $data_siswa as $index => $siswa )
						<tr class="d-flex">
							<td class="col-1 text-center">{{$index+1}}</td>
							<td class="col-7 text-uppercase">{{$siswa->nama}}</td>
							<td class="text-center col-1">
								<input type="radio" name="absen[{{$siswa->id}}]" value="H">
							</td>
							<td class="text-center col-1">
								<input type="radio" name="absen[{{$siswa->id}}]" value="S">
							</td>
							<td class="text-center col-1">
								<input type="radio" name="absen[{{$siswa->id}}]" value="I">
							</td>
							<td class="text-center col-1">
								<input type="radio" name="absen[{{$siswa->id}}]" value="A">
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="col-md-4 mb-3">
					<input class="btn btn-primary" type="submit" value="Simpan">
				</div>
			</form>
			
		</div>
	</div>
</div>

@endsection