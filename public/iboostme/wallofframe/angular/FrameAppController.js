app.controller("DragNDropController", function($http, $scope, productService){
    $scope.showLoader = false;
    $scope.categories = window.categories;
    $scope.brands = window.brands;
    $scope.types = window.types;

    //$scope.currentCategory = $scope.categories[0].slug;
    $scope.currentCategory = $scope.categories[0];
    $scope.currentBrand = $scope.brands[0];
    $scope.currentType = $scope.types[0];

    $scope.imageUpload = function(){
        $scope.showLoader = true;
    }

    var sendSelectionData = function(){
        var data = {
            category : $scope.currentCategory.slug,
            brand: $scope.currentBrand.slug,
            type: $scope.currentType.slug,
            part: window.frame_part
        }

        // save data to session
        $http.post( progressUrl, data ).
            success(function(data, status, headers, config) {
                console.log(data);
            }).
            error(function(data, status, headers, config) {
                //console.log(data);
            });
    } 

    $scope.selectionChanged = function( index, slug ){
        sendSelectionData();
    }



    sendSelectionData();
});


app.controller("FrameAppController", function($http, $scope, productService){
    $scope.frameList = window.frameList;
    $scope.currentFrame = $scope.frameList[0];

    console.log($scope.frameList[0]);

    $scope.setCurrentFrame = function( frame ){
        $scope.currentFrame = frame;
    }
});

// This is the controller for FlowJs uploading, every progress in uploading will be processed here.
app.controller("FlowController", function($scope){
    // get the fileAdded function event from $flow and check the image width
    $scope.$on('flow::fileAdded', function (event, $flow, file) {
        if (file.file.dimensions) {
            file.dimensions = file.file.dimensions;
            if (file.dimensions.width < 100) {//dimensions validator
                alert('invalid dimensions');
                return false;
            }
            return true;// image is valid
        }

        // get the image file and make it readable
        var fileReader = new FileReader();
        fileReader.readAsDataURL(file.file);
        fileReader.onload = function (event) {
            var img = new Image();
            img.onload = function() {
                //console.log(this.width + 'x' + this.height);
                file.file.dimensions = {
                    width: this.width,
                    height: this.height
                };
                // 1500 max width and 2mb max size
                if(this.width <= 1500 && file.size <= 20000000 ){
                    console.log('valid and dimension size');
                    $scope.$flow.addFile(file.file);
                }
            }
            img.src = event.target.result;
        };
        event.preventDefault();

        //return false;// do not add file to be uploaded
        //// or $event.preventDefault(); depends how you use this function, in scope events or in directive
    });
});

// DIRECTIVES
// THIS DIRECTIVE WILL CENTER THE IMAGE DEPENDING ON ITS CONTAINER.
app.directive('imagecenter', function() {
    var topAllowance = - 60;

    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('load', function() {
                var width = (603 / 2) - ( this.width  / 2 );
                var height =  (419 / 2 + topAllowance) - ( this.height  / 2 );
                element.attr('style', 'position:absolute; left: '+width+'px; top:'+height+'px;');
            });
        }
    };
});