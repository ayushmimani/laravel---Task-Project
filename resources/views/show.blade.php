@extends('layout')

@section('title', $task->title)

@section('content')
@if($task->description)
<p>{{$task->description}}</p>
@endif
<p>{{$task->created_at}}</p>

<p>
  @if($task->completed)
  completed
  @else
  not completed
  @endif
</p>


<a href="{{route('task.edit',['task'=>$task])}}"><button>Edit</button></a>

<form method="POST" action="{{route('task.toggle-complete',['task'=>$task])}}">
  {{-- here we can pass $task and $task id laravel take id default just like in edit button --}}
  @csrf
  @method('PUT')
  <button type="submit">Mark as {{$task->completed ? 'not completed':'completed'}}</button>
</form>

<form method="POST" action="{{route('task.delete',$task->id)}}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>

@endsection

