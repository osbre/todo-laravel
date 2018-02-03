@extends('layouts.app') 
@section('title','tasks') 
@section('content')
<div class="row">

  <div class="col">
    <div class="btn-group" role="group">
      <a href="{{route('tasks.create')}}" class='btn btn-success'>Create task</a>
    </div>

  </div>
</div>
@endsection