<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MotivoContato::factory(10)->create();
        \App\Models\SiteContato::factory(10)->create();
        \App\Models\Fornecedor::factory(10)->create();
    }
}
