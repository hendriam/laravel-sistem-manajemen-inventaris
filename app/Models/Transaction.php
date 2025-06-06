<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'reference',
        'transacted_at',
        'from_location_id',
        'to_location_id',
        'description',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'transacted_at' => 'datetime',
    ];

     // Relasi ke lokasi asal (bisa null)
    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }

    // Relasi ke lokasi tujuan (bisa null)
    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }

    // Relasi ke detail transaksi
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // Relasi ke pembuat data
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi ke pengubah data
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
