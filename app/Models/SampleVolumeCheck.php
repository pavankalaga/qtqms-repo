<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SampleVolumeCheck extends Model
{
    use HasFactory;

    protected $table = 'sample_volume_checks';

    protected $fillable = [
        'month',
        'year',
        'location',
        'department',
        'done_by',
        'reviewed_by',
        'status'
    ];

    /**
     * One form has many container rows
     */
    public function items()
    {
        return $this->hasMany(
            SampleVolumeCheckItem::class,
            'sample_volume_check_id'
        );
    }
}
