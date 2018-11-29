<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyRulesRequest extends FormRequest
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
        $request = $this->request->all();
        return [
            'technology_type_id' => ['required', Rule::unique('technology_rules')->where(function ($query) use ($request) {
                $query->where('distribution_target_id', $request['distribution_target_id']);
            })],
            'distribution_target_id' => 'required',
            'multiplier' => 'required|integer'
        ];
    }
}
