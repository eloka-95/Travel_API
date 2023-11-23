<?php

namespace App\Models;

use Attribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Travel extends Model
{
    use HasFactory, Sluggable, HasUlids;

    protected $table = 'travels';

    protected $fillable = [
        'is_public',
        'slug',
        'name',
        'description',
        'number_of_days'
    ];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
   
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name', // Verify that 'name' is a valid attribute in your model.
            ],
        ];
    }

    // creating a  virtual column using data from the table 
    public function getNumberOfNightsAttribute()
    {
        return $this->number_of_days - 1;
    }

    
   


}
