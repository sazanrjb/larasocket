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
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 700;
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
  </style>
</head>
<body>
<div>
  <h4 class="title text-center">Tasks</h4>

  <div class="container">
    <form action="{{route('tasks.store')}}" method="POST">
      {!! csrf_field() !!}
      @if(\Session::has('notice'))
        <p class="alert alert-success">{{\Session::get('notice')}}</p>
      @endif
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
