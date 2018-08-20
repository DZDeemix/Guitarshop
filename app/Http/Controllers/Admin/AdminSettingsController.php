<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\SettingsRequest;
use App\Http\Requests\SliderRequest;
use App\Settings;
use App\Slidergallery;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSettingsController extends Controller
{
    public function show()
    {
        $slidergallery = new Slidergallery;
        $slidergallery = $slidergallery->orderBy('number_id', 'ASC');
        $slidergallery = $slidergallery->get();
        /*$slidergallery = Slidergallery::all()->orderBy('number_id', 'DESC');*/
        $setting = Settings::firstOrCreate(['id' => 0]);

        return view('Admin.settings', ['slidergallery' => $slidergallery, 'setting' => $setting, 'pathdir' => Slidergallery::$pathdir]);
    }

    public function change(SettingsRequest $request)
    {

        if($request->on_main_gallery)
        {
            $slidergallery = new Slidergallery();
            $slidergallery->create_slidergallery($request->on_main_gallery);
        }

        $setting = new Settings();
        $setting->updateOrCreate(['id' => 0], $request->all());
        return redirect()->back();
    }
    public function showslider()
    {
        $big_title = 'Добавить слайдер';
        $submint_action = 'admin_settings_add';
        $param = 0;
        $slidergallery = new Slidergallery;

        return view('Admin.add_slider_cover', [   'big_title' => $big_title,
                                                        'submint_action' => $submint_action,
                                                        'param'=>$param,
                                                        'slidergallery' => $slidergallery,
                                                        'pathdir' => Slidergallery::$pathdir]);
    }
    public function deleteslider(Request $request)
    {
        $input = $request->route()->parameter('id');
        $susses = Slidergallery::all()->where('id', $input)->first()->delete();
        if($susses){
            Session::flash('success', "Данные успешно удалены");
            return redirect()->back();
        }else{
            Session::flash('message', "Данные не удалены");
            return redirect()->back();
        }
    }
    public function editslider(Request $request)
    {
        $input = $request->route()->parameter('id');
        $slidergallery = Slidergallery::where('id', $input)->first();
        $susses = $slidergallery->addslide($request,$slidergallery);
        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return redirect()->back();
        }else
        {
            Session::flash('message', "Данные не добавлены");
            return redirect()->back();
        }
    }
    public function editslidershow(Request $request)
    {
        $big_title = 'Редактировать слайдер';
        $submint_action = 'admin_settings_edit';

        $input = $request->route()->parameter('id');
        $param = ['id'=>$input];
        $slidergallery = Slidergallery::where('id', $input)->firstOrFail();

        return view('Admin.add_slider_cover',['big_title' => $big_title,
                                                'submint_action' => $submint_action,
                                                'param' => $param,
                                                'slidergallery' => $slidergallery,
                                                'pathdir' => Slidergallery::$pathdir]);

    }
    public function addslider(SliderRequest $request)
    {

        $slidergallery = new Slidergallery;
        $susses = $slidergallery->addslide($request,$slidergallery);

        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return redirect()->back();
        }else
        {
            Session::flash('message', "Данные не добавлены");
            return redirect()->back();
        }
    }
}
