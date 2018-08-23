<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends BaseModel
{
    use SoftDeletes;
    public $pathdircover = '/images/coves_posts/';

    public $big_title = '';
    public $submint_action = '';
    public $param = ['alias'=>''];
    protected $dates = ['deleted_at'];

    public function addpost($request){

        $this->postdata = strtotime($request->postdata);
        $this->title = $request->title;
        $this->alias = $request->alias;
        $this->meta_key = $request->meta_key;
        $this->meta_description = $request->meta_description;
        $this->content = $request->_content;

        //Добавляем обложку
        $file = $request->file('cover');
        $cover = $this->uploadfile($this->pathdircover, $file);
        if ($cover)
        {
            //Проверем есть ли старый файл и удаляем его
            $filename = $this->cover;
            if($filename)
            {
                $filename = public_path($this->pathdircover).$filename;
                $this->deletefile($filename);
            }
            //Сохраняем полученый файл
            $this->cover = $cover;
        }
        $susses = $this->save();
        return $susses;
    }

    public function show_addpost()
    {
        $this->big_title = 'Добавить пост';
        $this->submint_action = 'admin_add_post';
        $this->param = 0;
    }
    public function show_editpost ($input)
    {
        $this->big_title = 'Редактировать пост';
        $this->submint_action = 'admin_edit_post';
        $this->param = ['alias'=>$input];
    }
}
