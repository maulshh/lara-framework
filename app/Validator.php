<?php

namespace App;

trait Validator
{

    private $errors;

    public static function getRules(array $unique = null)
    {
        if($unique){
            $rules = [];
            foreach ($unique as $key => $rule){
                $rules[$key] = self::$rules[$key] . "," . $rule;
            }
            return array_merge(self::$rules, $rules);
        }
        return self::$rules;
    }

    public function validate($request)
    {
        $v = Validator::make($request, static::rules);

        if ($v->fails()) {
            $this->errors = $v->errors;

            return false;
        }

        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}