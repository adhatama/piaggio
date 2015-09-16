<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/17/2015
 * Time: 12:08 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'vespa' => 'required'
        ];
    }
}