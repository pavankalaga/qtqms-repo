<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['note_title' , 'note_date','note_time','created_by','write_note' ,'lead_id','note_upload_attch'];
    protected $table = 'notes';
}
