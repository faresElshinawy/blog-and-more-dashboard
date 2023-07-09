<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value'
    ];

    public static function rules()
    {
        return [
            'name'=>'required|string|min:3|max:255',
            'value'=>'required|min:3|max:500'
        ];
    }
}
