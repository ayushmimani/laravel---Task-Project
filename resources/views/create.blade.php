@extends('layout');

@section('title','create Task')

@section('style')
<style>
    .error-message{
        color: red;
    }
</style>
@endsection

@section('content')

<form method="POST" action="{{route('task.store')}}">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type='text' id="title" name="title">
       @error('title')
           <p class="error-message">{{$message}}</p>
       @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea  id="description" name="description" rows="5"></textarea>
    </div>
     @error('description')
           <p class="error-message">{{$message}}</p>
       @enderror
    <div>
        <label for="long_description">Long Description</label>
        <textarea id="long_description" name="long_description" rows="10"></textarea>
    </div>
    @error('long_description')
      <p class="error-message">{{$message}}</p>
    @enderror
    <div>
        <button type="submit">Add Task</button>
    </div>
</form>

@endsection