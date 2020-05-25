@extends('layout')

@section('content')
<div class="container">
  <div class="header">Mutasi Saldo</div>
  <div class="martop"></div>
  {{-- @foreach($datas as $data)
  <div class="item">
    <div class="item-date">{{ $data->created_at }}</div>
    <div class="item-margin">&bullet;</div>
    @if($data->jenis == 'masuk')
    <div class="item-green">+ Rp {{ $data->nilai }}</div>
    @else
    <div class="item-red">- Rp {{ $data->nilai }}</div>
    @endif
  </div>
  @endforeach --}}
  @foreach($datas as $data)
  <div class="item">
    <div class="item-date">{{ $data->created_at }}</div>
    @if($data->jenis == 'keluar')
    <div class="item-red">
      <span>- Rp {{ $data->nilai }}</span>
      <small>saldo {{ $data->nama_saldo }}</small>
    </div>
    @else
    <div class="item-green">
      <span>+ Rp {{ $data->nilai }}</span>
    </div>
    @endif
    <div class="item-sisa">
      <span>Rp {{ $data->sisa_total }}</span>
      <small>semua saldo</small>
    </div>
    <div class="item-info">"{{ $data->keterangan }}"</div>
  </div>
  @endforeach
  <div class="marbot"></div>
</div>
@endsection

@section('style')
<style>
  .item {
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    padding-bottom: 10px;
  }

    .item-date {
      color: #888;
    }

    .item-red {
      color: #f44336;
      font-weight: 600;
      font-size: 20px;
    }

    .item-green {
      color: #4caf50;
      font-weight: 600;
      font-size: 20px;
    }

    .item-sisa {
      color: #333;
      font-weight: 600;
      font-size: 20px;
    }

      .item small {
        font-size: 14px;
        color: #888;
      }

  .marbot {
    margin-bottom: 200px;
  }
</style>
@endsection