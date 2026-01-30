<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboRhTypingQcForm extends Model
{
    use HasFactory;

    protected $table = 'abo_rh_typing_qc_forms';

    protected $fillable = [
        'doc_no',
        'check_date',
        'anti_a_appearance',
        'anti_a_a',
        'anti_a_b',
        'anti_a_o',
        'anti_b_appearance',
        'anti_b_a',
        'anti_b_b',
        'anti_b_o',
        'anti_d_igm_appearance',
        'anti_d_igm_a',
        'anti_d_igm_b',
        'anti_d_igm_o',
        'anti_d_igg_appearance',
        'anti_d_igg_a',
        'anti_d_igg_b',
        'anti_d_igg_o',
        'anti_a1_appearance',
        'anti_a1_a',
        'anti_a1_b',
        'anti_a1_o',
        'anti_h_appearance',
        'anti_h_a',
        'anti_h_b',
        'anti_h_o',
        'done_by',
        'verified_by',
        'remarks',
        'created_by',
        'updated_by',
    ];

    // protected $casts = [
    //     'check_date' => 'date',
    // ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
