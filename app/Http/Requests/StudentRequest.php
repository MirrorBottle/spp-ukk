<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'nisn' => [
                'required', 'max:14', Rule::unique((new Student)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'nis' => [
                'required', 'max:8', Rule::unique((new Student)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'birthdate' => [ 'required'],
            'gender' => [ 'required'],
            'address' => [ 'required'],
            'fee_id' => [ 'required'],
            'class_id' => [ 'required']
        ];
    }
}
