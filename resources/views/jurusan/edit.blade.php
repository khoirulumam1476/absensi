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
		  <h2>Edit Data Jurusan</h2>
		</div>
		<div class="col-6">
		 	 <form action="/jurusan/{{$jurusan->id}}/update" method="POST">
		  		{{csrf_field()}}
				  <div class="form-group">
					<label for="Kode Jurusan">Kode Jurusan</label>
					<input name="kode_jurusan" type="nomor" class="form-control" id="emailAdress" placeholder="Kode jurusan" value="{{$jurusan->kode_jurusan}}">
				  </div>
				  <div class="form-group">
					<label for="Jurusan">Jurusan</label>
					<input name="jurusan" type="text" class="form-control" id="emailAdress" placeholder="jurusan" value="{{$jurusan->jurusan}}">
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