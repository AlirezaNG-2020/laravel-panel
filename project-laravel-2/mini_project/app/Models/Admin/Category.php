<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'cat_id', 'status', 'description'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'cat_id', 'id');
    }
}
