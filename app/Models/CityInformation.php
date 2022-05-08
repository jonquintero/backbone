<?php

namespace App\Models;

use App\Models\Scopes\CityInformationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_id',
        'settlement_id' ,
        'settlement_type_id' ,
        'municipality' ,
        'state_id',
        'city_id',
        'direction_cps_id',
        'code_state_id',
        'code_office_id' ,
        'code_settlement_type_id' ,
        'code_municipality_id' ,
        'id_settlement_id',
        'type_zone_id' ,
        'code_city_id' ,
    ];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CityInformationScope());
    }

    public function code(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Code::class, 'code_id');
    }
    public function settlement(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Settlement::class, 'settlement_id');
    }
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function settlementType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SettlementType::class, 'settlement_type_id');
    }

    public function municipalities(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Municipality::class, 'municipality');
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function directionCp(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DirectionCp::class, 'direction_cps_id');
    }

    public function codeState(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CodeState::class, 'code_state_id');
    }

    public function codeOffice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CodeOffice::class, 'code_office_id');
    }

    public function codeSettlementType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CodeSettlementType::class, 'code_settlement_type_id');
    }

    public function codeMunicipality(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CodeMunicipality::class, 'code_municipality_id');
    }

    public function idSettlement(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IdSettlement::class, 'id_settlement_id');
    }

    public function typeZone(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeZone::class, 'type_zone_id');
    }

    public function codeCity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CodeCity::class, 'code_city_id');
    }
}
