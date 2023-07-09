<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static $uploadPath = 'Uploads/Users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'birthdate',
        'age',
        'phone',
        'description',
        'gender_id',
        'country_id',
        'department_id',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function rules()
    {
        return [
            'birthdate'=>'required|date_format:Y-m-d',
            'phone'=>'required|max:11|min:10',
            'description'=>'nullable|string|min:10|max:500',
            'gender_id'=>'required|gt:0|exists:genders,id',
            'country_id'=>'required|gt:0|exists:countries,id',
            'department_id'=>'nullable|gt:0|exists:departments,id',
            'role'=>'nullable|in:user,admin,employee'
        ];
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_teams','user_id');
    }
}
