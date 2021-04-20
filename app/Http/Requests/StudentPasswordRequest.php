<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentPasswordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_password' => 'required|min:4',
            'password_confirm' => 'required|same:new_password',
            'password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::guard('students')->user()->password)) {
                    return $fail(__('The current password is incorrect'));
                }
            }],
        ];
    }
}
