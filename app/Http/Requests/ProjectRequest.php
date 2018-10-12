<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Titlecase;
use App\Rules\UserFullName;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
          'project_name' => [
                              'required',
                              Rule::unique('projects')->ignore($this->request->get('project_name'), 'project_name'),
                              new Titlecase
                            ],
          'start_date'      => 'required|date_format:Y-m-d',
          'country_id'      => 'required',
          'price_type_id'   => 'required|exists:price_types,id',
          'project_type_id' => 'required|exists:project_types,id',
          'officer'         => [
                                  'required',
                                  'string',
                                  new UserFullName
                                ],
          'funding_type.*'  => 'required|exists:funding_types,id'
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
    public function messages()
    {
        return [
        'price_type_id.required' => 'The price type is required',
        'project_type_id.required'  => 'The project type is required',
    ];
    }
}
