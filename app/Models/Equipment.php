<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = ['equipment_name', 'quantity'];

    public function rentalItems() {
        return $this->hasMany(EquipmentRentalItem::class);
    }

    public function rentalStatuses() {
        return $this->hasMany(RentalItemStatus::class);
    }
}
