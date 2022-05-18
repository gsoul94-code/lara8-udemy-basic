<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostCategoriesController extends Controller
{
    public function index () {
        // $postCategories = PostCategories::all();
        // $postCategories = PostCategories::latest()->get(); // Read data filter for latest or DESC with Eloquent ORM
        // $postCategories = DB::table("post_categories")->latest()->get(); // Read data filter for latest or DESC with Query Builder
        $postCategories = DB::table("post_categories")->latest()->paginate(5);
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

        // ------ Insert with ORM

        // First way
        // PostCategories::insert([
        //     'category' => $request->category,
        //     'created_by' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        // Second way | If you use this, this automaticaly submit created_at and updated_at
        // $postCategories = new PostCategories();
        // $postCategories->category = $request->category;
        // $postCategories->created_by = Auth::user()->id;
        // $postCategories->save();

        // ------- Insert with Query Builder

        // Fitrst way
        $data = array();
        $data['category'] = $request->category;
        $data['created_by'] = Auth::user()->id;
        DB::table("post_categories")->insert($data);



        return Redirect()->back()->with("success", "Post Category inserted successfull");

    }
}
