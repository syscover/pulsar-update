<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class UpdatePackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 30, 'name' => 'Update Package', 'root' => 'update', 'sort' => 30, 'active' => true, 'version' => '1.0.0']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="UpdatePackageSeeder"
 */
