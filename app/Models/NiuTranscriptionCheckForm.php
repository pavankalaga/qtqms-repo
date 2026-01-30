<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiuTranscriptionCheckForm extends Model
{
    use HasFactory;

    protected $table = 'niu_transcription_check_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'check_date',
        'visit_no',
        'worksheet_result',
        'lis_result',
        'entered_by',
        'verified_by',
        'created_by',
        'updated_by',
    ];
}
