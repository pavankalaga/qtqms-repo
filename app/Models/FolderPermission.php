<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'folder_id', 'folder_name', 'read', 'edit', 'full', 'lock', 'noControl','employee_id','delete'
    ];
        protected $table = 'folder_permissions';
}
