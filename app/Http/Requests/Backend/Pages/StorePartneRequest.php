<?php

namespace App\Http\Requests\Backend\Pages;

use Illuminate\Foundation\Http\FormRequest;

class StorePartneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-page');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['string', 'nullable'],
            'heading' => ['string', 'nullable'],
            'status' => ['boolean', 'nullable'],
            'images' => ['array', 'nullable'],
            'localization' => ['array', 'nullable'],
        ];
        
    }
}
