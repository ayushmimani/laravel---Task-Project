# Laravel Task Model Data Fetching

This guide covers how to fetch tasks from the database using Laravel Eloquent models.

## Fetching a Single Task

To fetch a single task by its ID and handle cases where the task is not found:

```php
use App\Models\Task;

// Fetch the task by its ID
$task = Task::find($id);

// Fetch the task by its ID or fail with a 404 error if not found
$task = Task::findOrFail($id);
```

# Fetching All Tasks

```php
use App\Models\Task;

// Fetch all tasks
$tasks = Task::all();

```

# To fetch tasks sorted by the latest creation date with Query Builder

```php
use App\Models\Task;

// Fetch the latest tasks
$tasks = Task::latest()->get();

```

# To fetch only completed tasks:

```php
use App\Models\Task;

// Fetch completed tasks
$tasks = Task::where('completed', true)->latest()->get();

```

# To fetch specific columns of completed tasks:

```php
use App\Models\Task;

// Fetch only the ID and title of completed tasks
$tasks = Task::select('id', 'title')
             ->where('completed', true)
             ->latest()
             ->get();

```

### Using Laravel Tinker

# Laravel Tinker is a REPL for interacting with your Laravel application. Start it with:

```php
php artisan tinker
```

### Error Handling

# To handle cases where a task is not found and return a 404 error:

```php
use App\Models\Task;

// Fetch the task by its ID or fail with a 404 error if not found
$task = Task::findOrFail($id);

```
