$(function() {
    if (WALL_ACTIVE) {
        $('.new-post-box textarea, .panel-post .post-write-comment textarea').each(function () {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        $(window).scroll(function () {

            // if (Math.round($(window).scrollTop()) == $(document).height() - $(window).height()) {
            if (Math.round($(window).scrollTop()) > ($(document).height() - $(window).height())-300) {
                fetchForOlderPosts();
            }
        });


        setInterval(function(){

            fetchForNewPosts();

        }, 40000);

    }

});


function uploadPostImage(){
    var form_name = '#form-new-post';
    $(form_name+' .image-input').click();
}

function previewPostImage(input){ 
    var form_name = '#form-new-post';
    $(form_name + ' .loading-post').show();
    if (input.files && input.files[0]) {
	
        var reader = new FileReader();
        reader.onload = function (e) {
		var fileType = input.files[0]["type"];
		var validImageTypes = ["audio/ogg", "video/mp4", "video/webm", "video/x-flv", "video/quicktime", "video/ogg"];
		if ($.inArray(fileType, validImageTypes) < 0) {
		     	$(".image_or_video_preview").html("<img src='"+e.target.result+"'>");
		}else{
			$(".image_or_video_preview").html("<video controls autoplay playsinline muted> <source src='"+e.target.result+"' /></video>");
		}
            $(form_name + ' .image-area img').attr('src', e.target.result);
            $(form_name + ' .image-area').show();
        };

        reader.readAsDataURL(input.files[0]);
        
        //reader.onload = function (e) {
            //$(form_name + ' .image-area img').attr('src', e.target.result);
            //$(form_name + ' .image-area').show();
        //};

        //reader.readAsDataURL(input.files[0]);
    }
    $(form_name + ' .loading-post').hide();
}

function removePostImage(){
    var form_name = '#form-new-post';
    $(form_name + ' .image-area img').attr('src', " ");
    $(form_name + ' .image-area').hide();
    resetFile($(form_name + ' .image-input'));
}

function cleanPostForm(){
    var form_name = '#form-new-post';
    $(form_name + ' textarea').val('');
    removePostImage();
}

function newPost(){
    var form_name = '#form-new-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');


    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/posts/new',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                cleanPostForm();
                $(form_name + ' .loading-post').hide();
                $('.post-list-top-loading').show();
                fetchForNewPosts();
                    if (response.code == 200) {
                        setTimeout(
                            function() 
                            {
                            location.reload();
                            }, 0001);    
                    }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-post').hide();
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-post').hide();
        }
    });

}


function newQuickPostModal(){
	
   var form_name = '#locationModal #form-new-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();console.log(data);
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');

    var content = $('#locationModal #form-new-post .quickpost_content').val();
    data.append('content', content);
    var location = $('#locationModal #form-new-post .location').val();
    data.append('location', location);
    var link = $('#locationModal #form-new-post .link').val();
    data.append('link', link);
    
    if(found_location.latitude){
    	data.append('latitude', found_location.latitude);
    	data.append('longitude', found_location.longitude);
    }

    var url = "https://www.spidergain.com/feed";

    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/posts/new/quickpost/send',
        type: "POST",
        timeout: 20000000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        beforeSend: function() {
        $("#loading").show();
        },
        success: function(response){
            if (response.code == 200){
                $("#loading").hide();
                window.location = url; 
                cleanPostForm();
                $(form_name + ' .loading-post').hide();
                $('.post-list-top-loading').show();
                fetchForNewPosts();
                    if (response.code == 200) {
                        //$('#locationModal').modal('hide');
                        //setTimeout(
                        //    function() 
                        //    {
                        //    location.reload();
                        //    }, 0001);  
                        window.location = url;   
                        
                    }
            }else{
                $("#loading").hide();
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-post').hide();
            }
        },
        error: function(){
            $("#loading").hide();
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-post').hide();
        }
    });

}

function newCheckInModal(){
	
    var form_name = '#locationModal #form-new-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();console.log(data);
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');

    var content = $('#locationModal #form-new-post .content').val();
    data.append('content', content);
    var location = $('#locationModal #form-new-post .location').val();
    data.append('location', location);
    var link = $('#locationModal #form-new-post .link').val();
    data.append('link', link);
    
    if(found_location.latitude){
    	data.append('latitude', found_location.latitude);
    	data.append('longitude', found_location.longitude);
    }

    var url = "https://www.spidergain.com/feed";

    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/posts/new/check-in',
        type: "POST",
        timeout: 20000000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        beforeSend: function() {
        $("#loading").show();
        },
        success: function(response){
            if (response.code == 200){
                $("#loading").hide();
                window.location = url; 
                cleanPostForm();
                //window.location = url; 
                $(form_name + ' .loading-post').hide();
                $('.post-list-top-loading').show();
                fetchForNewPosts();
                    if (response.code == 200) {
                        //$('#locationModal').modal('hide');
                        //setTimeout(
                        //    function() 
                        //    {
                        //    location.reload();
                        //    }, 0001);  
                        
                        window.location = url;   
                        
                    }
            }else{
                $("#loading").hide();
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-post').hide();
            }
        },
        error: function(){
            $("#loading").hide();
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-post').hide();
        }
    });

}

function newPostModal(){
	
    var form_name = '#locationModal #form-new-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();console.log(data);
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');

    var content = $('#locationModal #form-new-post .content').val();
    data.append('content', content);
    var location = $('#locationModal #form-new-post .location').val();
    data.append('location', location);
    var link = $('#locationModal #form-new-post .link').val();
    data.append('link', link);
    
    if(found_location.latitude){
    	data.append('latitude', found_location.latitude);
    	data.append('longitude', found_location.longitude);
    }

    var url = "https://www.spidergain.com/feed";

    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/posts/new',
        type: "POST",
        timeout: 20000000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        beforeSend: function() {
        $("#loading").show();
        },
        success: function(response){
            if (response.code == 200){
                $("#loading").hide();
                window.location = url; 
                cleanPostForm();
                $(form_name + ' .loading-post').hide();
                $('.post-list-top-loading').show();
                fetchForNewPosts();
                    if (response.code == 200) {
                        //$('#locationModal').modal('hide');
                        //setTimeout(
                        //    function() 
                        //    {
                        //    location.reload();
                        //    }, 0001);  
                        window.location = url;   
                        
                    }
            }else{
                $("#loading").hide();
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-post').hide();
            }
        },
        error: function(){
            $("#loading").hide();
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-post').hide();
        }
    });

}

function editPostModal(){
    var form_name = '#editpost #form-edit-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("edit post");

    var content = $('#editpost #form-edit-post .content').val();
    data.append('content', content);
    console.log("content");
    var location = $('#editpost #form-edit-post .location').val();
    data.append('location', location);
    console.log("location");
    var link = $('#editpost #form-edit-post .link').val();
    data.append('link', link);
    console.log("link");
    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

    $.ajax({
        url: BASE_URL+'/posts/update',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                console.log("success");
                cleanPostForm();
                $(form_name + ' .loading-post').hide();
                $('.post-list-top-loading').show();
                fetchForNewPosts();
                    if (response.code == 200) {
                        $('#postedit').modal('hide');
                        setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001);    
                    }
            }else{
                console.log("error 1");
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-post').hide();
            }
        },
        error: function(){
            console.log("error 2");
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-post').hide();
        }
    });

}

var fetch_end = false;
var count_empty_query = 0;
function fetchPost(wall_type, list_type, optional_id, limit, post_min_id, post_max_id, location){
    if (!fetch_end) {
        fetch_end = true;
        $.ajax({
            url: BASE_URL + '/posts/list',
            type: "GET",
            timeout: 5000,
            data: "wall_type=" + wall_type + "&list_type=" + list_type + "&optional_id=" + optional_id + "&limit=" + limit + "&post_min_id=" + post_min_id + "&post_max_id=" + post_max_id + "&div_location=" + location,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function (render) {
                if (render != "") {
                    $('.post-list .post_data_filter_' + location).remove();
                    if (location == 'bottom') {
                        $('.post-list').append(render);
                    } else if (location == 'top') {
                        $('.post-list').prepend(render);
                    } else {
                        $('.post-list').html(render);
                    }
                }else{
                    if (location == 'bottom') {
                        count_empty_query = count_empty_query + 1;
                    }
                }
                $('.post-list-top-loading').hide();
                $('.post-list-bottom-loading').hide();
                fetch_end = false;
            },
            error: function () {
                /*
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong when loading your wall!');*/
                $('.post-list-top-loading').hide();
                $('.post-list-bottom-loading').hide();
                fetch_end = false;
            }
        });
    }
}

function fetchForNewPosts(){
    var wall_type = $('.post-list .post_data_filter_top input[name=wall_type]').val();
    var list_type = $('.post-list .post_data_filter_top input[name=list_type]').val();
    var optional_id = $('.post-list .post_data_filter_top input[name=optional_id]').val();
    var limit = 150000;
    var post_min_id = -1;
    var post_max_id = $('.post-list .post_data_filter_top input[name=post_max_id]').val();
    if (post_max_id > 0 || $('.panel-post').length == 0) {
        fetchPost(wall_type, list_type, optional_id, limit, post_min_id, post_max_id, 'top');
    }
}

function fetchForOlderPosts(){
    var wall_type = $('.post-list .post_data_filter_bottom input[name=wall_type]').val();
    var list_type = $('.post-list .post_data_filter_bottom input[name=list_type]').val();
    var optional_id = $('.post-list .post_data_filter_bottom input[name=optional_id]').val();
    var limit = 5;
    var post_min_id = $('.post-list .post_data_filter_bottom input[name=post_min_id]').val();
    var post_max_id = -1;
    if (post_min_id > 1 && count_empty_query < 2) {
        $('.post-list-bottom-loading').show();
        fetchPost(wall_type, list_type, optional_id, limit, post_min_id, post_max_id, 'bottom');

    }
}


function deletePost(id){

    BootstrapDialog.show({
        title: 'Cancella!',
        message: 'Sei sicuro di voler cancellare il post? ?',
        buttons: [{
            label: "Si, sono sicuro!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL+'/posts/delete',
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
                            $('#panel-post-'+id).html('<div style="visibility:hidden;">.</div>');
                        }else{
                            $('#errorMessageModal').modal('show');
                            $('#errorMessageModal #errors').html('Oops un problema!');
                        }
                    },
                    error: function(){
                        dialog.close();
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops un problema!');
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



function likePost(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL+'/posts/like',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'like'){
                    $('#panel-post-'+id+' .like-text span').html('Unlike!');
                    $('#panel-post-'+id+' .like-text i').removeClass('fa-heart-o').addClass('fa-heart');
                    //$('#panel-post-'+id+' #heart_test').fadeIn(100).fadeOut(100).css('display:none;');
                    $('#panel-post-'+id+' #image_post_picture').fadeOut(100).fadeIn(100);
                }else{
                    $('#panel-post-'+id+' .like-text span').html('Like!');
                    $('#panel-post-'+id+' .like-text i').removeClass('fa-heart').addClass('fa-heart-o');
                    //$('#panel-post-'+id+' #heart_test').fadeIn(100).fadeOut(100).css('display:none;');
                    $('#panel-post-'+id+' #image_post_picture').fadeOut(100).fadeIn(100);
                }
                if (response.like_count > 1){
                    $('#panel-post-'+id+' .all_likes span').html(response.like_count+' likes');
                }else{
                    $('#panel-post-'+id+' .all_likes span').html(response.like_count+' like');
                }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops un problema!');
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops un problema!');
        }
    });
}


function likeComment(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL+'/posts/comment/like',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'like'){
                    $('#panel-post-'+id+' #post-comment .like-comment span').html('Unlike!');
                    $('#panel-post-'+id+' #post-comment .like-comment i').removeClass('fa-heart-o').addClass('fa-heart');
                     location.reload();
                }else{
                    $('#panel-post-'+id+' #post-comment .like-comment span').html('Like!');
                    $('#panel-post-'+id+' #post-comment .like-comment i').removeClass('fa-heart').addClass('fa-heart-o');
                     location.reload();
                }
                if (response.like_count > 1){
                    $('#panel-post-'+id+' #post-comment .all_likes span').html(response.like_count+' likes');
                }else{
                    $('#panel-post-'+id+' #post-comment .all_likes span').html(response.like_count+' like');
                }
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops un problema!');
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops un problema!');
        }
    });
}


function submitCommentModal(id){

  

    var data = new FormData();
    data.append('id', id);
    //var comment = $('#panel-post-'+id+' #newCommentModal #form-new-comment-modal2 textarea').val();
    var comment = $('#newCommentModal #form-new-comment-modal2 textarea').val();
    data.append('comment', comment);
    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

    if (comment.trim() == ''){
        $('#errorMessageModal').modal('show');
        $('#errorMessageModal #errors').html('Per favore scrivi una commenta');
    }else {
        $.ajax({
            url: BASE_URL + '/posts/comment',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function (response) {
                if (response.code == 200) {
                    $('#newCommentModal #form-new-comment-modal2 textarea').val("");
                    $('#newCommentModal .comments-title').html(response.comments_title);
                    $('#newCommentModal .post-comments').append(response.comment);
                    
                        setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001);    
                    
                } else {
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Oops un problema!');
                }
            },
            error: function () {
                setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001); 
                //$('#errorMessageModal').modal('show');
                //$('#errorMessageModal #errors').html('Oops un problema!');
            }
        });
    }
}



function submitComment(id){

    var data = new FormData();
    data.append('id', id);
    var comment = $('#panel-post-'+id+' #form-new-comment textarea').val();
    data.append('comment', comment);
    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

    if (comment.trim() == ''){
        $('#errorMessageModal').modal('show');
        $('#errorMessageModal #errors').html('Per favore scrivi un commento');
    }else {
        $.ajax({
            url: BASE_URL + '/posts/comment',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function (response) {
                if (response.code == 200) {
                    $('#panel-post-'+id+' #form-new-comment textarea').val("");
                    $('#panel-post-'+id+' .comments-title').html(response.comments_title);
                    $('#panel-post-'+id+' .post-comments').append(response.comment);
                    
                        setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001);    
                    
                } else {
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Oops un problema!');
                }
            },
            error: function () {
                setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001); 
                //$('#errorMessageModal').modal('show');
                //$('#errorMessageModal #errors').html('Oops un problema!');
            }
        });
    }
}




function removeComment(id, post_id){

    BootstrapDialog.show({
        title: 'Comment Delete!',
        message: 'Sei sicuro di voler cancellare questo commento?',
        buttons: [{
            label: "Si, sono sicuro!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL+'/posts/comments/delete',
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
                            $('#post-comment-'+id+' .panel-body').html("<p><small>Commento cancellato!</small></p>");
                            $('#panel-post-'+post_id+' .comments-title').html(response.comments_title);
                        }else{
                            $('#errorMessageModal').modal('show');
                            $('#errorMessageModal #errors').html('Oops un problema!');
                        }
                    },
                    error: function(){
                        dialog.close();
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops un problema!');
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


function removeReply(id, comment_id){

    BootstrapDialog.show({
        title: 'Reply Delete!',
        message: 'Sei sicuro di voler cancellare questo reply?',
        buttons: [{
            label: "Si, sono sicuro!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL+'/posts/comments/reply/delete',
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
                            $('#post-comment-'+id+' .panel-body').html("<p><small>Commento cancellato!</small></p>");
                            $('#panel-post-'+post_id+' .comments-title').html(response.comments_title);
                        }else{
                            $('#errorMessageModal').modal('show');
                            $('#errorMessageModal #errors').html('Oops un problema!');
                        }
                    },
                    error: function(){
                        dialog.close();
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Oops un problema!');
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


function showLikes(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/posts/likes',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            
            if (response.code == 200) {
                $('#likeListModal .user_list').html(response.likes);
                $('#likeListModal').modal('show');
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops un problema!');
            }
        },
        error: function () {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops un problema!');
        }
    });
}

function showCommentLikes(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/posts/comment/likes',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                $('#likeListModal .user_list').html(response.likes);
                $('#likeListModal').modal('show');
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Oops un problema!');
            }
        },
        error: function () {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Oops un problema!');
        }
    });
}

function submitReply(id){

    var data = new FormData();
    data.append('id', id);
    var comment = $('#replyModal #form-reply-comment textarea').val();
    data.append('reply', reply);
    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

    if (reply.trim() == ''){
        $('#errorMessageModal').modal('show');
        $('#errorMessageModal #errors').html('Per favore scrivi un reply');
    }else {
        $.ajax({
            url: BASE_URL + '/posts/comment/reply',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function (response) {
                if (response.code == 200) {
                    $('#replyModal #form-reply-comment textarea').val("");
                    $('#replyModal .comments-title').html(response.comments_title);
                    $('#replyModal .post-comments').append(response.comment);
                    
                        setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001);    
                    
                } else {
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Oops un problema!');
                }
            },
            error: function () {
                setTimeout(
                            function() 
                            {
                            localStorage.setItem('scrollpos', window.scrollY);
                            location.reload();
                            }, 0001); 
                //$('#errorMessageModal').modal('show');
                //$('#errorMessageModal #errors').html('Oops un problema!');
            }
        });
    }
}

