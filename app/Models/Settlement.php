<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cityInformation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CityInformation::class, 'id');
    }
}
