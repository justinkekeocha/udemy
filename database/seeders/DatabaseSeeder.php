<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use App\Models\User;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
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

      //Makes data consistent for each seeding
      Factory::create()->seed(1234);

      User::factory(10)->create();

      Category::factory(8)->sequence(
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-design-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-development-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-marketing-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-it-and-software-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-personal-development-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-business-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-photography-v2.jpg'],
         ['image' => 'https://s.udemycdn.com/home/top-categories/lohp-category-music-v2.jpg'],
      )->create();

      SubCategory::factory(32)
         ->sequence(fn (Sequence $sequence) => ['category_id' => Category::all()->random()])
         ->create();

      Topic::factory(128)
         ->sequence(fn (Sequence $sequence) => ['sub_category_id' => SubCategory::all()->random()])
         ->create();

      Course::factory(1280)
         ->sequence(fn (Sequence $sequence) => ['topic_id' => Topic::all()->random()])
         ->sequence(fn (Sequence $sequence) => ['instructor_id' => User::all()->random()])
         ->sequence(
            ['image' => 'https://img-c.udemycdn.com/course/240x135/1565838_e54e_16.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/240x135/2776760_f176_10.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/851712_fc61_6.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/2196488_8fc7_10.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/3142166_a637_3.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/1362070_b9a1_2.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/567828_67d0.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/5170404_d282_9.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/793796_0e89_2.jpg'],
            ['image' => 'https://img-c.udemycdn.com/course/480x270/625204_436a_3.jpg'],
            ['image' =>
            'https://img-c.udemycdn.com/course/480x270/950390_270f_3.jpg'],
         )
         ->create();
   }
}
