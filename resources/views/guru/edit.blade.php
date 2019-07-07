@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="row">
			@if(session('sukses'))  
				<div class="col-12">
					<div class="alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
				</div>
			@endif
			<div class="col-10">
				<h2>Edit Data Guru</h2>
			</div>
			<div class="col-6">
				<form action="/guru/{{$guru->id}}/update" method="POST">
					{{csrf_field()}}
				  <div class="form-group">
				    <label for="Nip">NIP:</label>
				    <input name="nip" type="text" class="form-control" id="TEXT" value="{{$guru->nip}}">
				  </div>
				  <div class="form-group">
				    <label for="Nama Guru">Nama Guru:</label>
				    <input name="nama_guru" type="text" class="form-control" id="Nama Guru" value="{{$guru->nama_guru}}">
				  </div>
				  <div class="form-group">
				    <label for="TTL">Tempat Tanggal Lahir:</label>
				    <input name="ttl" type="text" class="form-control" id="Nama Guru" value="{{$guru->ttl}}">
				  </div>
		           <div class="form-group">
					  <label for="sel1">Jenis Kelamin:</label>
					  <select name="jenis_kelamin" class="form-control" id="sel1">
					    <option value="L" @if($guru->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
						<option value="P" @if($guru->jenis_kelamin == 'P') selected @endif>Perempuan</option>
					  </select>
					</div>
				  <div class="form-group">
				    <label for="Agama">Agama:</label>
				    <select name="agama" class="form-control" id="sel1">
						<option value="Islam" @if($guru->agama == 'Islam') selected @endif>Islam</option>
						<option value="Kristen Protestan" @if($guru->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
						<option value="Katolik" @if($guru->agama == 'Katolik') selected @endif>Katolik</option>
						<option value="Hindu" @if($guru->agama == 'Hindu') selected @endif>Hindu</option>
						<option value="Buddha" @if($guru->agama == 'Buddha') selected @endif>Buddha</option>
						<option value="Kong Hu Cu" @if($guru->agama == 'Kong Hu Cu') selected @endif>Kong Hu Cu</option>
				  	</select>
				  </div>
				  <div class="form-group">
				    <label for="Telepon">Telepon:</label>
				    <input name="telepon" type="text" class="form-control" id="Telepon" value="{{$guru->telepon}}">
				  </div>
				  <div class="form-group">
				    <label for="Alamat">Alamat:</label>
				    <input name="alamat" type="text" class="form-control" id="Alamat" value="{{$guru->alamat}}">
				  </div>
				  <div class="modal-footer">
					 <input class="btn btn-primary" type="submit" value="Simpan">
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection