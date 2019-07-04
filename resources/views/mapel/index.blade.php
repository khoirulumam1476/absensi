@extends('layout.app')

@section('content')

<div aria-hidden="true" aria-labelledby="mapelModalLabel" class="modal fade" id="inputMapel" role="dialog" tabindex="-1">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title" id="mapelModalLabel">Input Data Mapel</h5>
        	<a aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></a>
      	</div>
      <div class="modal-body">
        <form action="/mapel/tambah" method="POST">
          {{csrf_field()}}
					<div class="form-group">
						<label for="Kode Mapel">Kode Mapel</label> 
						<input name="kode_mapel" class="form-control" id="emailAdress" placeholder="Kode Mapel" type="nomor">
					</div>
					<div class="form-group">
						<label for="text">Nama Mapel</label> 
						<input name="nama_mapel" class="form-control" id="exampleInputPassword1" placeholder="Nama Mapel" type="text">
					</div>
					<div class="form-group">
						<label for="KKM">KKM</label> 
						<input name="kkm" class="form-control" id="emailAdress" placeholder="KKM" type="text">
					</div>
					<div class="modal-footer">
                		<button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button> <input class="btn btn-primary" type="submit" value="Simpan">
            		</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="section-content">
    <div class="container"> 
        <div class="row">
      		@if(session('sukses'))  
				<div class="col-12">
					<div id="success-alert" class="alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
				</div>
			@endif
        <div class="col-10">
          <h2>Jumlah Mapel Sekarang : {{count($data_mapel)}}</h2>
        </div>
        <div class="col-2">
          <button class="btn btn-primary" data-target="#inputMapel" data-toggle="modal" type="button">Tambah Data <i class="fa fa-plus"></i>
          </button>
        </div>
		<table class="table table-bordered table-striped table-skripsi">
			<thead class="table-dark">
				<tr>
					<th>Kode Mapel</th>
					<th>Nama Mapel</th>
					<th>KKM</th>
					<th>Aksi</th>
				</tr>
			</thead>
				<tbody>
				@foreach($data_mapel as $mapel)
					 <tr>
		              <td>{{ $mapel->kode_mapel }}</td>
		              <td>{{ $mapel->nama_mapel }}</td>
		              <td>{{ $mapel->kkm }}</td>

		              <td class="text-center">
		                <div class="btn-group" role="group" aria-label="Basic example">
		                 	<a class="btn btn-info btn-sm">Detail</a>
		                 	<a href="/mapel/{{$mapel->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
						 	<a href="/mapel/{{$mapel->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan Dihapus?')">Hapus</a>
		                </div>
		              </td>
		            </tr>
		          @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection