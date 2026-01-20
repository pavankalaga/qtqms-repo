<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCompletionEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_completion_id',
        'employee_id',
        'present',
        'absent',
        'pre_training_score',
        'pre_training_doc',
        'post_training_score',
        'post_training_doc',
        'trainer_feedback',
        'trainer_feedback_doc',
        'trainee_feedback',
        'trainee_feedback_doc',
    ];

    protected $casts = [
        'present' => 'boolean',
        'absent' => 'boolean',
    ];

    public function trainingCompletion()
    {
        return $this->belongsTo(TrainingCompletion::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
