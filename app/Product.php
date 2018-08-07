<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends BaseModel
{

    public $table = 'products';
    public $pathdir = '/images/gallery_products';
    public $pathdircover = 'images/cover_products';
    protected $appends = [
        'created_utc',
        'updated_utc',
    ];


    public function gallery()
    {
        return $this->hasMany('App\Gallery','product_id');
    }

    public function  addproduct($request,$product)
    {
        $product->title = $request->title;
        $product->alias = $request->alias;
        $product->meta_key = $request->meta_key;
        $product->meta_description = $request->meta_description;
        $product->content = $request->_content;
        $product->price = $request->price;
        $product->available = boolval($request->available);
        $product->onMain = boolval($request->onMain);
        //Добавляем обложку
        $file = $request->file('cover');
        $cover = $this->uploadfile($this->pathdircover, $file);
        if ($cover)
        {
            //проверем есть ли старый файл и удаляем его
            $filename = $product->cover;
            if($filename)
            {
                $filename = public_path($this->pathdircover).$filename;
                $this->deletefile($filename);
            }
            //сохраняем полученый файл
            $product->cover = $cover;
        }
        $response = $product->save();
        if(isset( $request->gallery))
        {
            /*//проверем есть ли старые файлы и удаляем их
            $id = $product->id;
            $gallery = Product::find($id)->gallery;
            if($gallery)
            {
                foreach ($gallery as $item) {
                    $filename = public_path($this->pathdir).$item->src_path;
                    $this->deletefile($filename);
                    $item->delete();
                }

            }*/
            //сохраняем полученый файлы

            $this->uploadfiles($request->gallery, $this->pathdir, 'App\Gallery', $product->id);
        }
        return $response;
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
