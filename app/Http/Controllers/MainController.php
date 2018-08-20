<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\Product;
use App\Settings;
use App\Slidergallery;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $id = 1;
        $page = Page::firstOrCreate(['id' => $id]);

        $pgn = Settings::all()->first()->paginatoin_site_onMain_products;
        $data = Product::where('onMain', true)->orderBy('created_at', 'DESC')->take($pgn)->get();


        $pgn2 = Settings::all()->first()->paginatoin_site_onMain;

        $posts = new Post();
        $posts = $posts->orderBy('created_at', 'DESC')->take($pgn2)->get();

        $slidergallery = Slidergallery::all();
        return view('Guitarshop.main',['data' => $data, 'posts' => $posts, 'slidergallery' => $slidergallery, 'page' => $page,
            ]);
    }

    public function about()
    {
        $id = 4;
        $page = Page::firstOrCreate(['id' => $id]);
        $page->setPageId($id);

        return view('Guitarshop.about', ['page' => $page,]);
    }
}
