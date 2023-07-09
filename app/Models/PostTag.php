<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'tag_id'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_tags','tag_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
