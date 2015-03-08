@extends('layout.default')
@section('header')
    <meta property="og:title" content="{{ $product->present()->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{ $product->present()->url }}" />
    <meta property="og:description" content="{{ $product->present()->excerpt }}" />
@stop
@section('footer')
    @parent
    {{ link_js('assets/elevatezoom/jquery.elevateZoom-3.0.8.min.js') }}
    {{ link_js('iboostme/wallofframe/elevate.js') }}
    {{ link_js('iboostme/wallofframe/frame.js') }}
@stop
@section('content')
    <section>
        <div class="container">
            <div class="row sell" ng-controller="FrameAppController">
                <div class="col-md-8">
                    <div class="text-right">
                        <ul class="list-inline mode-list" style="margin-bottom: 20px;">
                            <li ng-repeat="mode in frameModes" ng-click="setPreviewMode( mode )" ng-class="currentMode == mode ? 'active-mode' : '' " >@{{ mode }}</li>
                        </ul>
                    </div>
                    <div class="frame-preview" style="margin-bottom: 20px;">
                        <img ng-show="currentMode == frameModes[2]" ng-src="{{ $product->present()->imageCacheSquare }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                        <img ng-show="currentMode == frameModes[1]" ng-src="{{ $product->present()->imageCacheVertical }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                        <img ng-show="currentMode == frameModes[0]" ng-src="{{ $product->present()->imageCacheHorizontal }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                        <img ng-show="currentMode == frameModes[3]" ng-src="{{ $product->present()->imageCachePreview }}" alt="Original Image" class="img-responsive elem-center custom-border" style="@{{ currentFrame.borderStyle }} border-image-source: url('@{{ currentFrame.imagePath }}'); " />
                    </div>

                    @include('posts.product-controls')
                </div>
                <div class="col-md-4">
                    @include('posts.product-details')

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @include('posts.related')

                </div>
            </div>
        </div>
    </section>
@stop