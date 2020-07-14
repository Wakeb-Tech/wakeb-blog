<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

     public function getIconPathAttribute()
    {
        return asset('uploads/sittings/' . $this->icon);

    }//end of get image path

     public function getLogoPathAttribute()
    {
        return asset('uploads/sittings/' . $this->logo);

    }//end of get image path
}
