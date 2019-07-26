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
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
					<tr class="d-flex">
						<th class="col-1">No</th>
						<th class="col-1">NIS</th>
						<th class="col-9">Nama</th>
						<th class="col-1">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $absensi as $index => $siswa )
						<tr class="d-flex">
							<td class="col-1 text-center">{{$index+1}}</td>
							<td class="col-1">{{$siswa['nis']}}</td>
							<td class="col-9 text-uppercase">{{$siswa['nama']}}</td>
							<td class="text-center col-1">{{$siswa['status']}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection