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
				<h2>Edit Data User</h2>
			</div>
			<div class="col-6">
				<form action="/users/{{$users->id}}/update" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="email">Email:</label> 
						<input name="email" class="form-control" id="email" type="text" value="{{$users->email}}">
					</div>
					<div class="form-group">
						<label for="role">Role:</label>
						<input name="role" class="form-control" id="role" type="text" value="{{$users->role}}">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input name="password" class="form-control" id="password" type="password" value="{{$users->password}}">
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