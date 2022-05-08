<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeState extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function cityInformation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CityInformation::class, 'code_state_id');
    }
}
