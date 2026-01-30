<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SplitSampleAnalysisForm extends Model
{
    use HasFactory;

    protected $table = 'split_sample_analysis_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the rows for this form.
     */
    public function rows()
    {
        return $this->hasMany(SplitSampleAnalysisRow::class, 'split_sample_analysis_form_id');
    }

    /**
     * Get the user who created this form.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
