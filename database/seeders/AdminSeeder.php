<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Details;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        $admin = User::create([
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'created_at'=>now(),
            'remember_token' => Str::random(10),
        ]);

        Details::create([
            'user_id'=>$admin->id,
            'firstname'=>'Admin Firstname',
            'middlename'=>'Admin Middlename',
            'lastname'=>'Admin Lastname',
            'contact'=>$this->faker->phoneNumber(),
            'birthdate'=>$this->faker->dateTimeBetween('-5 years','now'),
            'birthdate_place'=>$this->faker->streetAddress(),
            'gender'=>$this->faker->randomElement(['female','male']),
            'address'=>$this->faker->address(),
            'street'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'province'=>$this->faker->country(),
            'nationality'=>'Filipino',
            'religion'=>$this->faker->randomElement(['catholic','iglesia','born again','muslim']),
            'status'=>$this->faker->randomElement(['married','single']),
        ]);
    }
}
