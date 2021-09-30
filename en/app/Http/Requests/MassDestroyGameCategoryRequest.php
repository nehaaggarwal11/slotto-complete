<?php

namespace App\Http\Requests;

use App\GameCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGameCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('game_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }
    
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:game_categories,id',
        ];
    }
}
