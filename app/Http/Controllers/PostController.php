<?php

namespace App\Http\Controllers;

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
        $data = new Post();
        $data = $data->orderBy('created_at', 'DESC');
        $pgn = Settings::all()->first()->paginatoin_site;
        $data = $data->paginate($pgn);
        return view('Guitarshop.posts',['data' => $data]);
    }

}
