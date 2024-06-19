# Factories

# Definition

# Factories generate fake data for your models using the Faker library.

# Located in the database/factories folder.

# Create a factory for a model:

```php
php artisan make:factory TaskFactory --model=Task
```

# Example Factory

```php
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'long_description' => $faker->paragraph(7, true),
        'completed' => $faker->boolean,
    ];
});
```

### Seeders

# Seeders populate the database with sample data.

# Located in the database/seeders folder.

# Seed the database with data

```php
php artisan db:seed
```

```php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 users
        \App\Models\User::factory(10)->create();

        // Generate 20 tasks
        \App\Models\Task::factory(20)->create();
    }
}
```

# To refresh your database and seed it with data:

```php
php artisan migrate:refresh --seed
```
