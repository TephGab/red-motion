<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CounterRequest extends FormRequest
{
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
        return [
            'acs'=>'required|min:9',
            'acs' => 'starts_with:Review,Session,3,4,(',
            'acs' => 'ends_with:Session,Session?,restart,completed,)'
        ];
    }

     /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'acs.required'=>'Field is empty!',
            'acs.min'=>'access code to short!',
            'acs.starts_with' => 'Error! Verify your access codes, Please copy the phrase. (we suggest to use Ctrl+A then copy paste)',
            'acs.ends_with' => 'Error! Verify your access codes, Please copy the phrase. (we suggest to use Ctrl+A then copy paste)'
        ];
    }


    
}
