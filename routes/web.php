<?php

use Inertia\Inertia;
use App\Models\Course;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CourseResource;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Resources\SubCategoryResource;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

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
   //$subCategories = SubCategoryResource::collection(SubCategory::all()->where('category_id', 1));
   $categories = CategoryResource::collection(Category::all());
   $subCategories = SubCategoryResource::collection(SubCategory::all());
   $courses =  CourseResource::collection(Course::all());
   return Inertia::render("Home", compact('categories', 'subCategories', 'courses'));
})->name('home');



Route::prefix('/courses/{category}')->controller(CategoryController::class)->name('category.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/courses/{subCategory}')->controller(SubCategoryController::class)->name('subCategory.')->group(function () {
   Route::get('/', 'show')->name('show');
});

Route::prefix('/course')->controller(CourseController::class)->name('course.')->group(function () {
   Route::get('/{course}', 'show')->name('show');
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
