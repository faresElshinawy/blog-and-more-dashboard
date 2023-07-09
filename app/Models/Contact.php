<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message'
    ];

    public static function rules()
    {
        return [
            'name'=>'required|string|min:3|max:255',
            'email'=>'required|email|exists:users,email',
            'message'=>'required|string|min:3|max:500'
        ];
    }
}
