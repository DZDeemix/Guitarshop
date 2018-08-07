<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends BaseModel
{
    protected $appends = [
        'created_utc',
        'updated_utc',
    ];
    public function order()
    {
        return $this->hasMany('App\Order','guest_id');
    }
    public function getCreatedUtcAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->getOriginal('created_at'))->timezone($this->timeZone)->format('d-m-y H:i:s');
    }

    public function getUpdatedUtcAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->getOriginal('updated_at'))->timezone($this->timeZone)->format('d-m-y H:i:s');
    }
}
