<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    protected $status = [
        'Новый',
        'В обработке',
        'Завершен',
        'Отказ',
        'Возврат'
    ];
    protected $appends = [
        'created_utc',
        'updated_utc',
    ];
    public function guest()
    {
        return $this->belongsTo('App\Guest','guest_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
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
