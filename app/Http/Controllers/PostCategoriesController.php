<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    public function index () {
        $postCategories = PostCategories::all();
        return view("admin.post-categories", compact(["postCategories"]));
    }
}
