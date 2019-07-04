@extends('layout.app')

@section('content')

<div class="container text-left">
	<h4>Silahkan Pilih Kelas</h4>
</div>
<div class="container text-center">
	<h2>Jumlah kelas ada 9</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
				<th>Tidak Masuk</th>
				<th>Update</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>X-IPS</td>
				<td>0 Orang</td>
				<td>
					<a href="input_absensi.html">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>X-BAHASA</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>X-AGAMA</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>XI-IPS</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>5</td>
				<td>XI-BAHASA</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>6</td>
				<td>XI-AGAMA</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>7</td>
				<td>XII-IPS</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>8</td>
				<td>XII-BAHASA</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
			<tr>
				<td>9</td>
				<td>XII-AGAMA</td>
				<td>0 Orang</td>
				<td>
					<a href="">Absensi</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection