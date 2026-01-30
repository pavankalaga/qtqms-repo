<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NucleicAcidExtractionRegister extends Model
{
    use HasFactory;

    protected $table = 'nucleic_acid_extraction_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'time_of_sample_receipt',
        'extraction_kit_lot_no',
        'total_number_of_samples',
        'sample_barcode',
        'performed_by',
        'verified_by',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
