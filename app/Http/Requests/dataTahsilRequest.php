<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class dataTahsilRequest extends FormRequest
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
            'maqta' => ['required'],
            'reshte' => ['required', 'string', 'max:50'],
            'daneshgah' => ['required', 'string', 'max:50'],
            'start_year' => ['required', 'string'],
            'end_year' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'maqta.required'=>'مقطع تحصیلی انتخاب نشده',
            'reshte.required'=>'رشته تحصیلی مشخص نشده',
            'daneshgah.required'=>'دانشگاه محل تحصیل مشخص نشده',
            'start_year.required'=>'سال شروع تحصیل مشخص نشده',
            'end_year.required'=>'سال اتمام تحصیل مشخص نشده'
        ];
    }
}
