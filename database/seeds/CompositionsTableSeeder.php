<?php

use Illuminate\Database\Seeder;
use App\Composition;

class CompositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Composition::class, 100)->create();
    }
}
