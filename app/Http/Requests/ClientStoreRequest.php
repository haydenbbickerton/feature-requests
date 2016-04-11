<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientStoreRequest extends Request
{
    private $clientRules = [
        'name' => 'required|alpha_num|max:50|min:3|unique:clients,name'
    ];

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
        return $this->clientRules;
    }
}
