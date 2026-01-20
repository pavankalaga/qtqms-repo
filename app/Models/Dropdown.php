<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'dropdowns';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Disable timestamps if not using them
    public $timestamps = false;

    // Define the fillable columns
    protected $fillable = ['name', 'parent_name','used_for'];

    // Optionally define relationships (if there are any, for example with a parent dropdown)
    public function parent()
    {
        return $this->belongsTo(Dropdown::class, 'parent_name', 'name');
    }
}
