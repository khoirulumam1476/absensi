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

			<form action="" method="GET">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label for="validationCustom02">Kelas</label> 
						<select name="kelas" class="form-control" id="sel1">
								<option value="0">Semua Kelas</option>
								@foreach( $data_kelas as $kelas )
									<option value="{{$kelas->id}}" @if(Request::get('kelas') == $kelas->id ) selected @endif>{{$kelas->nama_kelas}}</option>
								@endforeach
						  </select>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationCustom02">Semester</label> 
						<select name="semester" class="form-control" id="sel1">
							<option value="0">Semua Semester</option>
							<option value="ganjil" @if(Request::get('semester') == 'ganjil' ) selected @endif >Ganjil</option>
							<option value="genap" @if(Request::get('semester') == 'genap' ) selected @endif>Genap</option>
						</select>
					</div>
					<div class="col-md-3 mb-3">
						<label for=""></label>
						<input type="submit" value="Tampilkan" class="form-control btn btn-primary btn-filter">
					</div>
				</div>
			</form>
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
			<a href="/absensi/export" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
			
		</div>
	</div>
</div>

@endsection