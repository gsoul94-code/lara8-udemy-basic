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
        "caregory",
        "created_by"
    ];

    // Eloquent ORM Join table with One To One Relationship
    // public function user() {
    //     // Select user table where user.id = post_categories.created_by
    //     return $this->hasOne(User::class, 'id', 'created_by');
    // }

}
