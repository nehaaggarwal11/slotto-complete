@extends('layouts.admin')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.comment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Casino">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.comment.fields.id') }}</th>
                        <th width="400">{{ trans('cruds.comment.fields.news') }}</th>
                        <th width="400">{{ trans('cruds.comment.fields.comment') }}</th>
                        <th>{{ trans('cruds.comment.fields.status') }}</th>
                        <th>{{ trans('cruds.comment.fields.active') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $key => $comment)
                        <tr data-entry-id="{{ $comment->id }}">
                            <td></td>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->news->name ?? '' }}</td>
                            <td>{{ $comment->comment ?? '' }}</td>
                            <td>{{ $comment->status == 'active' ? 'Active' : 'Inactive' }}</td>
                            <td>
                                @can('comment_edit')
                                    <div class="switches">
                                        <input type="checkbox" id="{{$comment->id}}" class="status" data-id="{{$comment->id}}" {{ $comment->status == 'active' ? 'checked' : '' }}>
                                        <label for="{{$comment->id}}">
                                            <span></span>
                                        </label>
                                    </div>
                                @endcan
                            </td>
                            <td>
                                @can('comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.comments.edit', $comment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('comment_delete')
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('comment_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.comments.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')

                    return
                }

                if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                        headers: {'x-csrf-token': _token},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }})
                        .done(function () { location.reload() })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan
        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        $('.datatable-Casino:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
        $('.status').on('click', function(e){
            const chk = $(this);
            const status = chk.prop('checked') === true ? 'active' : 'inactive';
            const comment_id = $(this).data('id');

            $.ajax({
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{{ route('admin.comments.statusUpdate') }}',
                data: {'status': status, 'comment_id': comment_id},
                success: function(data){
                    console.log(data.success)
                    chk.parents('td').prev().text(status === 'active'? 'Active': 'Inactive');
                }
            });
        });
    });
</script>
@endsection
