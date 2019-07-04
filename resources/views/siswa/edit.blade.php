@extends('layout.app')
@section('content')



<div class="section-content">
	<div class="container"> 
		<div class="row">
			@if(session('sukses'))  
				<div class="alert alert-success" role="alert">
				  {{session('sukses')}}
				</div>
			@endif
			<div class="col-10">
				<h2>Edit Data Siswa</h2>
			</div>
			<div class="col-6">
				<form action="/siswa/{{$siswa->id}}/update" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="email">NIS:</label> 
						<input name="nis" class="form-control" id="email" type="text" value="{{$siswa->nis}}">
					</div>
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input name="nama" class="form-control" id="Nama" type="text" value="{{$siswa->nama}}">
					</div>
					<div class="form-group">
						<label for="tanggal Lahir">Tempat Tanggal Lahir:</label> 
						<input name="ttl" class="form-control" id="tanggal Lahir" type="text" value="{{$siswa->ttl}}">
					</div>
					<div class="form-group">
						<label for="sel1">Jenis Kelamin:</label> 
						<select name="jenis_kelamin" class="form-control" id="sel1">
							<option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
							<option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Agama">Agama:</label> 
						<input name="agama" class="form-control" id="Agama" type="text" value="{{$siswa->agama}}">
					</div>
					<div class="form-group">
						<label for="Alamat">Alamat:</label> 
						<input name="alamat" class="form-control" id="Alamat" type="text" value="{{$siswa->alamat}}">
					</div>
					<div class="form-group">
						<label for="sel1">Kelas:</label> 
						<select name="kelas" class="form-control" id="sel1">
							<option value="X-IPS" @if($siswa->jenis_kelamin == 'X-IPS') selected @endif>X-IPS</option>
							<option value="X-BAHASA" @if($siswa->jenis_kelamin == 'X-BAHASA') selected @endif>X-BAHASA</option>
							<option value="X-AGAMA" @if($siswa->jenis_kelamin == 'X-AGAMA') selected @endif>X-AGAMA</option>
							<option value="XI-IPS" @if($siswa->jenis_kelamin == 'XI-IPS') selected @endif>XI-IPS</option>
							<option value="XI-BAHASA" @if($siswa->jenis_kelamin == 'XI-BAHASA') selected @endif>XI-BAHASA</option>
							<option value="XI-AGAMA" @if($siswa->jenis_kelamin == 'XI-AGAMA') selected @endif>XI-AGAMA</option>
							<option value="XII-IPS" @if($siswa->jenis_kelamin == 'XII-IPS') selected @endif>XII-IPS</option>
							<option value="XII-BAHASA" @if($siswa->jenis_kelamin == 'XII-BAHASA') selected @endif>XII-BAHASA</option>
							<option value="XII-AGAMA" @if($siswa->jenis_kelamin == 'XII-AGAMA') selected @endif>XII-AGAMA</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Wali">Nama Wali:</label> 
						<input name="nama_wali" class="form-control" id="Wali" type="text" value="{{$siswa->nama_wali}}">
					</div>
					<div class="form-group">
						<label for="sel1">Jenis Kelamin:</label> 
						<select name="jenis_kelamin_wali" class="form-control" id="sel1">
							<option value="L" @if($siswa->jenis_kelamin_wali == 'L') selected @endif>Laki-laki</option>
							<option value="P" @if($siswa->jenis_kelamin_wali == 'P') selected @endif>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Agama">Agama:</label> 
						<input name="agama_wali" class="form-control" id="Agama" type="text" value="{{$siswa->agama_wali}}">
					</div>
					<div class="form-group">
						<label for="Pekerjaan">Pekerjaan:</label> 
						<input name="pekerjaan_wali" class="form-control" id="Pekerjaan" type="text" value="{{$siswa->pekerjaan_wali}}">
					</div>
					<div class="form-group">
						<label for="Telephone">Telepon:</label> 
						<input name="telepon_wali" class="form-control" id="Telephone" type="text" value="{{$siswa->telepon_wali}}">
					</div>
					<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Simpan">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection