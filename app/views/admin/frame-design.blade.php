@extends('layout.admin')

@include('media.components.media-assets')

@section('content')
    <div ng-controller="FrameManageController">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" >
                        <ul class="list-inline pull-left">
                            <li ng-repeat="nav in navigation"><a href="@{{ nav.link }}" class="normal-link" ng-click="getProductsByStatus( nav.slug )">@{{ nav.name }} (@{{ nav.total_products }})</a></li>
                        </ul>
                        <a href="{{ route('admin.design.upload') }}" class="btn btn-default btn-xs pull-right" ng-show="navigation.length > 0">Upload Design</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row" ng-controller="ProductBrowseController">
                    <div ng-show="showLoadingText" class="text-center">loading...</div>
                    <div class="col-md-12">
                        <div class="alert alert-success alert-sm alert-dismissable  space-sm" role="alert" ng-show="noProducts">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <b>No available products</b>
                        </div>
                    </div>
                    <div class="col-md-3 space-xs design-list" ng-repeat="product in products">
                        <div class="">
                            <a style="cursor: pointer" ng-click="selectProduct( $index, product )">
                                <img ng-src="@{{ product.imageSquare }}" alt="" class="img-responsive elem-center"/>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12" ng-show="!noProducts">
                        @include('components.paginates.controls')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div ng-show="showUploadImageForm" ng-controller="FrameUploadController">
                            @include('angularapps.images.upload-single')
                        </div>
                        <div class="text-right">
                            <button class="btn btn-danger btn-xs"
                                ng-show="showControlButtons"
                                ng-click="removeSelectedProduct( selectedProductIndex )"> Remove Selected Item</button>
                            {{--<button class="btn btn-danger btn-xs"
                                ng-show="showControlButtons"
                                ng-click="showUploadImageForm = !showUploadImageForm"> Change Image</button>--}}

                            {{--Media Gallery Uploader Modal--}}
                            <a  href="#mediaModal" ng-show="showControlButtons" class="btn btn-danger btn-xs"> Change Image</a>
                            <div ng-controller="MediaController as media" style="margin-top: 10px">
                                <div class="remodal" data-remodal-id="mediaModal" id="mediaModal">
                                    @include('media.media-upload')
                                </div>
                                <div ng-repeat="item in mediaSelectedItems">
                                    <input type="hidden" id="design-image-single" data-image-id="@{{ item.id }}"/>
                                    <div style="margin: 0 auto;">
                                        @include('media/components/list-media')
                                    </div>
                                </div>
                            </div>
                            {{--Media Gallery Uploader Modal--}}

                        </div>
                        <div ng-show="showProductForm">
                            @include('components.forms.product-edit-form')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop