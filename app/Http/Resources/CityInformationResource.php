<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $data = collect($this->cityInformation)->map(function ($item) {

            $data['locality'] = $item->city->name;
            $data['state'] = $item->state->name;
            $data['codeState'] = $item->codeState->code;
            $data['municipality'] = $item->municipalities->name;
            $data['municipalityCode'] = $item->codeMunicipality->code;

            return $data;
        })->first();

        return   [
            'zip_code' => $this->code,
            'locality' => $data['locality'],
            'federal_entity' => [
                'key' => $data['codeState'],
                'name' => $data['state'],
                'code' => null,
            ],
            'settlements' => SettlementResource::collection($this->cityInformation),
            "municipality" => [
                "key" => $data['municipalityCode'],
                "name" => $data['municipality']
            ],
        ];
    }
}
