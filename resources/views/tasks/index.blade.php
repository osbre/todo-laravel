@extends('layouts.app') 
@section('title','tasks') 
@section('content')
<div class="row">

  <div class="col">
    <form action="{{route('tasks.store')}}" method='post' class="form-inline">
      {{csrf_field()}}
      <div class="form-row form-inline" style='width:100%;'>
        <div class="col-10">
          <input type="text" class="form-control" placeholder='typed you task' style='width:100%;'>
        </div>
        <div class="col">
          <input type="submit" value="add" class='btn btn-success btn-block'>
        </div>
      </div>
    </form>

  </div>
</div>
@endsection