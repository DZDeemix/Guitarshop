<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\Settings;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public  function show_post(Request $request)
    {

        $input = $request->route()->parameter('alias');
        $data = Post::where('alias', $input)->firstOrFail();


        if($data)
        {
            return view('Guitarshop.post',['data' => $data]);
        }

        abort('404');

    }

    public  function get_post ()
    {
        $id = 3;
        $page = Page::firstOrCreate(['id' => $id]);

        $data = new Post();
        $data = $data->orderBy('created_at', 'DESC');
        $data = $data->where('postdata', '<', time());
        $pgn = Settings::all()->first()->paginatoin_site;
        $data = $data->paginate($pgn);
        return view('Guitarshop.posts',['data' => $data, 'page' => $page,]);
    }

}
