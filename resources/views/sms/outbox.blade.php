@extends('layout.app')

@section('content')

<div class="section-content">
	<div class="container"> 
		<div class="wrapper">
			<div class="col-12">
				<h2>Outbox (SMS Keluar)</h2>
			</div>
			<table class="table table-bordered table-striped table-skripsi">
				<thead class="table-dark">
					<tr class="d-flex">
						<th class="col-1">No</th>
						<th class="col-2">Telepon</th>
						<th class="col-7">Pesan</th>
						<th class="col-2">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data_sms as $index => $sms )
						<tr class="d-flex">
							<td class="col-1 text-center">{{$index+1}}</td>
							<td class="col-2">{{$sms['telepon']}}</td>
							<td class="col-7">{{$sms['pesan']}}</td>
							<td class="col-2 text-center"><span class="badge badge-success">{{$sms['status']}}</span></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection