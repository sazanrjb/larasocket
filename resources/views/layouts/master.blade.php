<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

  <!-- Styles -->
  <style>
    html, body {
      font-family: 'Raleway', sans-serif;
      background: #ebe9e7;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    [v-cloak] {
      display: none;
    }

    li {
      list-style-type: none;
      background: #fff;
      padding: 10px;
      border-bottom: 1px solid #dddfe2;
    }

    li.active {
      background: #edf2fa;
    }

    a {
      font-weight: 700;
      color: #1d2129;
    }

    h4 {
      font-size: 15px;
    }

    h3 {
      font-weight:800;
    }

    h5 {
      font-weight: 600;
      font-size:12px;
    }
    .description {
      color: #7d7272;
    }

    .container li:hover {
      background-color: #f3f3f3;
    }

    .logo {
      height: 57px;
      float:left;
    }

    .notif_body {
      margin-left: 70px;
    }
    
    .box {
      background: #fff;
      padding: 30px;
    }
  </style>
</head>
<body>
<div>
  <div class="container">
    @yield('content')
  </div>
</div>
</body>
</html>
