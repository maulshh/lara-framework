<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    protected $fillable = ['name', 'label', 'module', 'type'];
    private $validation = [
        'number' => 'integer',
        'text'   => 'text',
        'string' => 'text',
        'date'   => 'date'
    ];

    public function getValue() {
        switch ($this->type) {
            case 'number':
                return $this->number;
            case 'text':
                return $this->text;
            case 'string':
                return $this->string;
            case 'date':
                return $this->date;
            default :
                return redirect('');
            //redirect to 500 setting type mismatch
        }
    }

    public function setValue($value) {
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
                return redirect('');
            //redirect to 500 setting type mismatch
        }

        return $this->save();
    }

    public function validation_type() {
        return $this->validation[$this->type];
    }
}