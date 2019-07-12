@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="wrapper">
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="validationCustom01">Mapel</label> 
					<input class="form-control" id="validationCustom01" data-provide="datepicker" placeholder="Tanggal" type="text" value="" name="tanggal">
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom02">Kelas</label> 
					<select name="mapel" class="form-control" id="sel1">
						<option value="MATEMATIKA">MATEMATIKA</option>
						<option value="BAHASA INDONESIA">BAHASA INDONESIA</option>
						<option value="PPKN">PPKN</option>
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom02">Semester</label> 
					<select name="mapel" class="form-control" id="sel1">
						<option value="MATEMATIKA">MATEMATIKA</option>
						<option value="BAHASA INDONESIA">BAHASA INDONESIA</option>
						<option value="PPKN">PPKN</option>
					</select>
				</div>
				<div class="col-md-3 mb-3">
					<input type="submit" value="Tampilkan">
				</div>
			</div>
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
					<tr class="d-flex">
						<th class="col-1">No</th>
						<th class="col-1">NIS</th>
						<th class="col-6">Nama</th>
						<th class="col-1">Hadir</th>
						<th class="col-1">Sakit</th>
						<th class="col-1">Izin</th>
						<th class="col-1">Alpa</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data_absensi as $index => $siswa )
						<tr class="d-flex">
							<td class="col-1 text-center">{{$index+1}}</td>
							<td class="col-1">{{$siswa['nis']}}</td>
							<td class="col-6 text-uppercase">{{$siswa['nama']}}</td>
							<td class="text-center col-1">{{$siswa['hadir']}}</td>
							<td class="text-center col-1">{{$siswa['sakit']}}</td>
							<td class="text-center col-1">{{$siswa['ijin']}}</td>
							<td class="text-center col-1">{{$siswa['alpa']}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection