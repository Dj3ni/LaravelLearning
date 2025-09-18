<?php

namespace App\Models;

use App\Traits\FormatTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estate extends Model
{
    use HasFactory;
    use FormatTrait;

    protected $fillable = [
        "title",
        "description",
        "price",
        "square_meters",
        "sold",
        "localisation",
    ];

    /**
     * Format price value to be 00.00 in DB
     */
    public function setPriceAttribute($value)
    {
        //Force 2 decimals
        $this->attributes['price'] = $this->formatDecimal($value);
    }
    public function setsquareMetersAttribute($value)
    {
        //Force 2 decimals
        $this->attributes['square_meters'] = $this->formatDecimal($value);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
