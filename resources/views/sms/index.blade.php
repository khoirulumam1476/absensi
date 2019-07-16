@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		@if(session('sukses'))  
			<div class="col-12">
				<div id="success-alert" class="alert alert-success" role="alert">
				  {{session('sukses')}}
				</div>
			</div>
		@endif
		<div class="wrapper">
			<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a aria-controls="pills-jam-pertama" aria-selected="true" class="nav-link active" data-toggle="pill" href="#jam-pertama" id="pills-jam-pertama-tab" role="tab">Jam Pertama</a>
				</li>
				<li class="nav-item">
					<a aria-controls="pills-jam-kedua" aria-selected="false" class="nav-link" data-toggle="pill" href="#jam-kedua" id="pills-jam-kedua-tab" role="tab">Jam Kedua</a>
				</li>
				<li class="nav-item">
					<a aria-controls="pills-jam-ketiga" aria-selected="false" class="nav-link" data-toggle="pill" href="#jam-ketiga" id="pills-jam-ketiga-tab" role="tab">Jam Ketiga</a>
				</li>
				<li class="nav-item">
					<a aria-controls="pills-jam-keempat" aria-selected="false" class="nav-link" data-toggle="pill" href="#jam-keempat" id="pills-jam-keempat-tab" role="tab">Jam Keempat</a>
				</li>
				
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div aria-labelledby="pills-jam-pertama-tab" class="tab-pane fade show active" id="jam-pertama" role="tabpanel">
					<div class="col-12">
						<h2>Daftar Tidak Masuk Jam Pertama</h2>
					</div>
					<form action="/sms/kirimsms" method="POST">
						{{csrf_field()}}
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
						<input type="submit" value="Kirim" class="btn btn-primary">
					</form>
				</div>

				<div aria-labelledby="pills-jam-kedua-tab" class="tab-pane fade" id="jam-kedua" role="tabpanel">
					<div class="col-12">
						<h2>Daftar Tidak Masuk Jam Kedua</h2>
					</div>
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

				<div aria-labelledby="pills-jam-ketiga-tab" class="tab-pane fade" id="jam-ketiga" role="tabpanel">
					<div class="col-12">
						<h2>Daftar Tidak Masuk Jam Ketiga</h2>
					</div>
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

				<div aria-labelledby="pills-jam-keempat-tab" class="tab-pane fade" id="jam-keempat" role="tabpanel">
					<div class="col-12">
						<h2>Daftar Tidak Masuk Jam Keempat</h2>
					</div>
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
	</div>
</div>

@endsection