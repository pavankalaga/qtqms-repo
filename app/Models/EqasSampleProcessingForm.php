<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EqasSampleProcessingForm extends Model
{
    use HasFactory;

    protected $table = 'eqas_sample_processing_forms';

    protected $fillable = [
        'doc_no',
        'eqas_provider',
        'eqas_lab_id',
        'department_name',
        'sample_temperature',
        'sample_no',
        'accession_no',
        'reconstituted_by',
        'reconstitution_date',
        'processed_by',
        'reviewed_by',
        'qa_shared',
        'result_dispatched_date',
        'evaluation_received_date',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'reconstitution_date' => 'date',
        'result_dispatched_date' => 'date',
        'evaluation_received_date' => 'date',
    ];

    /**
     * Get the user who created this record.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this record.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
