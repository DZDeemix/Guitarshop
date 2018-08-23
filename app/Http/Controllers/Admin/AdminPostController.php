<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditPostRequest;
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
        $post = new Post;
        $post->show_addpost();
        return view('Admin.Posts.addpost',['post' => $post]);
    }


    public function addpost(UploadPostRequest $request)
    {
        $post = new Post;
        $susses = $post->addpost($request);

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
        $data = $data->withTrashed()->orderBy('created_at', 'DESC');

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
        $input = $request->route()->parameter('alias');
        $post = Post::where('alias', $input)->firstOrFail();
        $post->show_editpost($input);
        return view('Admin.Posts.addpost',['post' => $post]);

    }
    public function editpost (EditPostRequest $request)
    {
        $input = $request->route()->parameter('alias');
        $post = Post::where('alias', $input)->first();

        $susses = $post->addpost($request);
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
    public  function restorepost (Request $request)
    {
        $input = $request->route()->parameter('alias');
        $susses = Post::withTrashed()->where('alias', $input)->first()->restore();

        if($susses){
            Session::flash('success', "Данные успешно удалены");
            return redirect()->back();
        }else{
            Session::flash('message', "Данные не удалены");
            return redirect()->back();
        }
    }
}

