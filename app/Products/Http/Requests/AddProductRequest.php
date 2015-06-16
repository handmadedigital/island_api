<?php namespace ThreeAccents\Products\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class AddProductRequest extends Request
{
    public function rules(){
        return [
            'name' => 'required',
            'description' => 'required',
            'option_value' => 'required_if:option',
            'width' => 'required',
            'length' => 'required',
            'height' => 'required',
            'cubic_feet' => 'required',
            'weight' => 'required',
            'price' => 'required',
        ];
    }

    public function authorize(){
        return true;
    }
}