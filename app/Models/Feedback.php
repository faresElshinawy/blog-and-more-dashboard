<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'rate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function rules()
    {
        return [
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:6|max:500',
            'rate'=>'required|numeric|max:5|min:1'
        ];
    }
}
