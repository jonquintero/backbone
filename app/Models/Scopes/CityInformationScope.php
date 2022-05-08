<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CityInformationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->with('settlement:id,name',
        'city:id,name', 'settlementType:id,name',
            'municipalities:id,name',  'state:id,name',
            'directionCp:id,code', 'codeState:id,code',
            'codeOffice:id,code', 'codeSettlementType:id,code',
            'codeMunicipality:id,code', 'idSettlement:id,code',
            'typeZone:id,name', 'codeCity:id,code'
        );
    }

}
