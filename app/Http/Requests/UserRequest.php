<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * バリデーション前の処理
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // 更新時パスワードがない場合項目削除
        if ($this->isMethod('put')) {
            if (!$this->password) {
                $this->offsetUnset('password');
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // nameの基本バリデーション
        $name = ['required', 'string', 'max:255'];

        $validate = [
            'name' => array_merge($name, [Rule::unique('users')]),
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ];

        // 更新時にバリデーションを変更
        if ($this->isMethod('put')) {
            $validate = array_merge($validate, [
                'name' => array_merge($name, [Rule::unique('users')->ignore($this->user)]),
                'password' => 'nullable|string',
            ]);
        }

        return $validate;
    }
}
