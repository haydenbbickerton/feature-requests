<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FeatureStoreRequest extends Request
{
    private $featureRules = [
        'title' => 'required|max:250|min:4',
        'description' => 'max:2500',
        'url' =>    'max:250',
        'areas' => 'array'
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
        return $this->featureRules;
    }
}
