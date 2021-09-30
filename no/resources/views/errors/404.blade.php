
@extends('layouts.frontend')

@section('title', '404')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align:center; margin-top:3em; ">
                    <img alt="404-error-image" class="img-fluid" src="{{asset('asset/frontend/img/error/404.png')}}" style="max-width:100%" width="666" height="469">
                </div>
                <div class="col-md-12" style="text-align:center; margin-top:20px">
                    <a href="{{route('frontend.index')}}" data-text="Take me back Home" class="splbtns">Take me back Home</a>
                </div>
            </div>
        </div>
@endsection
