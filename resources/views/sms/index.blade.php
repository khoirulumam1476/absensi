@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="wrapper">
			
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
					<tr class="d-flex">
						<th class="col-1">No</th>
						<th class="col-2">NIS</th>
						<th class="col-5">Nama</th>
						<th class="col-2">Kelas</th>
						<th class="col-2">status</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data_absensi as $index => $absen )
						<tr class="d-flex">
							<td class="col-1 text-center">{{$index+1}}</td>
							<td class="col-2">{{$absen['nis']}}</td>
							<td class="col-5 text-uppercase">{{$absen['nama']}}</td>
							<td class="col-2 text-uppercase"></td>
							<td class="text-center col-2">{{$absen['status']}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection