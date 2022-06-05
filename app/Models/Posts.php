<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "excerpt",
        "body",
        "created_by",
        "updated_by",
        "deleted_at"
    ];

    public function getUserFromCreatedBy() {
        return $this->hasOne(User::class, "id", "created_by");
    }

    public function getUserFromupdatedBy() {
        return $this->hasOne(User::class, "id", "updated_by");
    }
}
