<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Post;
use App\Product;
use App\Settings;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public  function search (SearchRequest $request)
    {
        $query = $request->input('s');

            if($query) {
                $product = new Product;
                $product = $product->orderBy('created_at', 'DESC')->where('title', 'like', "%$query%")->get();

                $post = new Post;
                $post = $post->orderBy('created_at', 'DESC')->where('title', 'like', "%$query%")->get();

                return view('Guitarshop.search',[   'product' => $product,
                                                            'post' => $post]);
            }
            die;
        }



}
