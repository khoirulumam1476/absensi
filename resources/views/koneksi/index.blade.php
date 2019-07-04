@extends('layout.app')

@section('content')
<div class="header_setting">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <h4>Setting Gammu</h4>
        <div class="form-group">
              <label for="Alamat">PORT:</label>
              <input type="Alamat" class="form-control" id="Alamat">
            </div>
        <div class="form-group">
              <label for="Alamat">CONNECTION:</label>
              <input type="Alamat" class="form-control" id="Alamat">
            </div>
        <div class="checkbox">
            <button type="submit" class="btn btn-primary">simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection