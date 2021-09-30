@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.comment.fields.name') }}</th>
                        <th>{{ trans('cruds.comment.fields.email') }}</th>
                        <th>{{ trans('cruds.comment.fields.comments') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $comments->id }}</td>
                        <td>
                            {{ $comments->news->name ?? '' }}
                        </td>
                        <td>
                            {{ $comments->email }}
                        </td>
                        <td>
                            {{ $comments->comment ?? '' }}
                        </td>                        
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
     

@endsection