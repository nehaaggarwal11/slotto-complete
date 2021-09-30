<?php

namespace App\Http\Requests;

use App\DynamicPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDynamicPageRequest extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('dynamic_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [],
            'bg_heading' => [],
            'bg_text'   => [],
            'heading'   => [],
            'description'   => [],
        ];
    }
}
