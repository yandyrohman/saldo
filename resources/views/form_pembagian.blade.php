@extends('layout')

@section('content')
<form class="container" action="">
  <div class="header">Tambah Saldo</div>
  <div class="form-group">
    <div class="form-label">Tipe Saldo</div>
    <select class="form-select">
      <option hidden>- Pilih Tipe -</option>
      <option value="">Wajib</option>
      <option value="">Reguler</option>
    </select>
  </div>
  <div class="form-group">
    <div class="form-label">Nilai (%) (Rp)</div>
    <input class="form-input" type="number" placeholder="Masukan Nilai">
  </div>
  <div class="form-group">
    <div class="form-label">Keterangan</div>
    <input class="form-input" type="text" placeholder="Masukan Keterangan">
  </div>
  <div class="form-action">
    <button type="submit">BUAT SALDO</button>
  </div>
</form>
@endsection

@section('style')
<style>
  .form-group {
    border-bottom: 1px solid #888;
    margin-bottom: 20px;
  }

    .form-label {
      color: #333;
    }
    
    .form-input {
      width: 100%;
      height: 40px;
      border: 0;
      outline: none;
      font-size: 17px;
      color: #009688;
    }

  .form-select {
    width: 100%;
    height: 40px;
    background: #fff;
    outline: none;
    border: 0;
    font-size: 17px;
    color: #009688;
  }

  .form-action {
    width: 100%;
    display: flex;
    justify-content: center;
  }

    .form-action button {
      padding: 10px 20px;
      border-radius: 10px;
      background: #009688;
      color: #fff;
      outline: none;
      font-size: 16px;
      border: none;
      margin-top: 50px;
    }
</style>
@endsection