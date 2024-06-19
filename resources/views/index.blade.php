<h1>This is task list</h1>

@forelse ($tasks as $task)
   
    <p> <a href={{route('task.show',['id'=>$task->id])}}>{{$task->title}}</a></p>
@empty
    
@endforelse