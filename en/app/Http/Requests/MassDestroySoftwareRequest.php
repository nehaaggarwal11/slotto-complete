<?php

namespace App\Http\Requests;

use App\Software;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySoftwareRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('software_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:software_providers,id',
        ];
    }
}
