<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SampleVolumeCheckItem extends Model
{
    use HasFactory;

    protected $table = 'sample_volume_check_items';

    protected $fillable = [
        'sample_volume_check_id',
        'container_type',
        'required_qty',
        'actual_qty',
        'remarks',
        'month'
    ];

    /**
     * Each container row belongs to one form
     */
    public function form()
    {
        return $this->belongsTo(
            SampleVolumeCheck::class,
            'sample_volume_check_id'
        );
    }
}
