<?php
    namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
 protected $table='folders';
    protected $fillable = ['name', 'folder_id','path'];



    public function documents()
    {
        return $this->hasMany(Document::class, 'folder_id');
    }
    
   }

