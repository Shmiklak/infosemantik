<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable = ['value', 'attribute_id'];

    public function attribute() {
        return $this->hasOne(Attribute::class,'id', 'attribute_id');
    }

    public function toggleFilter($value) {
        if ($value == "false") {
            $this->show_in_filter = 0;
            $this->save();
        } else {
            $this->show_in_filter = 1;
            $this->save();
        }
    }
}
