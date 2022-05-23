<?php

namespace App\Http\Controllers;

use App\Models\CategoryQuestions;
use App\Http\Requests\StoreCategoryQuestionsRequest;
use App\Http\Requests\UpdateCategoryQuestionsRequest;

class CategoryQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryQuestionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryQuestions  $categoryQuestions
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryQuestions $categoryQuestions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryQuestions  $categoryQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryQuestions $categoryQuestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryQuestionsRequest  $request
     * @param  \App\Models\CategoryQuestions  $categoryQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryQuestionsRequest $request, CategoryQuestions $categoryQuestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryQuestions  $categoryQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryQuestions $categoryQuestions)
    {
        //
    }
}
