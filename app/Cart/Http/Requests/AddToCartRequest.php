<?php namespace ThreeAccents\Cart\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class AddToCartRequest extends Request
{
    public function rules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }
}