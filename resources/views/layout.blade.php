<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Saldo</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  
  @yield('content')

  @include('menu')

</body>
</html>

<style>
  * {
    margin: 0;
    font-family: 'Open Sans', sans-serif;
  }

  .container {
    width: calc(100% - 40px);
    padding: 20px;
  }

    .header {
      font-size: 25px;
      text-align: center;
      margin-bottom: 20px;
    }
</style>

@yield('style')

@yield('script')