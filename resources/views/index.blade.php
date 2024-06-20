<h1>This is task list</h1>

<a href="{{route('tasks/create')}}"><button>Add Button</button></a>

@forelse ($tasks as $task)
   
    <p> <a href={{route('task.show',['task'=>$task->id])}}>{{$task->title}}</a></p>
@empty
    <p>thiere is no task</p>
@endforelse

@if($tasks->count())
  <div>
    {{$tasks->links()}}
  </div>
@endif