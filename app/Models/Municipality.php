<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cityInformation()
    {
        return $this->hasMany(CityInformation::class, 'municipality');
    }
}
