<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFolder extends Model
{
    use HasFactory;
    protected $table = 'document_folder';
    protected $fillable = ['folder_name', 'parent_id','image'];

    public function children()
    {
        return $this->hasMany(DocumentFolder::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(DocumentFolder::class, 'parent_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'folder_permission', 'folder_id', 'permission_id')
            ->withPivot('read', 'edit', 'full', 'lock', 'no_permission');
    }

    public function folder_permissions()
    {
        return $this->hasMany(FolderPermission::class, 'folder_id');
    }
    
}
