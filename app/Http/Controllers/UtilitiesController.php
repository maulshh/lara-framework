<?php

namespace App\Http\Controllers;

use App\Http\Utilities\Region;
use Illuminate\Http\Request;

class UtilitiesController extends Controller
{

    public function getProvinces()
    {
        $content = Region::json_provinces();

        return response($content)
            ->header('Content-Type', 'application/json');
    }

    public function getCities($p_id)
    {
        $content = Region::json_cities($p_id);

        return response($content)
            ->header('Content-Type', 'application/json');
    }

    public function getDistricts($k_id)
    {
        $content = Region::json_districts($k_id);

        return response($content)
            ->header('Content-Type', 'application/json');
    }

}
