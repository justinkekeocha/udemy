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
use App\Http\Controllers\SignupController;
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
   return Inertia::render("Home", compact('categories'));
})->name('home');

Route::get('/test', function () {
   return Inertia::render("Test");
});

Route::prefix('/courses/{category}')->group(function () {
   Route::controller(CategoryController::class)->name('categories.')->group(function () {
      Route::get('/', 'show')->name('show');
   });

   Route::prefix('/{subCategory}')->controller(SubCategoryController::class)->name('subCategories.')->group(function () {
      Route::get('/', 'show')->name('show');
   });
});


Route::prefix('/topic/{topic}')->controller(TopicController::class)->name('topics.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/course/{course}')->controller(CourseController::class)->name('courses.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/user')->controller(UserController::class)->name('users.')->group(function () {
   Route::get('/{user}', 'show')->name('show');
   Route::middleware('auth')->group(function () {
      Route::get('/logout', 'logout')->name('logout');
   });
});

Route::prefix('/signup')->controller(SignupController::class)->group(function () {
   Route::get('/', 'index')->name('signup');
   Route::post('/', 'store');
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

Route::get('/clear-cache', function () {

   if (App::environment('production')) {
      //this will reset cache
      //https://github.com/laravel/framework/issues/2501#issuecomment-663833933
      //https://dev.to/kenfai/laravel-artisan-cache-commands-explained-41e1
      Artisan::call('config:cache');
      Artisan::call('route:cache');
      Artisan::call('view:cache');
      Artisan::call('event:cache');
      echo 'Caching applied in production mode';
   }

   if (App::environment('local')) {
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      Artisan::call('event:clear');
      echo 'Caching applied in dev mode.';
      echo 'All cache cleared without flushing cache';
   }
});
