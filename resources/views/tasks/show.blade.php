@extends('layouts.app')
@section('title', $task->name . ' - task app')
@section('content')
    <div>
        <div class="d-flex justify-content-between">
            <h1>{{$task->name}}</h1>
            <div>
                <a href="{{ route('tasks.index')}} " class='btn btn-lg btn-warning'>Go back</a>
            </div>
        </div>
        {!! $task->description !!}
        <hr>
        <br> Created at:
        <b>{{ $task->created_at }}</b>
        <br> Updated at:
        <b>{{ $task->updated_at }}</b>
    </div>
@endsection