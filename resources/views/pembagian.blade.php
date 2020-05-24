@extends('layout')

@section('content')
<div class="container">
  <div class="header">Pembagian Saldo</div>
  <div class="table">
    <div class="row row-head">
      <div class="col">Saldo</div>
      <div class="col">Tipe</div>
      <div class="col">Jumlah</div>
      <div class="col col-center">#</div>
    </div>
    <div class="row">
      <div class="col">Wifi</div>
      <div class="col">wajib</div>
      <div class="col">51.000.000</div>
      <div class="col col-center"><i class="material-icons">delete</i></div>
    </div>
    <div class="row">
      <div class="col">Nikah</div>
      <div class="col">reguler</div>
      <div class="col">20%</div>
      <div class="col col-center"><i class="material-icons">delete</i></div>
    </div>
  </div>
  <a class="add" href="/form_pembagian">
    <i class="material-icons">add</i>
  </a>
</div>
@endsection

@section('style')
<style>
  .table {
    font-size: 15px;
  }

    .row {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 40px;
      border-bottom: 1px solid #ccc;
      margin-bottom: 10px;
      padding-bottom: 10px;
    }

    .row-head {
      border-bottom: 2px solid #ccc;
      font-weight: bold;
    }

      .col {

      }

      .col-center {
        display: flex;
        justify-content: center;
      }

        .col i {
          color: #f44336;
        }

  .add {
    position: fixed;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    bottom: 90px;
    right: 20px;
    border-radius: 50px;
    border: solid 1px #ccc;
    backdrop-filter: blur(10px);
    color: #333;
    text-decoration: none;
  }
</style>
@endsection

@section('script')
<script>
  
</script>
@endsection