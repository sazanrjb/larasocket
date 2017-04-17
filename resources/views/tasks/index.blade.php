@extends('layouts.master')
@section('content')
  <h4 class="title text-center">Tasks</h4>

  <div class="container box">
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
@endsection
