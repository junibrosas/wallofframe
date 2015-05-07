@extends('layout.master')

@section('footer')
    {{ link_js('iboostme/wallofframe/angular/FrameAppController.js') }}
    {{ link_js('iboostme/wallofframe/cart.js') }}
    {{ link_js('iboostme/wallofframe/angular/CartController.js') }}
    {{ link_js('iboostme/wallofframe/angular/TableController.js') }}
@stop

@section('layout')
    @include('components.front.header')

    <div class="container" style="margin-top: -1px;">
        <div class="row">
            <div class="col-md-12">
                @include('components.alerts.session')
            </div>
        </div>
    </div>
        @yield('content')
    @include('components.front.footer')
@stop




