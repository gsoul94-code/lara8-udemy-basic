<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserManagement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users";

    protected $fillable = [
        "name",
        "created_by",
        "updated_by",
        "deleted_at"
    ];
    // protected $dates = ['deleted_at'];

    public function getUserFromCreatedBy() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function getUserFromUpdatedBy() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

}
