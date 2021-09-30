<?php

namespace App\Http\Requests;

use App\GameCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreGameCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('game_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
