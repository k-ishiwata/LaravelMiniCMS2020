<?php
/**
 * 半角英数字-(ハイフン)・_(ダッシュ)のバリデーション
 */
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaNumDash implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (preg_match("/^[a-z0-9_-]+$/i", $value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attributeは、半角英数字か-(ハイフン)・_(ダッシュ)を入力してください。';
    }
}
