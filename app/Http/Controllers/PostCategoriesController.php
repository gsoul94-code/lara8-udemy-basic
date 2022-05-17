<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            "category.required" => "Please input Post Category name",
            "category.max" => "Category less then 100 chars "
        ]);

        // First way
        // PostCategories::insert([
        //     'category' => $request->category,
        //     'created_by' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        // Second way with Eloquent ORM | If you use this, this automaticaly submit created_at and updated_at
        $postCategories = new PostCategories();
        $postCategories->category = $request->category;
        $postCategories->created_by = Auth::user()->id;
        $postCategories->save();

        return Redirect()->back()->with("success", "Post Category inserted successfull");

    }
}
