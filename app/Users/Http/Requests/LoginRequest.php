<?php namespace ThreeAccents\Users\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}