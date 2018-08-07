<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Requests\UploadProductRequest;
use App\Settings;
use App\Slidergallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Product;

class AdminProductController extends Controller
{
    public function show_addproduct()
    {
        $big_title = 'Добавить продукт';
        $submint_action = 'admin_add_product';
        $param = 0;
        $product = new Product;

        return view('Admin.Products.addproduct',['big_title' => $big_title,
                                                    'submint_action' => $submint_action,
                                                    'param'=>$param,
            'product'=>$product]);
    }

    public function addproduct(UploadProductRequest $request)
    {
        //dd($request);

        $product = new Product;
        $susses = $product->addproduct($request,$product);


        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return redirect()->back();
        }else
        {
            Session::flash('message', "Данные не добавлены");
            return redirect()->back();
        }



    }
    public function show_products (Request $request)
    {
        $data = new Product;
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

        $pgn = Settings::all()->first()->paginatoin_admin_product;
        $data = $data->paginate($pgn)->appends($query);

        return view('Admin.Products.showproducts',['data' => $data]);

    }



    public function show_editproduct (Request $request)
    {

        $big_title = 'Редактировать продукт';
        $submint_action = 'admin_edit_product';

        $input = $request->route()->parameter('alias');
        $param = ['alias'=>$input];
        $product = Product::where('alias', $input)->firstOrFail();

        $view = view('Admin.Products.addproduct',['big_title' => $big_title,
            'submint_action' => $submint_action,
            'param' => $param,
            'product' => $product]);

        return $view;

    }
    public function editproduct (Request $request)
    {
        $input = $request->route()->parameter('alias');
        $product = Product::where('alias', $input)->firstOrfail();
        $susses = $product->addproduct($request,$product);
        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return Redirect::route('admin_edit_product_show', ['alias' => $product->alias]);
        }else
        {
            Session::flash('message', "Данные не добавлены");
            return Redirect::route('admin_edit_product_show', ['alias' => $product->alias]);
        }
    }


    public  function deleteproduct (Request $request)

    {
        $input = $request->route()->parameter('alias');
        $product = Product::all()->where('alias', $input)->first();
        $susses = $product->delete();

        if($susses){
            Session::flash('success', "Данные успешно удалены");
            return redirect()->back();
        }else
        {
            Session::flash('message', "Данные не удалены");
            return redirect()->back();
        }
    }


    public function  img (Request $request)
    {
        if ($request->ajax()) {

            if ($request->action === 'delImage') {
                try {
                    $gall = Gallery::all()->where('id', $request->galleryId)->first();

                    if($gall) {
                        /*$filename = public_path('images/gallery_products/');

                        $this->deletefile($filename);*/
                        if ($gall->delete()) {
                            $response = [
                                'error' => 0
                            ];
                        } else {
                            $response = [
                                'error' => 1,
                                'html' => '<div class="alert alert-danger gall-error">Ошибка</div>'
                            ];
                        }
                    }else {
                        $response = [
                            'error' => 1,
                            'html' => '<div class="alert alert-danger gall-error">Ошибка</div>'
                        ];
                    }


                } catch(\Exception $e){
                    $response = [
                    'error' => 1,
                    'html' => '<div class="alert alert-danger gall-error">Ошибка</div>',
                    'data' => var_dump($e->getMessage())
                ];
                }
                return json_encode($response);


            }
        }
    }
}
