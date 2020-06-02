@extends('layout')

@section('content')
<div class="container">
  <div class="header">Catatan</div>
  @foreach($datas as $data)
  <div class="item">
    <a href="/delete_catatan/{{ $data->id }}" class="item-delete">
      <i class="material-icons">delete</i>
    </a>
    <span class="item-date">{{ $data->created_at }}</span><br/>
    <span>{{ $data->catatan }}</span> 
  </div>
  @endforeach
  <a class="add" href="/add_catatan">
    <i class="material-icons">add</i>
  </a>
</div>
@endsection

@section('style')
<style>
  .item {
    position: relative;
    width: calc(100% - 40px);
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    color: #333;
  }

    .item-date {
      color: #888;
    }

    .item-delete {
      position: absolute;
      top: 20px;
      right: 20px;
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