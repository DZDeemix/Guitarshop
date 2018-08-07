<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    public $pathdircover = 'images/coves_posts/';
    protected $appends = [
        'created_utc',
        'updated_utc',
    ];


    public function addpost($post,$request){
        $post->title = $request->title;
        $post->alias = $request->alias;
        $post->meta_key = $request->meta_key;
        $post->meta_description = $request->meta_description;
        $post->content = $request->_content;

        //Добавляем обложку
        $file = $request->file('cover');
        $cover = $this->uploadfile($this->pathdircover, $file);
        if ($cover)
        {
            //проверем есть ли старый файл и удаляем его
            $filename = $post->cover;
            if($filename)
            {
                $filename = public_path($this->pathdircover).$filename;
                $this->deletefile($filename);
            }
            //сохраняем полученый файл
            $post->cover = $cover;
        }
        $susses = $post->save();
        return $susses;
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
