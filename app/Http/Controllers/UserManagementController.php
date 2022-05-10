<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function index () {
        // $usersData = User::all(); //! using Eloquent ORM
        $usersData = DB::table("users")->get(); //! using Query Builder
        return view("admin.user-management", compact(['usersData']));
    }
}
