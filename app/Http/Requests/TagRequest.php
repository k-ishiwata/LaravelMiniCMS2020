<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaNumDash;

class TagRequest extends FormRequest
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
            'name' => 'required|max:50',
            'slug' => ['required', 'max:50', new AlphaNumDash]
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'タグ名',
            'slug' => 'スラッグ'
        ];
    }
}
