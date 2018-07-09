<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'lastname' => 'max:255|required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'brithdate' => 'required|date_format:'.config('app.date_format'),
            'address' => 'max:255|required',
            'phone' => 'max:2147483647|required|numeric',
            'role_id' => 'required',
        ];
    }
}
