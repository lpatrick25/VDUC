<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'extension_name',
        'email',
        'password',
        'contact',
        'role',
        'status',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function vessels()
    {
        return $this->hasMany(Vessel::class);
    }

    public function divingApplications()
    {
        return $this->hasMany(DivingApplication::class);
    }
}
