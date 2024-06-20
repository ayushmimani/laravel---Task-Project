@extends('layout');

@section('title','Edit Task')

@section('style')
<style>
    .error-message{
        color: red;
    }
</style>
@endsection

@section('content')

<form method="POST" action="{{route('task.update',$task->id)}}">
    @method('put')
    @csrf
    <div>
        <label for="title">Title</label>
        <input type='text' id="title" name="title" value="{{$task->title}}">
       @error('title')
           <p class="error-message">{{$message}}</p>
       @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea  id="description" name="description" rows="5">{{$task->description}}</textarea>
    </div>
     @error('description')
           <p class="error-message">{{$message}}</p>
       @enderror
    <div>
        <label for="long_description">Long Description</label>
        <textarea id="long_description" name="long_description" rows="10">{{$task->long_description}}</textarea>
    </div>
    @error('long_description')
      <p class="error-message">{{$message}}</p>
    @enderror
    <div>
        <button type="submit">Add Task</button>
    </div>
</form>

@endsection