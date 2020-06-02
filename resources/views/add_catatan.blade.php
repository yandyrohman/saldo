@extends('layout')

@section('content')
<form class="container" method="POST" action="/add_catatan">
  <div class="header">Tambah Catatan</div>
  @csrf
  <div class="form-group">
    <div class="form-label">Catatan</div>
    <input class="form-input" name="catatan" required type="text" placeholder="Tulis Catatan">
  </div>
  <div class="form-action">
    <button type="submit">TAMBAHKAN</button>
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

  .form-checkbox {
    display: flex;
    align-items: center;
    margin-top: 10px;
  }

    .form-checkbox input {
      margin-right: 10px;
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