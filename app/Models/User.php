<?php

namespace App\Models;

use App\Http\Livewire\BusinessInfo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'address',
        'number',
        'city',
        'state',
        'sales_headquarter_id',
        'role',
        'reported_to',
        'tree_role_id',
        'password',
        'employee_code',
        'imageEmp',
        'department',
        'designation',
        'read',
        'lock',
        'upload',
        'joining_date',
    ];


    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function leads()
    {
        return $this->hasMany(BusinessInfo::class, 'id', 'assign_user');
    }

    public function sales_headquarter()
    {
        return $this->belongsTo(Salesheadquarter::class, 'sales_headquarter_id');
    }

    public function assign_user()
    {
        return $this->belongsTo(NestedRole::class, 'tree_role_id');
    }

}
