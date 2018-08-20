<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            's'=> 'required|string|max:255',


        ];

        return $rules;
    }
    public function messages()
    {
        // Здесь кастомные сообщения для каждого типа ошибки и поля
        return [
            'string'   => 'Введите строку',
            'unique'   => 'Данное имя уже используется',
            'numeric'   => 'Введите число',
            'required'   => 'заполните поле для поиска',
            'gallery.*.max'   => ' :attribute Файл должен быть размером не более 2Mb',
            'gallery.*.mimes'   => ':attribute Не поддерживаемый формат',
            'cover.max'   => 'Файл.*. должен быть размером не более 2Mb',
            'cover.mimes'   => 'Не поддерживаемый формат',
        ];
    }
    public function attributes()
    {
        // Здесь кастомные сообщения для каждого типа ошибки и поля
        return [
            'gallery.0' => 'Файл №1',
            'gallery.1' => 'Файл №2',
            'gallery.2' => 'Файл №3',
            'gallery.3' => 'Файл №4',
            'gallery.4' => 'Файл №5',
            'gallery.5' => 'Файл №6',
            'gallery.6' => 'Файл №7',
            'gallery.7' => 'Файл №8',
            'gallery.8' => 'Файл №9',
            'gallery.9' => 'Файл №10',
            'gallery.10' => 'Файл №11',
            'gallery.11' => 'Файл №12',
            'gallery.12' => 'Файл №13',
            'gallery.13' => 'Файл №14',
            'gallery.14' => 'Файл №15',
        ];
    }
}
