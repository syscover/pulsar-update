<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class UpdatePackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 10, 'name' => 'Update Package', 'root' => 'update', 'sort' => 10, 'active' => true]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="UpdatePackageSeeder"
 */
