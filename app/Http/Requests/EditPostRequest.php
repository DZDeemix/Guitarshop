<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
            'title'=> 'required|string|max:255|',
            'alias'=> 'required|string|max:255|',
            'meta_key' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,bmp,png|max:2000',
            '_content' => 'required',

        ];


        /*foreach($this->covers as $k => $index) {
            $rules['covers.' . $k] = 'image|mimes:jpeg,bmp,png|max:2000';
        }*/

        //return $rules;
        return $rules;
    }
    public function messages()
    {
        // Здесь кастомные сообщения для каждого типа ошибки и поля
        return [
            'string'   => 'Введите строку',
            'unique'   => 'Данное имя уже используется',
            'numeric'   => 'Введите число',
            'required'   => 'Поле обязательно',
            'gallery.*.max'   => ' :attribute Файл должен быть размером не более 2Mb',
            'gallery.*.mimes'   => ':attribute Не поддерживаемый формат',
            'cover.max'   => 'Файл.*. должен быть размером не более 2Mb',
            'cover.mimes'   => 'Не поддерживаемый формат',
        ];
    }
}
