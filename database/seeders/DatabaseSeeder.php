<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\PostTag;
use App\Models\Service;
use App\Models\PostComment;
use App\Models\ProjectTeam;
use App\Models\PostCategory;
use App\Traits\GetAge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use GetAge;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // ClientSeeder::class,
            // CountrySeeder::class,
            // DepartmentSeeder::class,
            // GenderSeeder::class,
            // FeatureSeeder::class,
            // PlanSeeder::class,
            // UserSeeder::class,
            // PostCategorySeeder::class,
            // TagSeeder::class,
            // PostSeeder::class,
            // PostTagSeeder::class,
            // PostCommentSeeder::class,
            // QuestionSeeder::class,
            // ServiceSeeder::class,
            // SettingSeeder::class,
            // FeedbackSeeder::class,
            // ContactSeeder::class,
            // ProjectCategorySeeder::class,
            // ProjectSeeder::class,
            // ProjectTeamSeeder::class,
            // ProjectImageSeeder::class,
        ]);


        // User::create([
        //     'name'=>'fares elshinawy',
        //     'email'=>'test@test.com',
        //     'password'=>Hash::make('123456'),
        //     'phone'=>'01100162900',
        //     'birthdate'=>'2023-06-25',
        //     'gender_id'=>1,
        //     'department_id'=>1,
        //     'country_id'=>1,
        //     'image'=>'649edec24d4271.74073399_WhatsApp Image 2023-03-15 at 1.41.49 PM.jpeg',
        //     'age'=>$this->getAge('2023-06-25')->age,
        //     'role'=>'admin'
        // ]);

    }
}
