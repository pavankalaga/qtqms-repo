<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SplitSampleAnalysisRow extends Model
{
    use HasFactory;

    protected $table = 'split_sample_analysis_rows';

    protected $fillable = [
        'split_sample_analysis_form_id',
        'row_number',
        'test_name',
        'tech1_result',
        'tech2_result',
        'correlation',
        'remarks',
        'signature',
    ];

    /**
     * Get the parent form.
     */
    public function form()
    {
        return $this->belongsTo(SplitSampleAnalysisForm::class, 'split_sample_analysis_form_id');
    }
}
