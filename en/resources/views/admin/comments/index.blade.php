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
                        <th>{{ trans('cruds.comment.fields.news') }}</th>
                        <th>{{ trans('cruds.comment.fields.comments') }}</th>
                        <th>{{ trans('cruds.comment.fields.status') }}</th>
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
                                <td>{{ $comment->status== '1' ? 'Active' : 'Inactive' }}</td>
                                <td>

                                    @can('comment_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.comments.edit', $comment->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    <div class="switches">
                                        <input type="checkbox" id="{{$comment->id}}" class="status" data-id="{{$comment->id}}" {{ $comment->status ? 'checked' : '' }}>
                                        <label for="{{$comment->id}}">
                                        <span></span>
                                        </label>
                                    </div>
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


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Casino:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    $('.status').on('click', function(e){
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var comment_id = $(this).data('id');
         
        $.ajax({
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: '{{ route('admin.comments.statusUpdate') }}',
            data: {'status': status, 'comment_id': comment_id},
            success: function(data){
                console.log(data.success)
            }
        });
        alert(status);
    }); 
});

</script>
@endsection
