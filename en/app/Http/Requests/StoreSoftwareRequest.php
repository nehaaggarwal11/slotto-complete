<?php

namespace App\Http\Requests;

use App\Software;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSoftwareRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('software_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [],
            'logo_alt_text' => [],
            'bg_image_alt_text'  => [],
            'bg_image_logo_alt_text'  => [],
            'bg_image_button_text'  => [],
            'bg_image_button_link'  => [],
            'heading'  => [],
            'description'  => [],
        ];
    }
}
