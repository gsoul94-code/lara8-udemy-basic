<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\UserManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function index () {
        $usersData = UserManagement::orderBy("id", "DESC")->paginate(5);
        $usersDataRemoved = UserManagement::onlyTrashed()->orderBy("deleted_at", "DESC")->paginate(3);
        return view("admin.user-management.index", compact("usersData", "usersDataRemoved"));
    }

    public function remove ($id) {
        if($id == Auth::user()->id){
            return Redirect()->back()->with("message", "You can't remove yourself at this menu");
        }else{
            UserManagement::find($id)->update([
                "updated_by" => Auth::user()->id,
                "deleted_at" => Carbon::now()
            ]);
            return Redirect()->back()->with("message", "User has been removed successfully");
        }
    }

    public function restore ($id) {
        UserManagement::onlyTrashed()->find($id)->update([
            "updated_by" => Auth::user()->id,
            "deleted_at" => NULL
        ]);
        return redirect()->back()->with("message", "User has been restored successfully");
    }
}
