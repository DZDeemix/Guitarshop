<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadPostRequest;
use App\Settings;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\CoverGallery;


class AdminPostController extends Controller
{
    public function show_addpost()
    {
        $big_title = 'Добавить пост';
        $submint_action = 'admin_add_post';
        $param = 0;
        $post = new Post;

        return view('Admin.Posts.addpost',['big_title' => $big_title,
                                                    'submint_action' => $submint_action,
                                                     'param'=>$param,
        'post' => $post]);
    }


    public function addpost(UploadPostRequest $request)
    {
        $post = new Post;
        $susses = $post->addpost($post,$request);

        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return redirect()->back();
        }else
            {
                Session::flash('message', "Данные не добавлены");
                return redirect()->back();
            }
    }
    public function show_posts (Request $request)
    {
        $data = new Post;
        $data = $data->orderBy('created_at', 'DESC');
        $query = [];

        if ($request->has('title'))
        {
            $data = $data->where('title', 'like', "%$request->title%");
           $query['title'] = $request->title;
        }
        if ($request->has('alias'))
        {
            $data = $data->where('alias', 'like', "%$request->alias%");
            $query['alias'] = $request->alias;
        }

        $pgn = Settings::all()->first()->paginatoin_admin;
        $data = $data->paginate($pgn)->appends($query);


        return view('Admin.Posts.showposts',['data' => $data]);

    }



    public function show_editpost (Request $request)
    {

        $big_title = 'Редактировать пост';
        $submint_action = 'admin_edit_post';

        $input = $request->route()->parameter('alias');
        $param = ['alias'=>$input];
        $post = Post::where('alias', $input)->firstOrFail();

        $view = view('Admin.Posts.addpost',['big_title' => $big_title,
                                                  'submint_action' => $submint_action,
                                                   'param' => $param,
            'post' => $post])->render();

        return $view;

    }
    public function editpost (Request $request)
    {
        $input = $request->route()->parameter('alias');
        $post = Post::where('alias', $input)->first();

        $susses = $post->addpost($post,$request);
        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return Redirect::route('admin_edit_post_show', ['alias' => $post->alias]);
        }else{
            Session::flash('message', "Данные не добавлены");
            return Redirect::route('admin_edit_post_show', ['alias' => $post->alias]);
        }
    }

    public  function deletepost (Request $request)
    {
        $input = $request->route()->parameter('alias');
        $susses = Post::all()->where('alias', $input)->first()->delete();

        if($susses){
            Session::flash('success', "Данные успешно удалены");
            return redirect()->back();
        }else{
            Session::flash('message', "Данные не удалены");
            return redirect()->back();
        }
    }
}

