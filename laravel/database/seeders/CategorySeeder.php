<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['id' => 1, 'name' => 'Gado']);
        Category::create(['id' => 2, 'name' => 'Suínos']);
        Category::create(['id' => 3, 'name' => 'Aves']);
        Category::create(['id' => 4, 'name' => 'Outros']);
    }
}
