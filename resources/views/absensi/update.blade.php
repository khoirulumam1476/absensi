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
				<input type="hidden" name="id_kelas" value="10">
				<input type="hidden" name="id_guru" value="5">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationCustom01">Tanggal</label> 
						<input class="form-control" id="validationCustom01" data-provide="datepicker" placeholder="Tanggal" type="text" value="" name="tanggal">
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationCustom02">Mata Pelajaran</label> 
						<select name="mapel" class="form-control" id="sel1">
							@foreach( $data_mapel as $mapel )
						    	<option value="{{$mapel->nama_mapel}}">{{$mapel->nama_mapel}}</option>
							@endforeach
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
							<td class="col-1">{{$index+1}}</td>
							<td class="col-7">{{$siswa->nama}}</td>
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