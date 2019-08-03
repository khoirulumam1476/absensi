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
          <h2>Edit Data Kelas</h2>
        </div>
        <div class="col-6">
          <form action="/kelas/{{$kelas->id}}/update" method="POST">
         		 {{csrf_field()}}
					<div class="form-group">
						<label for="emailAdress">Kode Kelas</label> 
						<input name="kode_kelas" class="form-control" id="emailAdress" placeholder="" type="text" value="{{$kelas->kode_kelas}}">
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
						<input name="nama_kelas" class="form-control" id="emailAdress" placeholder="" type="text" value="{{$kelas->nama_kelas}}">
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