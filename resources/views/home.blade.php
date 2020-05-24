@extends('layout')

@section('content')
<div class="container">
  <div class="header">Saldo Anda</div>
  <div class="item-total">
    <div class="item-title">Total Saldo</div>
    <div class="item-value">Rp 2.000.000</div>
    <div class="item-subvalue">Rp 1.500.000 reguler</div>
    <div class="item-subvalue">Rp 500.000 wajib</div>
  </div>
  <div class="item-head">Rincian :</div>
  <div class="item">
    <div class="item-title">Wifi <span>[Wajib]</span></div>
    <div class="item-value">Rp 1.000.000</div>
    <div class="item-etc">Tiap bulan bayar wifi</div>
  </div>
  <div class="item">
    <div class="item-title">Nikah [10%]</div>
    <div class="item-value">Rp 15.000.000</div>
    <div class="item-etc">Masa depan dengan Sarah</div>
  </div>
</div>
@endsection

@section('style')
<style>
  .item-total {
    width: 100%;
    border-bottom: 1px solid #ddd;
    padding-bottom: 20px;
    padding-top: 20px;
  }

  .item-head {
    width: 100%;
    font-size: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  
  .item {
    width: 100%;
    padding-bottom: 20px;
  }

    .item-title {
      font-size: 16px;
      color: #555;
    }

      .item-title span {
        color: #f44336;
      }

    .item-value {
      font-size: 20px;
      columns: #333;
      font-weight: 600;
    }

    .item-subvalue {
      font-size: 16px;
      color: #009688;
    }

    .item-etc {
      color: #009688;
      font-size: 16px;
    }

  .item:last-of-type {
    margin-bottom: 100px;
  }
</style>
@endsection