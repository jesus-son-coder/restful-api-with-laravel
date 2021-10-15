<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        // the "belongsToMany" relationship is only available
        // for the "Many-To-Many" relationship :
        return $this->belongsToMany(Product::class);
    }

}
