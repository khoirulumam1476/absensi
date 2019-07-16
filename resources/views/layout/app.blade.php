<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"></script>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-2"><img alt="#" height="100" src="{{ URL::asset('img/logo_MA.jpg') }}" width="100"></div>
			<div class="col-md-10">
				<h1>MA WALISONGO 3 SEBAUNG</h1>
			</div>
		</div>
	</div>
</div>

<div class="section-menu">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					 <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item ">
								<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
							</li>
							@if( Auth::check() && auth()->user()->role == 'admin' )
								<li class="nav-item dropdown">
									<a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">Pengolahan Data</a>

									<div aria-labelledby="navbarDropdown" class="dropdown-menu">
										<a class="dropdown-item" href="{{ url('/jurusan') }}">Data Jurusan</a>
										<a class="dropdown-item" href="{{ url('/kelas') }}">Data Kelas</a>
										<a class="dropdown-item" href="{{ url('/mapel') }}">Data Mapel</a>
										<a class="dropdown-item" href="{{ url('/siswa') }}">Data Siswa</a>
										<a class="dropdown-item" href="{{ url('/guru') }}">Data Guru</a>
									</div>
								</li>
							@endif;
							<li class="nav-item dropdown">
								<a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ url('/absensi') }}" id="navbarDropdown" role="button">Absensi</a>
								<div aria-labelledby="navbarDropdown" class="dropdown-menu">
									<a class="dropdown-item" href="{{ url('/absensi') }}">Detail Absensi</a>
									<a class="dropdown-item" href="{{ url('/absensi/list') }}">Input Absensi</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">Setting</a>

								<div aria-labelledby="navbarDropdown" class="dropdown-menu">
									<a class="dropdown-item" href="{{ url('/setting') }}">Setting koneksi</a>
									<a class="dropdown-item" href="{{ url('/control') }}">Control Access</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">SMS Gateway</a>

								<div aria-labelledby="navbarDropdown" class="dropdown-menu">
									<a class="dropdown-item" href="{{ url('/sms') }}">Message</a>
									<a class="dropdown-item" href="{{ url('/sms/outbox') }}">Outbox</a>
								</div>
							</li>
							@if( Auth::check() )
							<li class="nav-item">
								<a class="nav-link" href="/logout">Logout</a>
							</li>
							@endif
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
@yield('content')

<div class="footer text-center">
	<div class="foter">
		<h4>MA WALISONGO 3 SEBAUNG</h4>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
	jQuery(document).ready(function($) {
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
			$("#success-alert").slideUp(500);
		});
	});
</script>