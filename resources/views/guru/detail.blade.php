@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="row">
				<h2>Detail Data Guru</h2>
			</div>
				 <table class="table table-bordered table-striped table-skripsi">
					<tbody>
						<tr>
							<td class="col-6">NIP</td>
							<td class="col-6">{{$guru->nip}}</td>
						</tr>
						<tr>
							<td class="col-6">Nama Guru</td>
							<td class="col-6">{{$guru->nama_guru}}</td>
						</tr>
						<tr>
							<td class="col-6">Tempat Tanggal Lahir</td>
							<td class="col-6">{{$guru->ttl}}</td>
						</tr>
						<tr>
							<td class="col-6">Jenis Kelamin</td>
							<td class="col-6">{{$guru->jenis_kelamin}}</td>
						</tr>
						<tr>
							<td class="col-6">Agama</td>
							<td class="col-6">{{$guru->agama}}</td>
						</tr>
						<tr>
							<td class="col-6">Telephone</td>
							<td class="col-6">{{$guru->telepon}}</td>
						</tr>
						<tr>
							<td class="col-6">Alamat</td>
							<td class="col-6">{{$guru->alamat}}</td>
						</tr>
					 </tbody>
				 </table>
			</div>
	</div>
</div>

@endsection