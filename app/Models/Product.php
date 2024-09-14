<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'unit_price', 'stock', 'reorder_threshold','store_id'];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
     // Accessor for formatted unit price
     public function getFormattedUnitPriceAttribute()
     {
        return number_format($this->unit_price, 0, '.', ',');
     }
 
     // You may also want to cast unit_price as a float to ensure it's handled correctly
     protected $casts = [
         'unit_price' => 'float',
     ];
}
