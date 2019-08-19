<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['price_list', 'facebook', 'instagram', 'telegram', 'bot', 'email', 'address', 'phone_1', 'phone_2', 'phone_3', 'logo', 'site_name', 'description', 'keywords'];
}
