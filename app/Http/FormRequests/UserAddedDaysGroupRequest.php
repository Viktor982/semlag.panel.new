<?php

namespace NPDashboard\Http\FormRequests;

use NPCore\Http\FormRequest\AbstractFormRequest;

class UserAddedDaysGroupRequest extends AbstractFormRequest
{
    public function rules()
    {
        $rules = [
            'days' => 'nullable',
            'days_premium' => 'nullable',
            'reason' => 'required_with:days,days_premium'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'reason.required_with' => "Você não especificou o motivo de dar os dias."
        ];
    }
}