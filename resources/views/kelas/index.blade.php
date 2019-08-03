@extends('layout.app') 

@section('content')

<div aria-hidden="true" aria-labelledby="kelasModalLabel" class="modal fade" id="inputKelas" role="dialog" tabindex="-1">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="jurusanModalLabel">Input Data Kelas</h5>
        		<a aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></a>
     		</div>
     		<div class="modal-body">
        		<form action="/kelas/tambah" method="POST">
         		 {{csrf_field()}}
					<div class="form-group">
						<label for="emailAdress">Kode Kelas</label> 
						<input name="kode_kelas" class="form-control" id="emailAdress" placeholder="" type="text">
					</div>
					<div class="form-group">
						<label for="emailAdress">Kode Jurusan</label> 
						<select name="kode_jurusan" class="form-control" id="sel1">
							@foreach( $data_jurusan as $jurusan )
								<option value="{{$jurusan->kode_jurusan}}">{{$jurusan->jurusan}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="emailAdress">Nama Kelas</label> 
						<input name="nama_kelas" class="form-control" id="emailAdress" placeholder="" type="text">
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
          <h2>Jumlah Kelas Sekarang : {{count($data_kelas)}}</h2>
        </div>
        <div class="col-2">
          <button class="btn btn-primary" data-target="#inputKelas" data-toggle="modal" type="button">Tambah Data<i class="fa fa-plus"></i>
          </button>
        </div>
		<table class="table table-bordered table-striped table-skripsi">
			<thead class="table-dark">
				<tr>
					<th>Kode Kelas</th>
					<th>Kode Jurusan</th>
					<th>Nama Kelas</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				@foreach($data_kelas as $kelas)
					 <tr>
		              <td>{{ $kelas->kode_kelas }}</td>
		              <td>{{ $kelas->kode_jurusan }}</td>
		              <td>{{ $kelas->nama_kelas }}</td>
		              <td class="text-center">
		                <div class="btn-group" role="group" aria-label="Basic example">
		                 
						  <a href="/kelas/{{$kelas->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
						  <a href="/kelas/{{$kelas->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan Dihapus?')">Hapus</a>
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