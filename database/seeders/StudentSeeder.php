<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Details;
use App\Models\StudentData;
use App\Models\User;
use App\Models\YearLevel;
use App\Models\StudentAcademic;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        foreach(User::where('role','student')->get() as $user){
            Details::create([
                'user_id'=>$user->id,
                'firstname'=>$this->faker->firstName(),
                'middlename'=>$this->faker->lastName(),
                'lastname'=>$this->faker->lastName(),
                'contact'=>$this->faker->randomElement(['09111312341','09998812341','09171231234','09171231234','09612312335','09672312377','09712312333','09133312344','09912312346','09999312347','09314512347','09882312345','09312312341','09698312341','09314747341']),
                'birthdate'=>$this->faker->randomElement([Carbon::create('2008', '01', '01'),Carbon::create('2009', '02', '05'),Carbon::create('2010', '03', '04'),Carbon::create('2011', '08', '11'),Carbon::create('2012', '01', '22')]),
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
            StudentAcademic::create([
                'user_id'=>$user->id,
                'yearlevel_id'=>YearLevel::all()->random()->id,
                'department_id'=>Department::all()->random()->id,
                'start_year'=>$this->faker->randomElement(['2018','2019','2020']),
                'end_year'=>$this->faker->randomElement(['2020','2021','2022','2023']),
                'status'=>'active'
            ]);

            StudentData::create([
                'user_id'=>$user->id,
                'status'=>$this->faker->randomElement(['regular','transferee','dropped']),
                'transferee_school_id'=>null
            ]);
        }

        $this->faker = Faker::create();
        $student = User::create([
            'email' => 'student@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'student',
            'created_at'=>now(),
            'remember_token' => Str::random(10),
        ]);
        Details::create([
            'user_id'=>$student->id,
            'firstname'=>'Aaaron',
            'middlename'=>'Waifu',
            'lastname'=>'Aaaluis',
            'contact'=>$this->faker->randomElement(['09111312341','09998812341','09171231234','09171231234','09612312335','09672312377','09712312333','09133312344','09912312346','09999312347','09314512347','09882312345','09312312341','09698312341','09314747341']),
            'birthdate'=>Carbon::create('1985', '01', '01'),
            'gender'=>$this->faker->randomElement(['male']),
            'address'=>$this->faker->address(),
            'street'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'province'=>$this->faker->country(),
            'nationality'=>'Filipino',
            'religion'=>$this->faker->randomElement(['catholic','iglesia','born again','muslim']),
            'status'=>$this->faker->randomElement(['married','single']),
        ]);

        StudentAcademic::create([
            'user_id'=>$student->id,
            'yearlevel_id'=>YearLevel::all()->random()->id,
            'department_id'=>Department::all()->random()->id,
            'start_year'=>$this->faker->randomElement(['2018','2019','2020']),
            'end_year'=>$this->faker->randomElement(['2020','2021','2022','2023']),
            'status'=>'active'
        ]);

        StudentData::create([
            'user_id'=>$student->id,
            'status'=>$this->faker->randomElement(['regular','transferee','dropped']),
            'transferee_school_id'=>null
        ]);
    }
}
