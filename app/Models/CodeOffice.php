<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeOffice extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function cityInformation()
    {
        return $this->hasMany(CodeOffice::class, 'code_office_id');
    }
}
