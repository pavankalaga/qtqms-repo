<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TissueEmbeddingConsoleMaintenanceForm extends Model
{
    protected $table = 'tissue_embedding_console_maintenance_forms';

    protected $fillable = [
        'tec_month_year',
        'tec_instrument_id',

        // JSON
        'tec_daily',

        // Meta
        'doc_no',
        'issue_no',
        'issue_date',
    ];

    protected $casts = [
        'tec_daily' => 'array',
    ];
}
