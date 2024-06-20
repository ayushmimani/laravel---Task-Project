### Deleting Data in Laravel

#### Deleting Data from Database

1. **Route Definition:**

    - **Purpose:** Create a route to delete a task from the database using the `DELETE` HTTP method.
    - **Implementation:**
        ```php
        Route::delete('/tasks/{task}', function (Task $task) {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        })->name('tasks.destroy');
        ```
        - Uses route model binding to fetch the task based on the `task` parameter.
        - Deletes the task using the `delete()` method of the Eloquent model.
        - Redirects back to the main tasks index with a success message.

2. **Blade Template (show.blade.php):**

    - **Purpose:** Create a delete form in the show page of a task to enable deletion.
    - **Implementation:**
        ```html
        <form
            action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
            method="POST"
        >
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        ```
        - Uses method spoofing to send a `DELETE` request.
        - Adds a CSRF token for security.

3. **Usage:**
    - Navigate to the show page of a task.
    - Click the "Delete" button to permanently delete the task.

#### Soft Deletes (Optional)

-   **Purpose:** Soft deletes allow records to be marked as deleted without actually removing them from the database.
-   **Implementation:**
    -   Add `use SoftDeletes;` to the `Task` model.
    -   Define `$dates = ['deleted_at'];` in the `Task` model.
    -   Perform soft delete: `$task->delete();`
    -   Fetch soft deleted records: `Task::withTrashed()->get();`
    -   Restore soft deleted record: `$task->restore();`

#### GitHub Repository

-   **Summary:** This repository contains Laravel routes optimized with route model binding, form requests for validation, and methods for deleting and soft deleting tasks.
-   **Link:** [GitHub Repository](https://github.com/your/repository)

---
