<?php namespace ThreeAccents\Orders\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class AddOrderRequest extends Request
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