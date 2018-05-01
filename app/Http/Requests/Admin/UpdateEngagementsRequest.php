<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEngagementsRequest extends FormRequest
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
            
            'stats_date' => 'nullable|date_format:'.config('app.date_format'),
            'fans' => 'max:2147483647|nullable|numeric',
            'engagements' => 'max:2147483647|nullable|numeric',
            'reactions' => 'max:2147483647|nullable|numeric',
            'comments' => 'max:2147483647|nullable|numeric',
            'shares' => 'max:2147483647|nullable|numeric',
        ];
    }
}
