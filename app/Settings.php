<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['paginatoin_admin','paginatoin_site','paginatoin_site_onMain','email','paginatoin_admin_product','paginatoin_site_product','email_send1','paginatoin_site_onMain_products'];

}
