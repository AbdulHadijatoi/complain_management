<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Comuna;
use App\Models\Participant;
use App\Models\Population;
use App\Models\Sector;
use App\Models\TypeOfFault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends AppBaseController {
    public function constants()
    {
        $data = [
            'comunas' => Comuna::get(['id','name'])->toArray(),
            'sectors' => Sector::get(['id','name','comuna_id'])->toArray(),
            'populations' => Population::get(['id','name','sector_id'])->toArray(),
            'type_of_faults' => TypeOfFault::get(['id','name'])->toArray()
        ];

        return response()->json(['data' => $data], 200);
    }
    
}
