@extends('layout')

@section('content')
<div class="container">
  <div class="header">Mutasi Saldo</div>
  <div class="martop"></div>
  <div class="item">
    <div class="item-date">10 November 2020</div>
    <div class="item-margin">&bullet;</div>
    <div class="item-green">+ Rp 1.000.000</div>
  </div>
  <div class="item">
    <div class="item-date">10 November 2020</div>
    <div class="item-margin">&bullet;</div>
    <div class="item-green">+ Rp 1.000.000</div>
  </div>
</div>
@endsection

@section('style')
<style>
  .item {
    display: flex;
  }

    .item-date {
      color: #888;
    }

    .item-margin {
      margin-left: 5px;
      margin-right: 5px;
      color: #888;
    }

    .item-red {
      color: #f44336;
      font-weight: bold;
    }

    .item-green {
      color: #4caf50;
      font-weight: bold;
    }
</style>
@endsection