@extends('layout')

@section('content')
<div class="container">
  <div class="header">Saldo Anda</div>
  <div class="item-total">
    <div class="item-title">Total Saldo</div>
    <div class="item-value">Rp {{ $total['all'] }}</div>
    <div class="item-subvalue">Rp {{ $total['reguler'] }} reguler</div>
    <div class="item-subvalue">Rp {{ $total['wajib'] }} wajib</div>
  </div>
  <div class="item-head">Rincian :</div>
  @foreach($datas as $data)
  <div class="item">
    <div class="item-title">
      {{ $data->nama }}
      @if($data->tipe == 'wajib') 
      <span>[{{ $data->nilai }}]</span>
      @else
      [{{ $data->nilai }}%]
      @endif
    </div>
    <div class="item-value">Rp {{ $data->jumlah }}</div>
    <div class="item-etc">{{ $data->ket }}</div>
  </div>
  @endforeach
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