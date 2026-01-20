<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'course',
        'employee_id',
        'present',
        'absent',
        'pre_training_score',
        'pre_training_doc_path',
        'post_training_score',
        'post_training_doc_path',
        'trainer_feedback',
        'trainer_feedback_doc_path',
        'trainee_feedback',
        'trainee_feedback_doc_path',
        'additional_doc_path',
        'photo_path'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
