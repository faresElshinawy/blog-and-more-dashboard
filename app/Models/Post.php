<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static $uploadPath = 'Uploads/Posts';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'date',
        'image',
    ];

    public static function rules()
    {
        return [
            'description'=>'required|min:3|max:500',
            'category_id'=>'required|gt:0|exists:post_categories,id',
            'tags'=>'nullable|exists:tags,id'
        ];
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class,'post_id');
    }
}
