<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TopicResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, SubCategory $subCategory)
    {
        $model = $subCategory;
        $model = new SubCategoryResource($model);
        $topics = TopicResource::collection($model->topics->take(20));
        $courses = CourseResource::collection($model->courses);
        //https://laravel.com/docs/10.x/eloquent-relationships#deferred-count-loading
        //https://laravel.com/docs/10.x/eloquent-relationships#lazy-eager-loading
        $instructors =  UserResource::collection($model->instructors->loadCount('instructedCourses'));

        return Inertia::render("Courses/Show", compact('model', 'courses', 'topics', 'instructors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
