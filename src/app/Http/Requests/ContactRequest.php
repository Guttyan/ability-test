<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email' =>['required','email'],
            'tel_first' =>['required','digits_between:0,5','numeric'],
            'tel_second' =>['required','digits_between:0,5','numeric'],
            'tel_third' =>['required','digits_between:0,5','numeric'],
            'address' => 'required',
            // 'category_id' => 'required',
            'detail' => ['required', 'max:120']
        ];
    }

    public function messages(){
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'tel_first.required' => '電話番号を入力してください',
            'tel_second.required' => '電話番号を入力してください',
            'tel_third.required' => '電話番号を入力してください',
            'tel_first.digits_between' => '電話番号は５桁までの数字で入力してください',
            'tel_second.digits_between' => '電話番号は５桁までの数字で入力してください',
            'tel_third.digits_between' => '電話番号は５桁までの数字で入力してください',
            'tel_first.numeric' => '電話番号は５桁までの数字で入力してください',
            'tel_second.numeric' => '電話番号は５桁までの数字で入力してください',
            'tel_third.numeric' => '電話番号は５桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            // 'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は１２０文字以内で入力してください'
        ];
    }
}
