<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrepareScheduleRequest extends Request {

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
            'vehicle_id' => 'required',
            'maint_type_id' => 'required',
            'interval_distance' => 'required',
            'interval_months' => 'required'
        ];
    }

}
