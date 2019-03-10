<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Resource;

class UpdateResourceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id' => 'update',              'name' => 'Update Package',     'package_id' => 30],
            ['id' => 'update-version',      'name' => 'Versions',           'package_id' => 30],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="UpdateResourceTableSeeder"
 */
