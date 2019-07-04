@extends('layout.app')

@section('content')

<div class="form_rekap">
	<div class="container">
		<div class="row">
			<div class="col-xs-2">
				<div class="form-group">
					<label for="sel1">Pilih Mapel:</label> <select class="form-control" id="sel1">
						<option>
							...
						</option>
						<option>
							Semua Mapel
						</option>
						<option>
							Matematika
						</option>
						<option>
							Bahasa Indonesia
						</option>
						<option>
							Agama
						</option>
					</select>
				</div>
				<div class="form-group">
					<label for="sel1">Pilih Kelas:</label> <select class="form-control" id="sel1">
						<option>
							...
						</option>
						<option>
							X-IPS
						</option>
						<option>
							X-BAHASA
						</option>
						<option>
							X-AGAMA
						</option>
						<option>
							XI-IPS
						</option>
						<option>
							XI-BAHASA
						</option>
						<option>
							XI-AGAMA
						</option>
						<option>
							XII-IPS
						</option>
						<option>
							XII-BAHASA
						</option>
						<option>
							XII-AGAMA
						</option>
					</select>
				</div>
				<div class="form-group">
					<label for="sel1">Semester:</label> <select class="form-control" id="sel1">
						<option>
							...
						</option>
						<option>
							Ganjil
						</option>
						<option>
							Genap
						</option>
					</select>
				</div>
				<div class="checkbox">
					<button class="btn btn-primary" type="submit">Tampilkan</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container text-center">
	<h2>Jumlah Siswa Sekarang : 2</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Sakit</th>
				<th>Izin</th>
				<th>Alpha</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>1001</td>
				<td>Amin</td>
				<td>1</td>
				<td>0</td>
				<td>5</td>
			</tr>
			<tr>
				<td>2</td>
				<td>1102</td>
				<td>Ana</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="form_cetak">
	<div class="container">
		<div class="row">
			<div class="col-xs-2">
				<div class="checkbox">
					<button class="btn btn-primary" type="submit">Cetak</button>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection