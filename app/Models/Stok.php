<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stok extends Model
{
    protected $fillable = [
        'product_id',
        'toko_id',
        'jumlah',
        'stok_minimum',
        'keterangan',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'stok_minimum' => 'integer',
    ];

    /**
     * Get the product that owns this stok.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the toko that owns this stok.
     */
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    /**
     * Check if stock is low (below minimum).
     */
    public function isLowStock(): bool
    {
        return $this->jumlah <= $this->stok_minimum;
    }
}
