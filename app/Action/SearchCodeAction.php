<?php

namespace App\Action;

use App\Models\CityInformation;
use App\Models\Code;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SearchCodeAction
{

    /**
     * @throws ValidationException
     */
    public function execute($zipCode)
    {
        $this->validate($zipCode);
        return Cache::remember('zipCode', 5, function () use($zipCode){
            return Code::with('cityInformation')->where('code', $zipCode)->first();
        });

    }

    /**
     * @throws ValidationException
     */
    private function validate($zipCode): void
    {
        $rules = [
            'zip_code' => [
                'required',
                'numeric',

            ],
        ];

        $validator = Validator::make(['zip_code' => $zipCode], $rules);

        $validator->validate();
    }
}
