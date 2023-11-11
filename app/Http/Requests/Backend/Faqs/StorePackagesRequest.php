<?php

namespace App\Http\Requests\Backend\Faqs;

use Illuminate\Foundation\Http\FormRequest;

class StorePackagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-faq');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:191'],
           
        ];
    }

    /**
     * Show the Messages for rules above.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Package name field is required.',
           
        ];
    }
}
