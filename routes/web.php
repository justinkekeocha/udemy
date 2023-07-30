<?php

use Inertia\Inertia;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use App\Http\Resources\TopicResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Artisan;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CourseController;
use App\Http\Resources\SubCategoryResource;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   $categories = CategoryResource::collection(Category::with(['subCategories', 'topics'])->get());
   // $subCategories = SubCategoryResource::collection(SubCategory::all());
   // $courses =  CourseResource::collection(Course::all());
   // $topics = TopicResource::collection(Topic::all());
   // return Inertia::render("Home", compact('categories', 'subCategories', 'courses', 'topics'));
   return Inertia::render("Home", compact('categories'));
})->name('home');



Route::prefix('/courses/{category}')->controller(CategoryController::class)->name('categories.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/courses/{subCategory}')->controller(SubCategoryController::class)->name('subCategories.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/topics/{topic}')->controller(TopicController::class)->name('topics.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/course')->controller(CourseController::class)->name('courses.')->group(function () {
   Route::get('/{course}', 'show')->name('show');
});

Route::prefix('/user')->controller(UserController::class)->name('users.')->group(function () {
   Route::get('/{user}', 'show')->name('show');
});


Route::prefix('/login')->controller(LoginController::class)->group(function () {

   Route::middleware('guest')->group(function () {
      Route::get('/', 'index')->name('login');
      Route::post('/', 'create');
      Route::get('/reset-password', 'showResetPasswordForm')->name('password.reset');

      //Only custom routes should be here, the rest above, depend on some core laravel code
      Route::name('login.')->group(function () {
         Route::post('/request-password-reset', 'requestPasswordReset');
         Route::patch('/reset-password', 'resetPassword');
         Route::get('/google-redirect', 'googleRedirect');
         Route::get('/google-callback', 'googleCallback');
      });
   });

   Route::middleware('auth')->name('login.')->group(function () {
      Route::post('/logout',  'logout')->name('logout');
      Route::patch('/change-password',  'changePassword')->name('change-password');
   });
});

Route::prefix('/production')->group(function () {
   if (App::environment('production')) {
      //this will reset cache
      //https://dev.to/kenfai/laravel-artisan-cache-commands-explained-41e1
      Route::get('/cache', function () {
         Artisan::call('config:cache');
         Artisan::call('route:cache');
         Artisan::call('view:cache');
         Artisan::call('event:cache');
         echo 'All cache cleared without flushing cache';
         Artisan::call('migrate:fresh --seed --force');
      });
   }
});
