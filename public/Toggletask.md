### Summary: Adding Links and Toggling Task Completion

In this tutorial, we'll enhance our application by adding links to edit tasks, create new tasks, and toggle task completion status. Here's a step-by-step guide:

#### 1. Adding an Edit Link

-   **Objective**: Add a link to the edit form on the task's show page.
-   **Implementation**:
    -   Inside `show.blade.php`, add a div with a link to the edit form.
    ```php
    <div>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    </div>
    ```

#### 2. Adding a Create Task Link

-   **Objective**: Add a link to create a new task on the main index view.
-   **Implementation**:
    -   In `index.blade.php`, add a link to the create form.
    ```php
    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>
    ```

#### 3. Toggling Task Completion Status

-   **Objective**: Add a toggle button to mark tasks as complete or incomplete.
-   **Steps**:

    1. **Add a Route**:

        - Define a new PUT route in `web.php` for toggling task completion.

        ```php
        Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
            $task->toggleComplete();
            return redirect()->back()->with('success', 'Task updated successfully.');
        })->name('tasks.toggle-complete');
        ```

    2. **Model Method**:

        - Add a `toggleComplete` method in the `Task` model.

        ```php
        public function toggleComplete() {
            $this->completed = !$this->completed;
            $this->save();
        }
        ```

    3. **Form in Blade Template**:

        - Add a form in `show.blade.php` to call the toggle route.

        ```php
        <div>
            <form method="POST" action="{{ route('tasks.toggle-complete', $task) }}">
                @csrf
                @method('PUT')
                <button type="submit">
                    {{ $task->completed ? 'Mark as Not Completed' : 'Mark as Completed' }}
                </button>
            </form>
        </div>
        ```

    4. **Display Task Status**:
        - Indicate whether the task is completed or not in `show.blade.php`.
        ```php
        <div>
            {{ $task->completed ? 'Completed' : 'Not Completed' }}
        </div>
        ```

#### 4. Safety Considerations

-   **Reason for Using PUT/POST**:
    -   Use PUT or POST methods for actions that modify data to prevent unintended changes via simple GET requests.
    -   This is a best practice for data safety and integrity.

### Conclusion

By following these steps, you can enhance your Laravel application with essential features such as editing tasks, adding new tasks, and toggling task completion status, all while adhering to best practices for web development.
