<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\HTTP\Response;
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

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get('/',function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks',function(){
// $tasks=Task::all();
    return view('index',[
        'tasks'=> Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/task/create','create')->name('tasks/create');

Route::get('/task/{id}',function($id) {
    $task= Task::findorfail($id);
    return view('show',['task'=>$task]);
})->name('task.show');


Route::Post('/tasks', function (Request $request){

    $data= $request->validate([
        "title" => 'required|max:100',
        "description"=>"required",
        "long_description"=> "required"
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description=$data['long_description'];
    $task->save();

    return redirect()->route('task.show',['id'=>$task->id])
    ->with('success','Task is created!');


   
})->name('task.store');
