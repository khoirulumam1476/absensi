@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="wrapper">
			<form action="">
				<table class="table table-bordered table-striped table-skripsi">
					<thead class="table-dark">
						<tr class="d-flex">
							<th class="col-1">No</th>
							<th class="col-7">Kelas</th>
							<th class="col-2">Tidak Masuk</th>
							<th class="col-2">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $data_kelas as $index => $kelas )
						<tr class="d-flex">
							<td class="col-1 text-center">{{$index+1}}</td>
							<td class="col-7">{{$kelas['nama_kelas']}}</td>
							<td class="col-2 text-center">
								{{$kelas['tidak_masuk']}} Siswa
							</td>
							<td class="col-2 text-center">
								<a href="/absensi/input?id_kelas={{$kelas['id_kelas']}}" class="btn btn-primary btn-sm">Update</a>
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