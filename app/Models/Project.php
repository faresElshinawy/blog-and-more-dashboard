<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'client_name',
        'date',
        'title',
        'description',
        'link',
        'price',
        'status',
        'starts_at',
        'ends_at',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    public static function rules()
    {
        return [
            'client_name'=>'required|min:3|max:255',
            'price'=>'required|numeric',
            'date'=>'required|date_format:Y-m-d',
            'title'=>'required|min:3|max:255',
            'category_id'=>'required|gt:0|exists:project_categories,id',
            'description'=>'required|min:10|max:500',
            'link'=>'nullable|string',
            'status'=>'nullable|in:pending,cancel,success',
            'starts_at'=>'required|date_format:Y-m-d',
            'ends_at'=>'required|date_format:Y-m-d'
        ];
    }

    public function Images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function team()
    {
        return $this->belongsToMany(User::class,'project_teams','project_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_teams');
    }
}
