<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionCp extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function cityInformation()
    {
        return $this->hasMany(CityInformation::class, 'direction_cps_id');
    }
}
