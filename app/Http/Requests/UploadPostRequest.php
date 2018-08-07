<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPostRequest extends FormRequest
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
            'title'=> 'required|string|max:255|unique:posts',
            'alias'=> 'required|string|max:255|unique:posts',
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
            //'covers.required' => 'Не забудьте приложить файлы',
            // и т.д.

            //'covers.*.size'   => 'Файл.*. должен быть размером не более 2Mb',
            'cover'   => 'Не поддерживаемый формат',
        ];
    }
}
