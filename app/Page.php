<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 13.07.2018
 * Time: 15:48
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends BaseModel
{
    public $page_name = [   1 => 'Главная',
                            2 => 'Страница товаров',
                            3 => 'Страница постов',
                            4 => 'Страница о нас',
                            5 => 'Страница поиска'];
    public $page_id = 0;
    protected $table = 'pages';
    static $pathdir = '/images/pages/';
    protected $fillable = ['title', 'meta_key', 'meta_description', 'h1', 'h2', 'h3', 'content1', 'content2', 'content3'];
    protected $guarded = ['cover1', 'cover2', ];


    public function addcover ($obj,$request, $id){
        //Добавляем обложку
        $file = $request->file('cover1');
        $cover1 = $this->uploadfile(self::$pathdir, $file);
        if ($cover1) {
            //Проверем есть ли старый файл и удаляем его
            $filename = $obj->cover1;
            if ($filename) {
                $filename = public_path(self::$pathdir) . $filename;
                $this->deletefile($filename);
            }
            //Сохраняем полученый файл
            $obj->cover1 = $cover1;
        }
       $susses = $obj->save();
        return $susses;
    }

    public function setPageId($id){
        $this->page_id = $id;
    }

    public function getPageName(){
        return $this->page_name[$this->page_id];
    }

    public static function getPathdir(): string
    {
        return self::$pathdir;
    }
}