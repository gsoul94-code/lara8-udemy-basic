<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostCategoriesController extends Controller
{
    public function index () {
        $postCategories = PostCategories::orderBy("id", "DESC")->paginate(5);
        $postCategoriesDeleted = PostCategories::onlyTrashed()->orderBy("deleted_at", "DESC")->paginate(3);
        return view("admin.post-categories.index", compact("postCategories", "postCategoriesDeleted"));
    }

    public function add () {
        return view("admin.post-categories.add");
    }

    public function store (Request $request) {
        $request->validate([
            "category" => "required|unique:post_categories|max:100"
        ],[
            "category.required" => "Please input Post Category name",
            "category.max" => "Category less then 100 chars "
        ]);
        PostCategories::insert([
            'category' => $request->category,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with("success", "Post category has been added successfully");
    }

    public function edit($id) {
        $postCategories = PostCategories::find($id);
        return view("admin.post-categories.edit", compact("postCategories"));
    }

    public function update(Request $request, $id) {
        PostCategories::find($id)->update([
            "category" => $request->category,
            "updated_by" => Auth::user()->id
        ]);
        return Redirect()->back()->with("success", "Post category has been updated successfully");
    }

    public function remove($id){
        // If you using softdelete from laravel, you can't update updated_by
        // Therefore, you must using custome function
        // $delete = PostCategories::find($id)->delete(); // This is softdelete from laravel (default)

        // Custom function if you want to delete and updating updated_by field
        PostCategories::find($id)->update([
            "updated_by" => Auth::user()->id,
            "deleted_at" => Carbon::now()
        ]);
        return Redirect()->back()->with("success", "Post category has been removed successfully");
    }

    public function restore($id) {
        // PostCategories::withTrashed()->find($id)->restore(); // This is restore from laravel (default)

        // Custom function, if you want to restore and updating updated_by field
        PostCategories::withTrashed()->find($id)->update([
            "updated_by" => Auth::user()->id,
            "updated_at" => Carbon::now(),
            "deleted_at" => null
        ]);
        return Redirect()->back()->with("success", "Post category has been restored successfully");
    }

    public function delete($id) {
        PostCategories::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with("success", "Post category has been deleted successfully");

    }
}
