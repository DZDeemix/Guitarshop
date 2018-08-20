<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends BaseModel
{

    public $table = 'products';
    public $pathdir = '/images/gallery_products/';
    public $pathdircover = '/images/cover_products/';
    public $big_title = '';
    public $submint_action = '';
    public $param = ['alias'=>''];



    public function gallery()
    {
        return $this->hasMany('App\Gallery','product_id');
    }

    public function  addproduct($request)
    {
        $this->title = $request->title;
        $this->alias = $request->alias;
        $this->meta_key = $request->meta_key;
        $this->meta_description = $request->meta_description;
        $this->content = $request->_content;
        $this->price = $request->price;
        $this->available = boolval($request->available);
        $this->onMain = boolval($request->onMain);
        //Добавляем обложку
        $file = $request->file('cover');
        $cover = $this->uploadfile($this->pathdircover, $file);
        if ($cover)
        {
            //проверем есть ли старый файл и удаляем его
            $filename = $this->cover;
            if($filename)
            {
                $filename = public_path($this->pathdircover).$filename;
                $this->deletefile($filename);
            }
            //сохраняем полученый файл
            $this->cover = $cover;
        }
        $response = $this->save();
        if(isset( $request->gallery))
        {

            $this->uploadfiles($request->gallery, $this->pathdir, 'App\Gallery', $this->id);
        }
        return $response;
    }


    public  function show_editproduct($input)
    {
        $this->big_title = 'Редактировать продукт';
        $this->submint_action = 'admin_edit_product';
        $this->param = ['alias' => $input];
    }
    public function show_addproduct()
    {
        $this->big_title = 'Добавить продукт';
        $this->submint_action = 'admin_add_product';
        $this->param = 0;
    }
}
