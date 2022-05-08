<?php

namespace App\Http\Controllers;

use App\Action\SearchCodeAction;
use App\Http\Resources\CityInformationResource;
use App\Imports\ImportData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CodeController extends Controller
{
    public function __construct(private readonly SearchCodeAction $searchCodeAction)
    {
    }
    public function import(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
               'file' => 'required|mimes:xls,xlsx,csv'
           ]);

        if ($request->has('file')){
            Excel::import(new ImportData(), $request->file('file'));
        }

        return response()->json([
                'success' => true,
                'data' => 'Data importada con exito',
                'code' => 200,
            ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function search($zip_code)
    {

        return response()->json(CityInformationResource::make($this->searchCodeAction->execute($zip_code)));
    }
}
