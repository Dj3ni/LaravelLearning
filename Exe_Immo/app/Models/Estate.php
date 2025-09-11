<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "price",
        "square_meters",
        "sold",
        "localisation",
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
