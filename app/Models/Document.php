<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

   protected $fillable = [
        'name',
        'parent_id',
        'doc_file',
        'doc_notes',
        'lead_id',
        'lock',
        'locked_by',
        'created_by',
        'document_no',
        'version_no',
        'status',
        'tags',
        'retention_period',
        'description',
        'uploaded_at',
        'uploaded_by',
          'type',

    ];

    // Define relationship for subfolders
    public function children()
    {
        return $this->hasMany(Document::class, 'parent_id');
    }

    // Define relationship to parent folder
    public function parent()
    {
        return $this->belongsTo(Document::class, 'parent_id');
    }

    public function folder_permissions()
    {
        return $this->hasMany(FolderPermission::class, 'folder_id');
    }
    public function versions()
    {
        return $this->hasMany(Document::class, 'parent_id');
    }
}
