@extends('layouts.app')
@section('title','tasks')
@section('content')
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>TodoList</h3>
                </div>
                <div>
                    <a href="{{ route('tasks.create') }}" class='btn btn-lg btn-success'>Create task</a>
                </div>
            </div>
            <div class="btn-group" role="group">
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Completed</th>
                    <th scope="col">action</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                        <td class='{{ $task->is_completed ? 'text-success' : 'text-warning' }}'>
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </td>
                        <td>
                            <div class='btn-group'>
                                <a href="{{ route('tasks.show', $task->id) }}" class='btn btn-info btn-sm'>
                                    <i class="material-icons">view_headline</i>
                                </a>
                                <a href="" class="btn {{ $task->complete ? 'btn-warning' : 'btn-success' }} btn-sm"
                                   onclick="event.preventDefault(); document.getElementById('complete_form{{ $loop->iteration }}').submit();">
                                    <i class="material-icons">{{ $task->complete ? 'cancel' : 'done' }}</i>
                                </a>
                                <form action="{{ route('tasks.complete', $task->id) }}" method="post"
                                      id='complete_form{{ $loop->iteration }}'>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                </form>
                                <a href="{{ route('tasks.edit', $task->id) }}" class='btn btn-secondary btn-sm'>
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="" class='btn btn-danger btn-sm'
                                   onclick="event.preventDefault(); document.getElementById('destroy_form{{ $loop->iteration }}').submit();">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post"
                                      id='destroy_form{{ $loop->iteration }}'>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No tasks</p>
                @endforelse
                </tbody>
            </table>
            {!! $tasks->links() !!}
        </div>
    </div>
@endsection