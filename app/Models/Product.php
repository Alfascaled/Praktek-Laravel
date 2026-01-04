<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'price', 'description'];

    /**
     * Get all stok records for this product.
     */
    public function stoks(): HasMany
    {
        return $this->hasMany(Stok::class);
    }

    /**
     * Get all tokos that have this product through stoks.
     */
    public function tokos()
    {
        return $this->belongsToMany(Toko::class, 'stoks')
            ->withPivot(['jumlah', 'stok_minimum', 'keterangan'])
            ->withTimestamps();
    }
}
