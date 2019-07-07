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
          <h2>Edit Data</h2>
        </div>
        <div class="col-6">
          <form action="/mapel/{{$data_mapel->id}}/update" method="POST">
          {{csrf_field()}}
					<div class="form-group">
						<label for="Kode Mapel">Kode Mapel</label> 
						<input name="kode_mapel" class="form-control" id="emailAdress" placeholder="Kode Mapel" type="nomor" value="{{$data_mapel->kode_mapel}}">
					</div>
					<div class="form-group">
						<label for="text">Nama Mapel</label> 
						<input name="nama_mapel" class="form-control" id="exampleInputPassword1" placeholder="Nama Mapel" type="text" value="{{$data_mapel->nama_mapel}}">
					</div>
					<div class="form-group">
						<label for="KKM">KKM</label> 
						<input name="kkm" class="form-control" id="emailAdress" placeholder="KKM" type="text" value="{{$data_mapel->kkm}}">
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