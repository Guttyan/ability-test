<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ability test</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Inika&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <script src="https://kit.fontawesome.com/05e4f5ea6e.js" crossorigin="anonymous"></script>
  @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-utilities">
            <a class="header__logo" href="/">
                Fashionably Late
            </a>
        @yield('nav')
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>