<?php

namespace App\Imports;

use App\Models\City;
use App\Models\CityInformation;
use App\Models\Code;
use App\Models\CodeCity;
use App\Models\CodeCp;
use App\Models\CodeMunicipality;
use App\Models\CodeOffice;
use App\Models\CodeSettlementType;
use App\Models\CodeState;
use App\Models\DirectionCp;
use App\Models\IdSettlement;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\State;
use App\Models\TypeZone;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\DefaultValueBinder;

class ImportData extends DefaultValueBinder implements ToCollection, WithChunkReading, WithStartRow, WithCustomValueBinder
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        ini_set('memory_limit','-1');
        ini_set('max_execution_time', 99999);
        ini_set('max_input_time',99999);
        ini_set( 'upload_max_size' , '256M' );
        ini_set( 'post_max_size', '256M');
        //

        foreach ($rows as $row){
            $code = Code::firstOrCreate(['code' => $row[0]]);
            $settlement = Settlement::firstOrCreate(['name' => $row[1]]);
            $settlementType = SettlementType::firstOrCreate(['name' => $row[2]]);
            $municipality = Municipality::firstOrCreate(['name' => $row[3]]);
            $state = State::firstOrCreate(['name' => $row[4]]);

            if(!empty($row[5])){
                $city = City::firstOrCreate(['name' => $row[5]]);
                $city = $city->id;
            }
            $directionCp = DirectionCp::firstOrCreate(['code' => $row[6]]);
            $codeState = CodeState::firstOrCreate(['code' => $row[7]]);
            $codeOffice = CodeOffice::firstOrCreate(['code' => $row[8]]);
           // $codeCp = CodeCp::firstOrCreate(['code' => $row[9]]);
            $codeSettlementType = CodeSettlementType::firstOrCreate(['code' => $row[10]]);
            $codeMunicipality = CodeMunicipality::firstOrCreate(['code' => $row[11]]);
            $idSettlement = IdSettlement::firstOrCreate(['code' => $row[12]]);
            $typeZone = TypeZone::firstOrCreate(['name' => $row[13]]);
            if(!empty($row[14])){
                $codeCity = CodeCity::firstOrCreate(['code' => $row[14]]);
                $codeCity =  $codeCity->id;
            }


            $cityInformation = new CityInformation();


           DB::table('city_information')->insert([
                'code_id' => $code->id,
                'settlement_id' => $settlement->id,
                'settlement_type_id' => $settlementType->id,
                'municipality' => $municipality->id,
                'state_id' => $state->id,
                'city_id' => $city ?? null,
                'direction_cps_id' => $directionCp->id,
                'code_state_id' => $codeState->id,
                'code_office_id' => $codeOffice->id,
                'code_settlement_type_id' => $codeSettlementType->id,
                'code_municipality_id' => $codeMunicipality->id,
                'id_settlement_id' => $idSettlement->id,
                'type_zone_id' => $typeZone->id,
                'code_city_id' => $codeCity ?? null,
             ]);

         //   $cityInformation->save();

        }


    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 2;
    }

}
