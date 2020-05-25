@extends('layout')

@section('content')
<form class="container" method="POST" action="/add_pembagian">
  <div class="header">Tambah Saldo</div>
  @csrf
  <div class="form-group">
    <div class="form-label">Nama Saldo</div>
    <input class="form-input" name="nama" required type="text" placeholder="Masukan Nama">
  </div>
  <div class="form-group">
    <div class="form-label">Tipe Saldo</div>
    <select class="form-select" name="tipe" required>
      <option value="reguler">Reguler</option>
      <option value="wajib">Wajib</option>
    </select>
  </div>
  <div class="form-group">
    <div class="form-label" data-caption="tipe">Nilai (%)</div>
    <input class="form-input" name="nilai" required type="number" placeholder="Masukan Nilai">
  </div>
  <div class="form-group">
    <div class="form-label">Keterangan</div>
    <input class="form-input" name="ket" required type="text" placeholder="Masukan Keterangan">
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

@section('script')
<script>
  $('select[name="tipe"]').on('change', function() {
    var value = $(this).val()
    if (value == 'reguler') {
      $('div[data-caption="tipe"]').html('Nilai (%)')
    } else {
      $('div[data-caption="tipe"]').html('Nilai (Rp)')
    }
  })
</script>
@endsection