@extends('layouts.admin')
@section('content')
@can('game_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.homeSlider.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.homeSlider.title_singular') }}
            </a>
            <a id="saveOrder" class="btn btn-warning" href="#">
               Save Order
           </a>
        </div>
    </div>
@endcan
@php
  $sno = '0';
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('cruds.homeSlider.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Casino">
                <thead>
                    <tr>
                        <th>{{ trans('cruds.homeSlider.fields.sno') }}</th>
                        <!-- <th>{{ trans('cruds.homeSlider.fields.id') }}</th> -->
                        <th>{{ trans('cruds.homeSlider.fields.sliderImg') }}</th>
                        <th>{{ trans('cruds.homeSlider.fields.slider_button_link') }}</th>
                          <th>{{ trans('cruds.homeSlider.fields.st') }}</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                  @foreach($games as $key => $game)
                    <tr data-entry-id="{{ $game->id }}">
                        <td>
                          <i style="cursor: move;transform: rotate(90deg);" class="fa fa-exchange" aria-hidden="true"></i>
                          {{++$sno}}.
                        </td>
                        <!-- <td>{{ $game->id ?? '' }}</td> -->
                        <td> @if($game->slider_img)
                            <a href="{{ asset($game->slider_img) }}" target="_blank">
                                <img src="{{ asset($game->slider_img) }}" width="50px" height="50px">
                            </a>
                        @endif</td>
                        <td>{{ $game->slider_button_link ?? '' }}</td>
                        <td>{{ $game->status ?? ''}}</td>
                        <td>

                            @can('game_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.homeSlider.edit', $game->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('game_delete')
                                <form action="{{ route('admin.homeSlider.destroy', $game->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('game_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.games.massDestroy') }}",
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
  $('.datatable-Game:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

$( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
$('#saveOrder').click(function(){
    var ids = [];
    $('#sortable tr').each(function(){
        ids.push($(this).attr('data-entry-id'));
    });
  	$.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: "{{route('admin.change.changeOrder')}}",
          data: {ids: ids, type:'homeSilder'},
          success: function(result){
            alert('Successfully Changed Order');
          }
    });
});

</script>
@endsection
