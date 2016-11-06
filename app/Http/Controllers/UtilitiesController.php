<?php

namespace App\Http\Controllers;

use App\Http\Utilities\Region;
use Illuminate\Http\Request;

use App\Http\Requests;

class UtilitiesController extends Controller
{

    public function getCities($p_id)
    {
        return Region::json_cities($p_id);
    }

    public function getDistricts($k_id)
    {
        return Region::json_districts($k_id);
    }
}
