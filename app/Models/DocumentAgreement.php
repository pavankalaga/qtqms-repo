<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAgreement extends Model
{
    use HasFactory;
    protected $fillable = [

       'name',
           'document_no',
           'status',
           'version_no',
            'upload_date',
            'retention_period',
            'tags',
            'description',
           'upload_doc',
    ];
    protected $table = 'document_agreement';
}
