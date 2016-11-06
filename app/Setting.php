<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    use Validator;

    protected static $rules = [
        'name'   => 'required|max:40',
        'label'  => 'required|max:40',
        'type'   => 'required|max:40',
        'module' => 'required|max:20',
    ];
    protected $fillable = ['name', 'label', 'module', 'type', 'placeholder', 'boot'];

    private $validation = [
        'number' => 'integer',
        'text'   => 'text',
        'string' => 'text',
        'date'   => 'date'
    ];

    protected $appends = ['value'];

    protected $hidden = ['number', 'text', 'string', 'date'];

    public function getValueAttribute()
    {
        switch ($this->type) {
            case 'number':
                return $this->number;
            case 'text':
                return $this->text;
            case 'string':
                return $this->string;
            case 'date':
                return $this->date;
            default:
                return false;
        }
    }

    public function setValue($value)
    {
        switch ($this->type) {
            case 'number':
                $this->number = $value;
                break;
            case 'text':
                $this->text = $value;
                break;
            case 'string':
                $this->string = $value;
                break;
            case 'date':
                $this->date = $value;
                break;
            default :
                return false;
        }

        return $this->save();
    }

    public function validationType()
    {
        return $this->validation[$this->type];
    }
}