<?php

namespace App\Http\Requests\Backend\Faqs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-contact');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      
        return [
            'address' => ['required', 'string'],
            // 'PhoneNumber' => ['required', 'string'],
            'email' => ['required', 'string'],
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
            'address.required' => 'Address field is required.',
            // 'PhoneNumber.required' => 'Phone Number field is required.',
            'email.required' => 'Email field is required.', // Corrected the field name
        ];
    }
}
