$(function() {
    $('.datepicker').datepicker();

    $('[data-toggle="tooltip"]').tooltip();

    $(".select2-multiple").select2();
    $(".js-example-placeholder-single").select2({
        placeholder: "Select a state",
        allowClear: true
    });

});

window.resetFile = function (e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
};

function makeSerializable(elem) {
    return $(elem).prop('elements', $('*', elem).addBack().get());
}

var location_finder = "not-running";
var found_location = "";
function getLocation() {
    if (navigator.geolocation) {
        return navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        $('#errorMessageModal').modal('show');
        $('#errorMessageModal #errors').html("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var location = {latitude: position.coords.latitude, longitude: position.coords.longitude};
    location_finder = "found";
    found_location = location;
}

function showError(error) {
    var error_msg = null;
    switch(error.code) {
        case error.PERMISSION_DENIED:
            error_msg = "You denied the request for Geolocation.";
            break;
        case error.POSITION_UNAVAILABLE:
            error_msg = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            error_msg = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            error_msg = "An unknown error occurred.";
            break;
    }
    $('#errorMessageModal').modal('show');
    $('#errorMessageModal #errors').html(error_msg);
    location_finder = "not-found";
}


var found_location2 = "";
var location_finder2 = "not-running";
function getLocation2(address) {
    if (navigator.geolocation) {
    	console.log(address);
        navigator.geolocation.getCurrentPosition(showPosition2);
    } else {
        location_finder2 = "not-found";
    }
}
function showPosition2(position) {
    found_location2 = {latitude: position.coords.latitude, longitude: position.coords.longitude};
    location_finder2 = "found";
}

function saveMyLocation(userID = 0){
    address = $(".location-input").val();
    
    //geocoder = new google.maps.Geocoder();
    //var latlng = new google.maps.LatLng(latitude, longitude);
    //$.get(location.protocol + "//maps.google.com/maps/api/js?key=xxx&address="+address, function(data){
    //   console.log(data);
    //});
    var updated = false;
    var timer = setInterval(function(){
        if (location_finder == 'found'){
            $.ajax({
                url: BASE_URL+'/social/save-my-location',
                type: "GET",
                timeout: 5000,
                data: "latitude="+found_location.latitude+"&longitude="+found_location.longitude,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(response){
			 $('#findModal-'+userID).modal('hide');
                },
                error: function(){
                 	 $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops an error!');
                }
            });

            clearInterval(timer);
        }else if(address){
            $.ajax({
                url: BASE_URL+'/social/save-my-location',
                type: "GET",
                timeout: 5000,
                data: "address="+address,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(response){
			 $('#findModal-'+userID).modal('hide');
                },
                error: function(){
                 	 $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops an error!');
                }
            });

            clearInterval(timer);
        }else{
		$('.error').text('Please re-find location');
        }

    }, 1);
}

function findMyLocation(userID = 0){
	if(userID == 0){
	    var form_name = '#findModal #form-profile-information';
	}else{
	   var form_name = '#findModal-'+userID+' #form-profile-information';
	}

    $('.loading-page').show();
    location_finder = "not-running";
    found_location = "";
    
    getLocation();

    var timer =setInterval(function(){

        if (location_finder == 'not-found'){
            clearInterval(timer);
            $('.loading-page').hide();
        }else if (location_finder == 'found'){
            $.ajax({
                url: BASE_URL+'/social/find-my-location',
                type: "GET",
                timeout: 5000,
                data: "latitude="+found_location.latitude+"&longitude="+found_location.longitude,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(response){
                    if (response.code == 200){
                        $(form_name+' .location-input').val(response.address);
                        $(form_name+' .map-info').val(response.map_info);
                        $(form_name+' .map-place').html('<div id="map-render"></div>');
                        var map = new GMaps({
                            el: '#map-render',
                            lat: found_location.latitude,
                            lng: found_location.longitude,
                        });
                        map.addMarker({
                            lat: found_location.latitude,
                            lng: found_location.longitude,
                            infoWindow: {
                                content: response.address
                            }
                        });
                        $(".saveMyLocation").attr('disabled',false);	
                    }else{
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops an error!');
                    }
                },
                error: function(){
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Whoops something went wrong!');
                }
            });

            clearInterval(timer);
            $('.loading-page').hide();
        }

    }, 1);
}

function findPostLocation(userID = 0){

	if(userID == 0){
	    var form_name = '#form-new-post';
	}else{
	   var form_name = userID+' #form-new-post';
	}


    $('.loading-page').show();
    location_finder = "not-running";
    found_location = "";

    getLocation();

    var timer =setInterval(function(){

        if (location_finder == 'not-found'){
            clearInterval(timer);
            $('.loading-page').hide();
        }else if (location_finder == 'found'){
            $.ajax({
                url: BASE_URL+'/social/find-my-location',
                type: "GET",
                timeout: 5000,
                data: "latitude="+found_location.latitude+"&longitude="+found_location.longitude,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(response){
                    if (response.code == 200){
                        var address = response.address;
                        document.getElementById("locazioni").value = address;
                        var map_info = response.map_info;
                        document.getElementById("map_info").value = map_info;
                        $(form_name+' .map-place').html('<div id="map-render"></div>');
                        var map = new GMaps({
                            el: '#map-render',
                            lat: found_location.latitude,
                            lng: found_location.longitude,
                        });
                        map.addMarker({
                            lat: found_location.latitude,
                            lng: found_location.longitude,
                            infoWindow: {
                                content: response.address
                            }
                        });
                    }else{
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops an error!');
                    }
                },
                error: function(){
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Whoops something went wrong!');
                }
            });

            clearInterval(timer);
            $('.loading-page').hide();
        }

    }, 1);
}

function findCampagnaLocation(userID = 0){

	if(userID == 0){
	    var form_name = '#kt_form';
	}else{
	   var form_name = userID+' #kt_form';
	}


    $('.loading-page').show();
    location_finder = "not-running";
    found_location = "";

    getLocation();

    var timer =setInterval(function(){

        if (location_finder == 'not-found'){
            clearInterval(timer);
            $('.loading-page').hide();
        }else if (location_finder == 'found'){
            $.ajax({
                url: BASE_URL+'/social/find-my-location',
                type: "GET",
                timeout: 5000,
                data: "latitude="+found_location.latitude+"&longitude="+found_location.longitude,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(response){

                    if (response.code == 200){
                        var address = response.address;
                        document.getElementById("locazioni").value = address;
                        var map_info = response.map_info;
                        document.getElementById("map_info").value = map_info;
                        var obj = JSON.parse(map_info);
                        var latitude = obj.latitude;
                        document.getElementById("latitude").value = latitude;
                        var longitude = obj.longitude;
                        document.getElementById("longitude").value = longitude;
                        $(form_name+' .map-place').html('<div id="map-render"></div>');
                        var map = new GMaps({
                            el: '#map-render',
                            lat: found_location.latitude,
                            lng: found_location.longitude,
                        });
                        map.addMarker({
                            lat: found_location.latitude,
                            lng: found_location.longitude,
                            infoWindow: {
                                content: response.address
                            }
                        });
                       
                    }else{
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops an error!');
                    }
                },
                error: function(){
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Whoops something went wrong!');
                }
            });

            clearInterval(timer);
            $('.loading-page').hide();
        }

    }, 1);
}


function autoFindLocation(){

    location_finder2 = "running";

    getLocation2();


    var updated = false;
    var timer = setInterval(function(){
        if (location_finder2 == 'found'){

            $.ajax({
                url: BASE_URL+'/social/save-my-location',
                type: "GET",
                timeout: 5000,
                data: "latitude="+found_location2.latitude+"&longitude="+found_location2.longitude,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(response){

                },
                error: function(){
                }
            });

            clearInterval(timer);
        }else{
            if (updated == false) {
                $.ajax({
                    url: BASE_URL + '/social/save-my-location2',
                    type: "GET",
                    timeout: 5000,
                    data: "",
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {'X-CSRF-TOKEN': CSRF},
                    success: function (response) {

                    },
                    error: function () {
                    }
                });
            }
            updated = true;
        }

    }, 1);
}


function follow(following, follower, element, size){

    var data = new FormData();
    data.append('following', following);
    data.append('follower', follower);
    data.append('element', element);
    data.append('size', size);


    $.ajax({
        url: BASE_URL + '/follow',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                $(element).html(response.button);
                if (response.refresh == 1 && size != '.btn-no-refresh'){
                    location.reload();
                }
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops something went wrong!');
            }
        },
        error: function () {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops something went wrong!');
        }
    });

}

function followRequest(type, id){

    var data = new FormData();
    data.append('type', type);
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/follower/request',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                $('#approve-buttons-'+id+' .btn').remove();
                if (type == 1){
                    $('#approve-buttons-'+id+' .approved').show();
                }else{
                    $('#approve-buttons-'+id+' .denied').show();
                }
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops something went wrong!');
            }
        },
        error: function () {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops something went wrong!');
        }
    });

}

function deniedFollow(me, follower, element, size){

    var data = new FormData();
    data.append('me', me);
    data.append('follower', follower);
    data.append('element', element);
    data.append('size', size);


    $.ajax({
        url: BASE_URL + '/follower/denied',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                location.reload();
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops something went wrong!');
            }
        },
        error: function () {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops something went wrong!');
        }
    });

}


function relationsRequest(type, id){

    var data = new FormData();
    data.append('type', type);
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/relations/request',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                $('#approve-buttons-'+id+' .btn').remove();
                if (type == 1){
                    $('#approve-buttons-'+id+' .approved').show();
                }else{
                    $('#approve-buttons-'+id+' .denied').show();
                }
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops something went wrong!');
            }
        },
        error: function () {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops something went wrong!');
        }
    });

}

function removeRelation(type, id){

    BootstrapDialog.show({
        title: 'Relationship Delete!',
        message: 'Are you sure to delete ?',
        buttons: [{
            label: "Yes, I'm Sure!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('type', type);
                data.append('id', id);


                $.ajax({
                    url: BASE_URL + '/relations/delete',
                    type: "POST",
                    timeout: 5000,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {'X-CSRF-TOKEN': CSRF},
                    success: function(response){
                        dialog.close();
                        if (response.code == 200){
                            location.reload();
                        }else{
                            $('#errorMessageModal').modal('show');
                            $('#errorMessageModal #errors').html('Oops something went wrong!');
                        }
                    },
                    error: function(){
                        dialog.close();
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops something went wrong!');
                    }
                });
            }
        }, {
            label: 'No!',
            action: function(dialog) {
                dialog.close();
            }
        }]
    });
}

