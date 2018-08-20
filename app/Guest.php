<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends BaseModel
{

    protected $fillable = [
        'name','email','address', 'phone_number'];

    public function order()
    {
        return $this->hasMany('App\Order','guest_id');
    }

}
