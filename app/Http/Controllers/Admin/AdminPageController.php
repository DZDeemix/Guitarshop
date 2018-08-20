<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\PageRequest;
use App\Page;

use App\Slidergallery;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPageController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->route('id');
        $page = Page::firstOrCreate(['id' => $id]);
        $page->setPageId($id);
        return view('Admin.pages', ['page' => $page,]);
    }

    public function change(PageRequest $request)
    {
        $id = $request->route('id');
        $page = new Page();

        $page = $page->updateOrCreate(['id' => $id], $request->all());

        if($request->file('cover1')){
            $page->addcover($page, $request, $id);
        }

        if($page){
            Session::flash('success', "Данные успешно добавлены");
            return redirect()->back();
        }else
        {
            Session::flash('message', "Данные не добавлены");
            return redirect()->back();
        }
    }

}
