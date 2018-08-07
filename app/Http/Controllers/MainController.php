<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\Settings;
use App\Slidergallery;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $pgn = Settings::all()->first()->paginatoin_site_onMain_products;
        $data = Product::where('onMain', true)->orderBy('created_at', 'DESC')->take($pgn)->get();


        $pgn2 = Settings::all()->first()->paginatoin_site_onMain;

        $posts = new Post();
        $posts = $posts->orderBy('created_at', 'DESC')->take($pgn2)->get();

        $slidergallery = Slidergallery::all();
        return view('Guitarshop.main',['data' => $data, 'posts' => $posts, 'slidergallery' => $slidergallery]);
    }

    public function about()
    {
        return view('Guitarshop.about')->render();
    }
}
