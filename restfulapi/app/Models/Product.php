<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const UNAVAILABLE_PRODUCT = 'unavailable';
    const AVAILABLE_PRODUCT = 'available';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id'
    ];

    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }


    public function categories()
    {
        // the "belongsToMany" relationship is only available
        // for the "Many-To-Many" relationship :
        return $this->belongsToMany(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
