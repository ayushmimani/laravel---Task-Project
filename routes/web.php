<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\HTTP\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

// use App\Models\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks',function(){
// $tasks=Task::all();
    return view('index',[
        // 'tasks'=> Task::latest()->get()
        'tasks'=> Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/task/create','create')->name('tasks/create');

// get data in edit form page
Route::get('/task/{task}/edit',function(Task $task){
    //$task = Task::findorfail($id);

    return view('edit',['task'=>$task]);
})->name('task.edit');

// update task and redirect to show TASK page
Route::PUT('/tasks/{task}',function(Task $task,Request $request){
     $data = $request->validate([
        "title" => 'required|max:100',
        "description"=>"required",
        "long_description"=> "required"
     ]);
    $task->update($data);

     return redirect()->route('task.show',['task'=>$task->id])
     ->with('success','Task is updated !');
})->name('task.update');

Route::get('/task/{task}',function(Task $task) {
    // $task= Task::findorfail($id);
    return view('show',['task'=>$task]);
})->name('task.show');


Route::Post('/tasks', function (TaskRequest $request){  
    $task = Task::create($request->validated());
    return redirect()->route('task.show',['task'=>$task->id])
    ->with('success','Task is created!');
   
})->name('task.store');

Route::delete('/task/{task}',function(Task $task){
   $task->delete();
   return redirect()->route('tasks.index')->with("success","Task is deleted successfully !");

})->name('task.delete');

Route::PUT('/task/{task}/toggle-complete',function(Task $task){
      $task->ToggleComplete();
      return redirect()->back()->with('success', 'Task updated successfully!');
})->name('task.toggle-complete');
