@extends('layouts.admin')
@section('content')
@can('dynamic_page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.dynamic-pages.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.dynamicPage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dynamicPage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Casino">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.dynamicPage.fields.id') }}</th>
                        <th>{{ trans('cruds.dynamicPage.fields.name') }}</th>
                        <th>{{ trans('cruds.dynamicPage.fields.bg_heading') }}</th>
                        <th>{{ trans('cruds.dynamicPage.fields.bg_text') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dynamic_page as $key => $dynamic_page)
                        <tr data-entry-id="{{ $dynamic_page->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dynamic_page->id ?? '' }}
                            </td>
                            <td>
                                {{ $dynamic_page->name ?? '' }}
                            </td>
                            <td>
                                {{ $dynamic_page->bg_heading ?? '' }}
                            </td>
                            <td>
                                {{ $dynamic_page->bg_text ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ $dynamic_page->route }}" target="_blank">
                                    {{ trans('global.slug') }}
                                </a>
                                @can('dynamic_page_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dynamic-pages.edit', $dynamic_page->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('dynamic_page_delete')
                                    <form action="{{ route('admin.dynamic-pages.destroy', $dynamic_page->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dynamic_page_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dynamic-pages.massDestroy') }}",
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
  $('.datatable-ContentPage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection

