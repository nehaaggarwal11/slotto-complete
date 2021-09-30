<?php

namespace App\Http\Requests;

use App\DynamicPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDynamicPageRequest extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('dynamic_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dynamic_pages,id',
        ];
    }
}
