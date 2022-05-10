<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index () {
        $usersData = User::all();
        return view("user-management", compact(['usersData']));
    }
}
