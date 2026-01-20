<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class TreeRole extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['reported_role'];

    protected $table = 'tree_roles';
}
