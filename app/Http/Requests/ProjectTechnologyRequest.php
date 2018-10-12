<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectTechnologyRequest extends FormRequest
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
          'project_id'          => 'required|exists:projects,id',
          'technology_id'       => 'required|exists:technologies,id',
          'distribution_target_id' => 'required|exists:distribution_targets,id',
          'distribution_unit'   => 'required|integer',
          'per_unit'            => 'required|integer',
          'total_reach'         => 'required|integer',
          'year'                => 'required|integer'
        ];
    }
}
