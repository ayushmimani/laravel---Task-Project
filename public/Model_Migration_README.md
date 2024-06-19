# Models

## Definition

-   Models are PHP classes representing database tables.
-   Located in the `app/Models` folder.

## Default Model

-   New Laravel applications include a `User` model by default.

## Creating a Model

-   Use artisan command: `php artisan make:model ModelName`.
-   Adding `-m` flag also generates a migration file: `php artisan make:model Task -m`.

## Eloquent ORM

-   Laravel uses Eloquent ORM to map classes to database tables.
-   Interact with tables using methods like `create`, `all`, `where`, `orderBy`, etc.

## Relationships

-   Models support relationships (e.g., one-to-many, many-to-many).

## Example: Creating a Task Model

```bash
php artisan make:model Task -m
```

#### `README_MIGRATIONS.md`

````markdown
# Migrations

## Definition

-   Migrations provide version control for your database schema.
-   Located in the `database/migrations` folder.

## Structure

-   Each migration has `up` (apply changes) and `down` (revert changes) methods.

## Schema Class

-   Use the `Schema` class to define table structures.
-   `create` method specifies table name and columns.

## Primary Key

-   The `id` method creates an auto-incrementing primary key.

## Timestamps

-   The `timestamps` method adds `created_at` and `updated_at` columns.

## Running Migrations

-   Apply migrations: `php artisan migrate`.
-   Revert the last migration: `php artisan migrate:rollback`.

## Example: Generated Migration for Task

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('long_description')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
```
````

### Additional Notes

### Primary Key: Uniquely identifies each record in the table.

### Eloquent ORM: Maps classes to database tables and provides methods to interact with the data.

### Relationships: Supported for defining associations between different models
