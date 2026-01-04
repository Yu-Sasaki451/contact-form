<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);

        $categories = Category::all();

        Contact::factory()
        ->count(35)
        ->create([
        'category_id' => fn () => $categories->random()->id,
    ]);
    }
}
