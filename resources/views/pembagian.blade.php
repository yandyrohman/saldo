@extends('layout')

@section('content')
<div class="container">
  <div class="header">Pembagian Saldo</div>
  @if ($sisa)
    <div class="sisa">
      <b>Saldo belum terhapus!</b><br>
      Sisa Rp {{ $sisa }} masih ada di saldo ini,
      karena tidak memungkinkan lagi untuk dibagikan
      di saldo wajib.
      <p>~</p>
      Tetapi bisa diakali dengan cara merubah nilai
      dari saldo wajib atau dibagikan ke saldo reguler.
    </div>
  @endif

  @if ($lebih)
    <div class="lebih">
      <b>Saldo belum terhapus!</b><br>
      Semua saldo wajib telah terbagi sesuai nilai,
      tetapi masih ada lebih Rp {{ $lebih }} di saldo ini.
      <p>~</p>
      Tetapi bisa diakali dengan cara merubah nilai
      dari saldo wajib atau dibagikan saja ke saldo reguler.
    </div>
  @endif

  @if ($habis)
    <div class="habis">
      <b>Saldo terhapus!</b><br>
      Semua saldo wajib/reguler (sesuai pilihan tadi) 
      telah terbagi sesuai nilai, dan tidak ada sisa 
      maupun kelebihan, semua pas.
    </div>
  @endif
  
  <div class="table">
    <div class="row row-head">
      <div class="col">Saldo</div>
      <div class="col">Tipe</div>
      <div class="col">Nilai</div>
      <div class="col col-center">#</div>
    </div>
    @foreach($datas as $data)
    <div class="row">
      <div class="col">
        <a href="/edit_pembagian/{{ $data->id }}">{{ $data->nama }}</a>
      </div>
      <div class="col">{{ $data->tipe }}</div>
      <div class="col">{{ $data->nilai }}</div>
      <div class="col col-center col-del" data-jumlah="{{ $data->jumlah }}" data-id="{{ $data->id }}">
        <i class="material-icons">delete</i>
      </div>
    </div>
    @endforeach
  </div>
  <a class="add" href="/add_pembagian">
    <i class="material-icons">add</i>
  </a>

  <div class="info">
    <div class="info-item">wajib : Rp {{ $total['wajib'] }}</div>
    <div class="info-item">
      reguler : {{ $total['reguler'] }}% 
      @if($total['reguler'] == 100)
      [<span class="info-green">STABIL</span>] 
      @else
      [<span class="info-red">TIDAK STABIL</span>]
      @endif
    </div>
    <div class="info-note">
      <i>
        * jika nilai total saldo reguler tidak stabil, 
        jangan pernah menghapus saldo! karena uang tidak akan 
        terbagi dengan benar.
      </i>
    </div>
    <div class="info-note">
      <i>
        * Ketika menghapus saldo reguler, pasti
        akan ada uang yang berkurang walaupun cuma sedikit.
        Hal ini bisa diakali dengan menambah pemasukan sesuai
        uang yang hilang.
      </i>
    </div>
  </div>

</div>

<form method="POST" action="/hapus_pembagian" class="popup">
  <div class="popup-box">
    <div class="popup-value">
      Jumlah uang di saldo ini :<br>
      <h2>Rp 100.000.000</h2>
    </div>
    <div class="popup-text">
      Jika saldo dihapus, uangnya mau dikemanakan?
    </div>
    @csrf
    <input style="display: none" name="id" value="0">
    <div class="popup-form">
      <input type="radio" required name="mode" id="mode1" value="mode1">
      <label class="popup-label" for="mode1">Bagikan ke saldo wajib</label>
    </div>
    <div class="popup-form">
      <input type="radio" required name="mode" id="mode2" value="mode2">
      <label class="popup-label" for="mode2">Bagikan ke saldo reguler</label>
    </div>
    <div class="popup-action">
      <div class="popup-action-close">BATAL</div>
      <button type="submit">LANJUTKAN</button>
    </div>
  </div>
</form>
@endsection

@section('style')
<style>
  .sisa {
    margin-bottom: 20px;
    color: #f44336;
  }

  .lebih {
    margin-bottom: 20px;
    color: #f44336;
  }

  .habis {
    margin-bottom: 20px;
    color: #4caf50;
  }
  
  .table {
    font-size: 15px;
    margin-bottom: 20px;
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

      .col-del:active {
        transform: scale(0.8);
      }

      .col-center {
        display: flex;
        justify-content: center;
      }

        .col i {
          color: #f44336;
        }

        .col a {
          color: #009688;
          text-decoration: none;
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

  .info {
    margin-bottom: 200px;
  }

    .info-item {
      font-weight: 600;
    }

      .info-red {
        color: #f44336;
      }

      .info-green {
        color: #4caf50;
      }

    .info-note {
      font-size: 15px;
      color: #555;
      margin-top: 10px;
    }

  .popup {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    backdrop-filter: blur(10px);
    top: 0;
    left: 0;
    z-index: 99;
    display: none;
    align-items: center;
    justify-content: center;
  }

    .popup-box {
      padding: 20px;
      width: 250px;
      background: #fff;
      border-radius: 10px;
    }

      .popup-value {
        color: #f44336;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ccc;
      }

      .popup-text {
        font-weight: 600;
        margin-bottom: 20px;
      }

      .popup-form {
        display: flex;
        align-items: center;
      }

        .popup-form input {
          margin-right: 5px;
        }

      .popup-action {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
      }

        .popup-action-close {
          background: #eee;
          padding: 10px 20px;
          color: #333;
          font-weight: 600;
          border-radius: 10px;
          border: none;
          outline: none;
          font-size: 17px;
        }

        .popup-action button {
          background: #f44336;
          padding: 10px 20px;
          color: #fff;
          font-weight: 600;
          border-radius: 10px;
          border: none;
          outline: none;
          font-size: 17px;
        }
</style>
@endsection

@section('script')
<script>
  $('div[data-id]').on('click', function() {
    var id = $(this).attr('data-id')
    var jumlah = $(this).attr('data-jumlah')
    $('input[name="id"]').attr('value', id)
    $('.popup-value h2').html(jumlah)
    $('.popup').css('display', 'flex')
  })

  $('.popup-action-close').on('click', function() {
    $('.popup').fadeOut()
  })
</script>
@endsection