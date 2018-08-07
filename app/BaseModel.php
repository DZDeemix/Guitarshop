<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public  $timeZone = "Europe/Moscow";

    public  function deletefile ($filename)
    {
        if (file_exists($filename))
        {
            unlink($filename);
        }
    }

    public function uploadfiles ($items, $pathdir, $class, $product_id)
    {
        if ($items)
        {

            foreach ($items as $item) {

                $src_path = time() . '_' . $item->getClientOriginalName();
                $item->move(public_path($pathdir), $src_path);


                if ($product_id === false) {
                    $cl_obj = new $class;

                    $cl_obj->src_path = $src_path;

                } else {
                    $cl_obj = new $class;
                    $cl_obj->product_id = $product_id;
                    $cl_obj->src_path = $src_path;
                };
                $cl_obj->save();
            }
        }
    }

    public function uploadfile ($pathdir, $file)
    {

        if($file)
        {
            $src_path = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($pathdir), $src_path);
            return $src_path;
        }

    }
}
