<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image'
    ];

    public static $uploadPath = 'Uploads/Plans';

    public static function rules()
    {
        return [
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:15|max:500',
            'price'=>'required|numeric',
        ];
    }
}
