@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap-iconpicker.min.css')}}">
<style>
    .select2-selection{
        padding: 1.1rem .75rem !important;
    }
    #select2-ajax-sub-cate-container{
        margin-top: -15px;
    }
</style>
@endsection
@section('content')
<div class="wrapper">
    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-6 my-4">
                <form id="menu_selecter_form" action="" method="get">
                    <select name="menu" class="form-control" onchange="window.document.forms.menu_selecter_form.submit()">
                        <option value="">Select</option>
                        @foreach($menus as $menu)
                            <option value="{{ @$menu->id }}" {{ @$current_menu->id == @$menu->id ? 'selected':'' }}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">CMS</a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Index</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if($current_menu)
            <div class="row srilanka-menu">
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white">Edit item</div>
                        <div class="card-body">
                            <form method="post" id="frmEdit" class="form-horizontal">
                            <input type="hidden" name="icon" class="item-menu">
                             <div class="form-group">
                                    <label for="text">Categories</label>
                                    <div class="input-group">
                                        <select id="main-cate" class="form-control item-menu" >
                                            <option hidden>Please Select One</option>
                                            <option value="Game">Games</option>
                                            <option value="Casino">Casinos</option>
                                            <option value="Software">Softwares</option>
                                            <option value="layout_page">Layout Pages</option>
                                            <option value="StaticPage">Static pages</option>
                                            <option value="new">News</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="sub-cate">
                                    <label for="text">Page</label>
                                        <select id="ajax-sub-cate" class="form-control select2 text-capitalize item-menu" >
                                        </select>
                                </div>
                               <div class="menu-title-url" style="display: none">
                                    <div class="form-group">
                                        <label for="text">Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control item-menu text-capitalize" name="text" id="text" placeholder="Text">
                                            <div class="input-group-btn">
                                                <button id="myEditor_icon" class="btn btn-default" data-iconset="fontawesome" role="iconpicker" data-icon="" type="button"></button>
                                            </div>
                                        </div>
                                         <div class="input-group">
                                            <input type="hidden" class="form-control item-menu text-capitalize" name="menu_id" id="menu_id" placeholder="Text">
                                            <input type="hidden" class="form-control item-menu text-capitalize" name="menu_type" id="menu_type" placeholder="Text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="href">URL</label>
                                        <input type="text" class="form-control item-menu " id="href" name="href" placeholder="URL">
                                    </div>
                               </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                                    <button type="submit" id="btnUpdate" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <form id="menu_save_form" method="post" action="{{ route('admin.menu.update',$current_menu) }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="put">
                                        <textarea id="out" name="data" style="opacity:0 !important; width:0 !important; min-height:0 !important; height:0 !important;"></textarea>
                                        <button id="btnOut" type="button" class="btn btn-danger"><i class="fa fa-check"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div id="cont">
                                <ul id="myEditor" class="sortableLists list-group text-capitalize">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('asset/admin/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('asset/admin/js/jquery-menu-editor.js')}}"></script>
<script type="text/javascript" src="{{ asset('asset/admin/js/bootstrap-iconpicker.min.js')}}"></script>
<script>

    jQuery(document).ready(function () {
        /* =============== DEMO =============== */
        var iconPickerOpt = {};

        var editor = new MenuEditor('myEditor');
        editor.setForm($('#frmEdit'));
        editor.setUpdateButton($('#btnUpdate'));

        $("#btnUpdate").click(function(){
            editor.update();
        });

        $('#btnAdd').click(function(){
            editor.add();
        });

        $('#btnOut').click(function(){
            $('#out').val(editor.getString());
            $('#menu_save_form').submit();
            // console.log(editor.getRawString());
            // console.log(editor.getString());
        });
        @if($current_menu)
            editor.setData('{!! addslashes($current_menu->data) !!}')
        @endif
        /* ====================================== */
        const dis = ()=>{
            $('.menu-title-url').slideDown();
        }
        $('.btnEdit').click(()=>{ dis(); resetMenu(); });
        const resetMenu = ()=>{
           $('#text').val('');
            $('#href').val('');
            $('#menu_type').val('');
            $('#menu_id').val('');
        }
        $('#main-cate').on('change',function(){
           var id, uni_data, Select, Option, menu_id;
           var oBj=['<option hidden>Please Select One</option>'];
            resetMenu();
             //$('#sub-cate').html('<div class="d-flex text-danger align-items-center"> <strong>Loading...</strong> <div class="spinner-grow text-danger ml-auto" role="status" aria-hidden="true"></div></div>').fadeIn();
          id = $(this).val();
          $('#menu_type').val(id+'s');
          if(id === "other"){ dis(); $('#sub-cate').html(''); }
          else{
            $.ajax({
              url:"{{ route('admin.menu.ajax') }}",
              type:'POST',
              data:{
                  "_token": "{{ csrf_token() }}",
                  type: id
              },
              success:function(data){
                 uni_data = $.unique(data);
                 $.each(uni_data,(key,val)=>{
                      if(id==="StaticPage"){
                         menu_id = Option = data[key].page;
                      }else{
                        Option =  data[key].slug;
                         menu_id = data[key].id;
                      }
                      oBj.push('<option data-id='+menu_id+' value='+Option+'>'+Option.replaceAll('-',' ')+'</option>');
                 });
                   $('#ajax-sub-cate').html(oBj);
                   Dropdown(id);
              },
              error:function(jqXHR, textStatus, errorThrown) {
                  console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              }
            });
          }

        });

       const Dropdown = (type)=>{
            $('#ajax-sub-cate').change(function(){
            var val,menu_id;
            val = $(this).val();
            menu_id = $(this).find(':selected').data('id');
            $('#menu_id').val(menu_id);
            $('#text').val(val.replaceAll('-',' '));
                if(type === 'Game'){
                    $('#href').val('/slot/'+val);
                }
                else if(type === 'Casino'){
                    $('#href').val('/casino/'+val);
                }
                else if(type === 'Software'){
                    $('#href').val('/software/'+val);
                }
                else if( type === 'News'){
                    $('#href').val('/news/'+val);
                }
                else{
                    $('#href').val('/'+val);
                }
             dis();
        });
        }

    });
</script>
@endsection
