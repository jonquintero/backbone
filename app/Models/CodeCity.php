<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeCity extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function cityInformation()
    {
        return $this->hasMany(CityInformation::class, 'code_city_id');
    }
}
