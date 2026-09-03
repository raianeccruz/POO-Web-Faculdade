**Acessar o container web:** 

```sh
docker exec -it poo_web_php bash
```

**Rodar o teste:**

```sh
php artisan test
```

**Criar model, migration, factory e seeder:**

```sh
php artisan make:model Category -fsm
```

**Editar a Migration:** poo-web/apps/api/database/migrations/{alguma_data_hora_aqui}_create_categories_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
```

**Editar a Factory:** poo-web/apps/api/database/factories/CategoryFactory.php

```php
<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->sentences(asText: true),
            'position' => 0,
        ];
    }
}
```

**Editar o Seeder:** poo-web/apps/api/database/seeders/CategorySeeder.php

```php
<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(10)->create();
    }
}
```

**Rodar migrations:**

```sh
php artisan migrate
```

**Rodar seeder de categorias:**

```sh
php artisan db:seed CategorySeeder
```

**Acessar phpMyAdmin:**

- [**phpMyAdmin** - http://localhost:8184](http://localhost:8184)

user: root
pass: root
base: poo_web

**Verificar a tabela categories:** Deve ter registros inseridos
