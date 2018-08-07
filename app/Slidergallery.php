<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 13.07.2018
 * Time: 15:48
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slidergallery extends BaseModel
{
    protected $table = 'slidergallery';
    static  $pathdir = '/images/main_slider/';
    protected $fillable = ['src_path, number_id'];

    public function create_slidergallery ($files)
    {

        $data = Slidergallery::all();
        if($data)
        {
            $this->delete_gallery($data);
        }


        $this->uploadfiles($files, self::$pathdir, __CLASS__, $id=false );
    }



    public function delete_gallery ($data)
    {
        foreach ($data as $item)
        {
            $filename = public_path(self::$pathdir) . $item->src_path;
            $this->deletefile($filename);
            $item->delete();
        }
    }

    public function addslide($request, $slidergallery)
    {
        $slidergallery->number_id = $request->number_id;

        //Добавляем обложку
        $file = $request->file('cover');
        $cover = $this->uploadfile(self::$pathdir, $file);
        if ($cover)
        {
            //проверем есть ли старый файл и удаляем его
            $filename = $slidergallery->src_path;
            if($filename)
            {
                $filename = public_path($this->pathdircover).$filename;
                $this->deletefile($filename);
            }
            //сохраняем полученый файл
            $slidergallery->src_path = $cover;
        }
        $susses = $slidergallery->save();
        return $susses;
    }
}