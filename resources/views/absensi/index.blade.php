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
			<form action="">
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
								<input type="radio" id="defaultInline1" name="absensi-status-{{$siswa->id}}">
							</td>
							<td class="text-center col-1">
								<input type="radio" id="defaultInline1" name="absensi-status-{{$siswa->id}}">
							</td>
							<td class="text-center col-1">
								<input type="radio" id="defaultInline1" name="absensi-status-{{$siswa->id}}">
							</td>
							<td class="text-center col-1">
								<input type="radio" id="defaultInline1" name="absensi-status-{{$siswa->id}}">
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</form>
			
		</div>
	</div>
</div>

@endsection