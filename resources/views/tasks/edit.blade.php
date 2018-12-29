@extends('layouts.app') 
@section('title','Edit task')

@section('styles')
<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
@endsection 

@section('content')
<div class="row">

  <div class="col">
    
   
    <div class="d-flex justify-content-between">
      <div>
        <h2>Edit task</h2>
      </div>
      <div>
        <a href="{{route('tasks.index')}}" class='btn btn-lg btn-warning'>Go back</a>
      </div>
    </div>
    <br>
      @include('particles.errors')
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <form name='create_form' method="post" action="{{route('tasks.update',$task['id'])}}">
        {{csrf_field()}}
        {{ method_field('PATCH') }}

          <div class="form-group col-md-12">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="{{$task['name']}}" name="name" maxlength='150' required>
          </div>

            <div class="form-group col-md-12">
              <label for="description">Description:</label>
              <textarea name="description">{{$task['description']}}</textarea>
              <script>
                CKEDITOR.replace( 'description' ); 
              </script>
            </div>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-info btn-block">Edit Task</button>            
          </div>
      </form>
  </div>
</div>
@endsection