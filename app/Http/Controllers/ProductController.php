<?php

namespace App\Http\Controllers;

use App\Product;
use App\Settings;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public  function show_product(Request $request)
   {

       $input = $request->route()->parameter('alias');
       $product = Product::where('alias', $input)->firstOrFail();





       if($product)
       {
           return view('Guitarshop.product',['product' => $product]);
       }else {

           abort('404');
       }
   }

    public  function products()
    {
        $data = new Product();
        $data = $data->orderBy('created_at', 'DESC');
        $pgn = Settings::all()->first()->paginatoin_site_product;
        $data = $data->paginate($pgn);
        return view('Guitarshop.products',['data' => $data]);
    }
}
