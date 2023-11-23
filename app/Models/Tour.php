<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory, HasUlids; 

    protected $fillable =[
        'travel_id',
        'name',
        'starting_date',
        'ending_date',
        'price'
    ];

    public function getPriceAttribute($value)
    {
        return $value / 100; // When you access the 'price' attribute, it divides the stored value by 100.
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100; // When you set the 'price' attribute, it multiplies the value by 100 before storing it in the database.
    }

    // With this code, when you retrieve the "price" attribute, it will automatically divide the stored value by 100, making it appear as if the price is stored in cents. When you set the "price" attribute, it multiplies the value by 100 before storing it in the database, allowing you to work with the price in cents while interacting with your model.

}
