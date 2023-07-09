<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    public static $uploadPath = 'Uploads/ProjectImages';

    protected $fillable = [
        'project_id',
        'image'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
