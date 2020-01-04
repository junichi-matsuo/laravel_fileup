<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
        return [
          'title' => 'required',
          'file' => 'required|image',
        ];
    }

    public function messages() {
    return [
        'title.required' => 'タイトルが入力されていません',
        'file.required' => '画像を選択してください',
        'file.image' => '画像ファイルを選択してください',
    ];
}
}
