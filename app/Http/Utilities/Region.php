<?php
namespace App\Http\Utilities;

class Region
{
    use DataRegion;

    public static function countries()
    {
        return static::$countries;
    }

    public static function json_countries()
    {
        return json_encode(
            array_map(function ($key, $value) {
                return ['label' => $key, 'value' => $value];
            }, static::$countries));
    }

    public static function provinces()
    {
        $p = [];
        foreach (static::$provinces as $array) {
            $p[$array['label']] = $array['value'];
        }

        return $p;
    }

    public static function json_provinces()
    {
        return json_encode(static::$provinces);
    }

    public static function cities($p_id = 0)
    {
        $r = [];
        foreach (static::$cities as $array) {
            if ($array['p_id'] == $p_id)
                $r[$array['label']] = $array['value'];
        }

        return $r;
    }

    public static function json_cities($p_id = 0)
    {
        $r = [];
        foreach (static::$cities as $array) {
            if ($array['p_id'] == $p_id)
                $r[] = $array;
        }

        return json_encode($r);
    }

    public static function districts($k_id = 0)
    {
        $r = [];
        foreach (static::$districts as $array) {
            if ($array['k_id'] == $k_id)
                $r[$array['label']] = $array['value'];
        }

        return $r;
    }

    public static function json_districts($k_id = 0)
    {
        $r = [];
        foreach (static::$districts as $array) {
            if ($array['k_id'] == $k_id)
                $r[] = $array;
        }

        return json_encode($r);
    }

    public static function district($district_id)
    {
        $key = array_search($district_id, array_column(static::$districts, 'value'), true);
        if ($key !== false)
            return static::$districts[$key]['label'];

        return false;
    }

    public static function city($city_id)
    {
        $key = array_search($city_id, array_column(static::$cities, 'value'), true);
        if ($key !== false)
            return static::$cities[$key]['label'];

        return false;
    }

    public static function province($province_id)
    {
        $key = array_search($province_id, array_column(static::$provinces, 'value'), true);
        if ($key !== false)
            return static::$provinces[$key]['label'];

        return false;
    }

    public static function country($country_id)
    {
        $key = array_search($country_id, static::$countries, true);

        return $key !== null ? $key : false;
    }
}