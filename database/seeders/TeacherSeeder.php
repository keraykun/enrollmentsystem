<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Details;
use App\Models\TeacherLRN;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        $teacher = User::create([
            'email' => 'teacher@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'teacher',
            'created_at'=>now(),
            'remember_token' => Str::random(10),
        ]);
        Details::create([
            'user_id'=>$teacher->id,
            'firstname'=>'Elmar',
            'middlename'=>'Buena',
            'lastname'=>'Noche',
            'contact'=>$this->faker->randomElement(['09111312341','09998812341','09171231234','09171231234','09612312335','09672312377','09712312333','09133312344','09912312346','09999312347','09314512347','09882312345','09312312341','09698312341','09314747341']),
            'birthdate'=>Carbon::create('1985', '01', '01'),
            'gender'=>$this->faker->randomElement(['female','male']),
            'address'=>$this->faker->address(),
            'street'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'province'=>$this->faker->country(),
            'nationality'=>'Filipino',
            'religion'=>$this->faker->randomElement(['catholic','iglesia','born again','muslim']),
            'status'=>$this->faker->randomElement(['married','single']),
        ]);

        TeacherLRN::create([
            'user_id'=>$teacher->id,
            'name'=>'1024120531011'
        ]);

        $teacher_two = User::create([
            'email' => 'teacher2@test.com',
            'email_verified_at' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'teacher',
            'created_at'=>now(),
            'remember_token' => Str::random(10),
        ]);
        Details::create([
            'user_id'=>$teacher_two->id,
            'firstname'=>'Luisa',
            'middlename'=>'Andalo',
            'lastname'=>'Gaspa',
            'contact'=>$this->faker->randomElement(['09111312341','09998812341','09171231234','09171231234','09612312335','09672312377','09712312333','09133312344','09912312346','09999312347','09314512347','09882312345','09312312341','09698312341','09314747341']),
            'birthdate'=>Carbon::create('1990', '01', '01'),
            'birthdate_place'=>$this->faker->streetAddress(),
            'gender'=>$this->faker->randomElement(['female']),
            'address'=>$this->faker->address(),
            'street'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'province'=>$this->faker->country(),
            'nationality'=>'Filipino',
            'religion'=>$this->faker->randomElement(['catholic','iglesia','born again','muslim']),
            'status'=>$this->faker->randomElement(['married','single']),
        ]);

        TeacherLRN::create([
            'user_id'=>$teacher_two->id,
            'name'=>'1024120536611'
        ]);

        $teacher_three = User::create([
            'email' => 'teacher3@test.com',
            'email_verified_at' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'teacher',
            'created_at'=>now(),
            'remember_token' => Str::random(10),
        ]);
        Details::create([
            'user_id'=>$teacher_three->id,
            'firstname'=>'Jose',
            'middlename'=>'Manalo',
            'lastname'=>'Rizal',
            'contact'=>$this->faker->randomElement(['09111312341','09998812341','09171231234','09171231234','09612312335','09672312377','09712312333','09133312344','09912312346','09999312347','09314512347','09882312345','09312312341','09698312341','09314747341']),
            'birthdate'=>Carbon::create('1994', '01', '01'),
            'birthdate_place'=>$this->faker->streetAddress(),
            'gender'=>$this->faker->randomElement(['male']),
            'address'=>$this->faker->address(),
            'street'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'province'=>$this->faker->country(),
            'nationality'=>'Filipino',
            'religion'=>$this->faker->randomElement(['catholic','iglesia','born again','muslim']),
            'status'=>$this->faker->randomElement(['married','single']),
        ]);

        TeacherLRN::create([
            'user_id'=>$teacher_three->id,
            'name'=>'1024120531551'
        ]);
    }
}
