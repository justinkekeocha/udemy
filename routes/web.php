<?php

use Inertia\Inertia;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\SubCategoryResource;
use App\Http\Controllers\CategoryController;
use App\Http\Resources\CourseResource;
use App\Models\Course;

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
   $subCategories = SubCategoryResource::collection(SubCategory::all());
   $courses =  CourseResource::collection(Course::all());
   return Inertia::render("Home", compact('subCategories', 'courses'));
})->name('home');

Route::prefix('/courses')->controller(CategoryController::class)->name('category.')->group(function () {
   Route::get('/{category}', 'show')->name('show');
});


