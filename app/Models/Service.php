<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public static $uploadPath = 'Uploads/Services';

    public static function rules()
    {
        return ['description'=>'required|string|min:10|max:500',];
    }
}
