<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'inventory_id',
        'quantity',
        'note',
    ];

    // Relasi ke header transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    // Relasi ke data barang (inventory)
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
