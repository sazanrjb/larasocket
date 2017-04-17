@extends('layouts.master')
@section('content')
  <h4 class="title text-center">Tasks</h4>

  <div class="container">
    <form action="{{route('tasks.store')}}" method="POST">
      {!! csrf_field() !!}
      @if(\Session::has('notice'))
        <p class="alert alert-success">{{\Session::get('notice')}}</p>
      @endif
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Username</label>
        <input type="text" name="email" class="form-control" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
  </div>
@endsection
