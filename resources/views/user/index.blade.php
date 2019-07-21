@extends('layout.app')
@section('content')


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
				<h2>Jumlah User Sekarang : {{count($data_users)}}</h2>
			</div>
			<div class="col-2">
				<button class="btn btn-primary" data-target="#siswamodal" data-toggle="modal" type="button">Tambah Data <i class="fa fa-plus"></i>
				</button>
			</div>
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Role</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_users as $index => $user)
					<tr>
						<td>{{$index+1}}</td>
						<td class="text-uppercase">{{ $user->name }}</td>
						<td class="text">{{ $user->email }}</td>
						<td class="text-capitalize">{{ $user->role }}</td>
						<td class="text-center">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a href="/users/{{$user->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
								<a href="/users/{{$user->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Yakin AKan Dihapus?')">Hapus</a>
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