<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class dataWorkRequest extends FormRequest
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
            'job' => ['required','string'],
            'company' => ['required', 'string'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'start_at' => ['required', 'string'],
            'end_at' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'job.required'=>'عنوان شغل مشخص نشده',
            'company.required'=>'نام سازمان مشخص نشده',
            'country.required'=>'کشور محل کار مشخص نشده',
            'city.required'=>'شهر محل کار مشخص نشده',
            'start_at.required'=>'تاریخ شروع به کار مشخص نشده',
            'end_at.required'=>'تاریخ اتمام کار مشخص نشده'
        ];
    }
}
