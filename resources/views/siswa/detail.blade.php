@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="row">
				<h2>Detail Data Siswa</h2>
			</div>
				 <table class="table table-bordered table-striped table-skripsi">
					<tbody>
						<tr>
							<td class="col-6">NIS</td>
							<td class="col-6">{{$siswa->nis}}</td>
						</tr>
						<tr>
							<td class="col-6">Nama Siswa</td>
							<td class="col-6">{{$siswa->nama}}</td>
						</tr>
						<tr>
							<td class="col-6">Tempat Tanggal Lahir</td>
							<td class="col-6">{{$siswa->ttl}}</td>
						</tr>
						<tr>
							<td class="col-6">Jenis Kelamin</td>
							<td class="col-6">{{$siswa->jenis_kelamin}}</td>
						</tr>
						<tr>
							<td class="col-6">Agama</td>
							<td class="col-6">{{$siswa->agama}}</td>
						</tr>
						<tr>
							<td class="col-6">Alamat</td>
							<td class="col-6">{{$siswa->alamat}}</td>
						</tr><tr>
							<td class="col-6">Kelas</td>
							<td class="col-6">{{$siswa->kelas}}</td>
						</tr><tr>
							<td class="col-6">Alamat</td>
							<td class="col-6">{{$siswa->alamat}}</td>
						</tr>
						<tr>
							<td class="col-6">Alamat</td>
							<td class="col-6">{{$siswa->alamat}}</td>
						</tr>
					 </tbody>
				 </table>
			</div>
	</div>
</div>

@endsection