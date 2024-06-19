@extends('layout')

@section('title', $task->title)

@section('content')
@if($task->description)
<p>{{$task->description}}</p>
@endif
<p>{{$task->created_at}}</p>
@endsection