<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public static function rules()
    {
        return [
            'title'=>'required|string|min:3|max:255',
            'description'=>'required|string|min:10|max:500'
        ];
    }
}
