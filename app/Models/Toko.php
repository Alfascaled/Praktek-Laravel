<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Toko extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'keterangan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    /**
     * Get all stok records for this toko.
     */
    public function stoks(): HasMany
    {
        return $this->hasMany(Stok::class);
    }

    /**
     * Get all products in this toko through stoks.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'stoks')
            ->withPivot(['jumlah', 'stok_minimum', 'keterangan'])
            ->withTimestamps();
    }
}
