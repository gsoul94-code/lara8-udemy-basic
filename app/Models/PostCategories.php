<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "category",
        "created_by",
        "updated_by",
        "deleted_by"
    ];

    // Eloquent ORM Join table with One To One Relationship
    public function getUserFromCreatedBy() {
        // Select user table where user.id = post_categories.created_by
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function getUserFromUpdatedBy() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function getUserFromDeletedBy() {
        return $this->hasOne(User::class, 'id', 'deleted_by');
    }

}
