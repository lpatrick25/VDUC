<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = ['equipment_name', 'quantity'];

    public function rentalItems()
    {
        return $this->hasMany(EquipmentRentalItem::class);
    }

    public function rentalStatuses()
    {
        return $this->hasMany(RentalItemStatus::class);
    }

    public function getAvailableQuantityAttribute()
    {
        $rented = $this->rentalItems()
            ->whereHas('rental', function ($query) {
                $query->whereNotIn('status', ['Returned', 'Cancelled']);
            })
            ->sum('quantity');

        return $this->quantity - $rented;
    }

    public function getRentedQuantityAttribute()
    {
        return $this->rentalItems()
            ->whereHas('rental', function ($query) {
                $query->whereNotIn('status', ['Returned', 'Cancelled']);
            })
            ->sum('quantity');
    }

    public function getStatusAttribute()
    {
        return $this->available_quantity > 0 ? 'Available' : 'Not Available';
    }

    public function rentals()
    {
        return $this->belongsToMany(Rental::class, 'equipment_rental_items')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
