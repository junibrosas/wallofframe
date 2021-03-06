@extends('layout.master')
@section('header')
    @parent
    {{ link_css('css/adminkit.css') }}
@stop
@section('footer')
    {{ link_js('iboostme/wallofframe/profile.js') }}
    {{ link_js('iboostme/wallofframe/angular/ProductBrowseController.js') }}
    {{ link_js('iboostme/wallofframe/angular/FrameAppController.js') }}
    {{ link_js('iboostme/wallofframe/angular/TableController.js') }}
    {{ link_js('iboostme/wallofframe/angular/TransactionController.js') }}
@stop

@section('layout')
    @include('components.front.header')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('components.alerts.session')
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row user-content">
                    <div class="col-md-2">
                        @if( Auth::user()->isAdmin() )
                            @include('sidebars.sidebar-admin')
                        @else
                            @include('sidebars.sidebar-account')
                        @endif
                    </div>
                    <div class="col-md-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
   @include('components.front.footer')
@stop
