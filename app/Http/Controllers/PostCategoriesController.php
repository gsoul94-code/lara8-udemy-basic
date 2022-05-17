<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    public function index () {
        $postCategories = PostCategories::all();
        return view("admin.post-categories.index", compact(["postCategories"]));
    }

    public function add () {
        return view("admin.post-categories.add");
    }

    public function store (Request $request) {
        $validateData = $request->validate([
            "category" => "required|unique:post_categories|max:100"
        ],[
            'category.required' => "Please input post category name",
            'category.max' => "Category less then 100 chars ",
        ]);
    }
}
