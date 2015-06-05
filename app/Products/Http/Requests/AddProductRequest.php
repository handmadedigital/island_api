<?php namespace ThreeAccents\Products\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class AddProductRequest extends Request
{
    public function rules(){
        return [];
    }

    public function authorize(){
        return true;
    }
}