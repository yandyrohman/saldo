<div class="menu">
  <div class="menu-box">
    <div class="menu-item" data-href="/">
      <i class="material-icons">home</i>
      <div class="menu-item-title">Beranda</div>
    </div>
    <div class="menu-item" data-href="/pemasukan">
      <i class="material-icons">arrow_downward</i>
      <div class="menu-item-title">Pemasukan</div>
    </div>
    <div class="menu-item" data-href="/pengeluaran">
      <i class="material-icons">arrow_upward</i>
      <div class="menu-item-title">Pengeluaran</div>
    </div>
    <div class="menu-item" data-href="/mutasi">
      <i class="material-icons">history</i>
      <div class="menu-item-title">Mutasi</div>
    </div>
    <div class="menu-item" data-href="/pembagian">
      <i class="material-icons">extension</i>
      <div class="menu-item-title">Pembagian</div>
    </div>
  </div>
  <div class="menu-close">
    <i class="material-icons">clear</i>
  </div>
</div>

<div class="menu-button">
  <i class="material-icons">dashboard</i>
</div>

<style>
  .menu {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    top: 0;
    left: 0;
    z-index: 99;
    backdrop-filter: blur(10px);
    display: none;
    align-items: center;
    justify-content: center;
  }

    .menu-box {
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      width: 200px;
      color: #333;
    }

      .menu-item {
        display: flex;
        align-items: center;
        font-weight: 400;
        margin-bottom: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
      }

      .menu-item:last-of-type {
        margin-bottom: 0px;
        border: 0;
        padding-bottom: 0;
      }
      
        .menu-item-title {
          margin-left: 10px;
        }

    .menu-close {
      position: fixed;
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      bottom: 20px;
      right: 20px;
      border-radius: 50px;
      color: #fff;
    }

  .menu-button {
    position: fixed;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    bottom: 20px;
    right: 20px;
    border-radius: 50px;
    border: solid 1px #ccc;
    backdrop-filter: blur(10px);
    color: #333;
  }

    .menu-button i {
      color: #555;
    }
</style>

<script>
  $('.menu-button').on('click', function() {
    $('.menu').css('display', 'flex')
  })

  $('.menu-close').on('click', function() {
    $('.menu').fadeOut()
  })

  $('.menu-item').on('click', function() {
    var href = $(this).attr('data-href');
    window.location = href;
  })
</script>