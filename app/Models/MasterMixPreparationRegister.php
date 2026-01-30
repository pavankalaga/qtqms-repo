<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMixPreparationRegister extends Model
{
    use HasFactory;

    protected $table = 'master_mix_preparation_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'row_time',
        'kit_name_lot_no',
        'batch_number',
        'no_of_reactions',
        'reagent_name_components',
        'total_reaction_volume',
        'prepared_by',
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
