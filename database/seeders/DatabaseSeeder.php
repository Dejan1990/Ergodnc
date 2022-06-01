<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Office;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::create([
            'name' => 'Dejan',
            'email' => 'dejan@laravel.com',
            'password' => Hash::make('password')
        ]);

        $office1 = Office::factory()->create();
        $office2 = Office::factory()->create();
        $office3 = Office::factory()->create();

       $office1->images()->create([
           'path' => 'storage/1.jpg'
       ]);

       $office2->images()->create([
           'path' => 'storage/2.jpg'
       ]);

       $office3->images()->create([
           'path' => 'storage/3.jpg'
       ]);

       Reservation::factory()->for($user)->for($office1)->create();
       Reservation::factory()->for($user)->for($office2)->create();
       Reservation::factory()->for($user)->for($office3)->create();
    }
}
