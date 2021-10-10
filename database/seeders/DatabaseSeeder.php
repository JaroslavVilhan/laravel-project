<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Test::factory(10)->create();

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'user123@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
