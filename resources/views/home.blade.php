@extends('layout.app')

@section('content')
		@if( Auth::check() )
    		<h2>Selamat Datang, {{Auth::User()->name}}</h2>
    	@else 
			<h2>Selamat Datang</h2>
    	@endif

<div class="isi">
    <div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="ttt">
					<div>
						<p>Alamat	: Jl.Raya Sebaung Desa Sebaung Kec. Gending Kab. Probolinggo</p>
					</div>
					<div>
						<p>Email	: mawalisongo51@gmail.com</p>
					</div>
					<div>
						<p>Website	: mawalisongogending.sch.id</p>
					</div>
					<div>
						<p>No.Telp 	: (0335)611236</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="tttt">
					<div>
						<p>Akta Notaris	:1.Bazron Human, SH Nomor 07 Tahun 1985</p>
						<p class="ter">2.Achmad Fauzi, SH. No.03 Tanggal 12 Mei 2008</p>
					</div>
					<p>Lembaga  :PAUD, RA Bustanul Ulum Banyuanyar, MI.Bustanul Ulum Banyuanyar</p>
					<p class="ter">MTs.Walisongo 1 Maron, MTs.Walisongo 2 Gending, MTs.Walisongo 3 Banyuanyar, MA.Walisongo Gending</p>
				</div>
					
				</div>

    	</div>
    </div>
</div>
<style>
	h2{
		text-align: center;
		padding-top:  50px;
	}
	.ter{
		margin-left: 90px;
	}
	.ttt{
		background: lightblue;
		padding: 30px;
	}
	.tttt{
		background: lightblue;
		padding: 6px;
	}


</style>

@endsection
