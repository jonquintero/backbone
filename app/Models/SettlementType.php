<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cityInformation()
    {
        return $this->hasMany(CityInformation::class, 'settlement_type_id');
    }
}
