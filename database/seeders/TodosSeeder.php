<?php

namespace Database\Seeders;

use App\Models\Todo;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    Todo::factory()->times(10)->create();
    }
}
