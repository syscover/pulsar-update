<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UpdateTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(UpdatePackageSeeder::class);

        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="UpdateTableSeeder"
 */
