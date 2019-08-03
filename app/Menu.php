<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'link', 'order'];

    public function toggleStatus($value) {
        if ($value == null) {
            $this->is_pricelist = 0;
            $this->save();
        }
        else {
            $this->is_pricelist = 1;
            $this->save();
        }
    }
}
