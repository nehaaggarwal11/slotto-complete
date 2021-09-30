@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.softwareProvider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.software-providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.softwareProvider.fields.id') }}
                        </th>
                        <td>
                            {{ $softwareProvider->id }}
                        </td>
                    </tr>                    

                    <tr>
                        <th>
                            {{ trans('cruds.softwareProvider.fields.title') }}
                        </th>
                        <td>
                            {{ $softwareProvider->title }}
                        </td>
                    </tr>                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.software-providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
