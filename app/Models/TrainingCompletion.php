<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCompletion extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'course_id',
        'employees',
        'additional_doc',
        'photo',
    ];

    protected $casts = [
        'employees' => 'array',
    ];

    public function location()
    {
        return $this->belongsTo(Lab::class, 'location_id');
    }

    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'course_id'); // Adjust model name as needed
    // }

    public function employees()
    {
        return $this->hasMany(TrainingCompletionEmployee::class);
    }
}
