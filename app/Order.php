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

    protected $fillable = [
        'content','status','prod_coment', 'product_id', 'guest_id'];


    public function guest()
    {
        return $this->belongsTo('App\Guest','guest_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

}
