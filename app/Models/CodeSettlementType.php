<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeSettlementType extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function cityInformation()
    {
        return $this->hasMany(CityInformation::class, 'code_settlement_type_id');
    }
}
