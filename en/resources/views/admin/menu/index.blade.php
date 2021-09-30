@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap-iconpicker.min.css')}}">
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
                                    <label for="text">Title</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                        <div class="input-group-btn">
                                            <button id="myEditor_icon" class="btn btn-default" data-iconset="fontawesome" role="iconpicker" data-icon="" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="href">URL</label>
                                    <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
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
                                        <textarea id="out" name="data" style="opacity:0 !important; width:0 !important; height:0 !important;"></textarea>
                                        <button id="btnOut" type="button" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
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
                                <ul id="myEditor" class="sortableLists list-group">
                                    
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
    });
</script>
@endsection