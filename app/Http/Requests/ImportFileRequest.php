<?php

namespace App\Http\Requests;

use App\Rules\MaxUploadSizeFileRule;
use Illuminate\Foundation\Http\FormRequest;

class ImportFileRequest extends FormRequest
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
            'file' => [
                'required',
                'mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,application/vnd.ms-excel.sheet.binary.macroenabled.12,application/vnd.ms-excel.sheet.macroenabled.12,application/vnd.ms-excel.template.macroenabled.12,text/csv,application/csvm+json,application/vnd.sealed.xls',
                new MaxUploadSizeFileRule((int)ini_get('upload_max_filesize'))
            ],
        ];
    }

    public function messages()
    {
        return [
            'file.required' => __('File field is required'),
            'file.mimetypes' => __('the uploaded file is not in the correct format'),
        ];
    }
}
