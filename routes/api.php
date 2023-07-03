<?php

use App\Models\Topic;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Resources\TopicResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', function () {
    return CategoryResource::collection(Category::with(['subCategories', 'topics'])->get());
})->name('categories.index');

Route::get('/sub-categories', function () {
    return SubCategoryResource::collection(SubCategory::all());
})->name('subCategories.index');


Route::get('/topics', function () {
    return TopicResource::collection(Topic::all());
})->name('topics.index');

Route::get('/courses', function () {
    return CourseResource::collection(Course::all());
})->name('courses.index');
