@extends('layout')

@section('title', $task->title)

@section('content')
@if($task->description)
<p>{{$task->description}}</p>
@endif
<p>{{$task->created_at}}</p>
<form method="POST" action="{{route('task.delete',$task->id)}}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>

@endsection

