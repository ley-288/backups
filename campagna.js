function uploadCampagnaImage(){
    var form_name = '#kt_form';
    $(form_name+' .image-input').click();
    //$('#hide_this_when_foto').hide();
}

function previewCampagnaImage(input){ 
    var form_name = '#kt_form';
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
        
    }
    $(form_name + ' .loading-post').hide();
}

function removeCampagnaImage(){
    var form_name = '#kt_form';
    $(form_name + ' .image-area img').attr('src', " ");
    $(form_name + ' .image-area').hide();
    resetFile($(form_name + ' .image-input'));
}


function saveCampagna(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL+'/campagna/save',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                if (response.type == 'save'){
                    $('#panel-post-'+id+' .save-text span').html('Unsave!');
                    //$('#panel-post-'+id+' .save-text i').removeClass('fa-heart-o').addClass('fa-heart');
                    document.querySelector('#panel-post-'+id+' .save-text i').id = 'fa-bookmark';
                    document.querySelector('#panel-post-'+id+' .save-text i').setAttribute("id", "fa-bookmark-o");
                    location.reload();
                }else{
                    $('#panel-post-'+id+' .save-text span').html('Saved!');
                    //$('#panel-post-'+id+' .save-text i').removeClass('fa-heart').addClass('fa-heart-o');
                    document.querySelector('#panel-post-'+id+' .save-text i').id = 'fa-bookmark-o';
                    document.querySelector('#panel-post-'+id+' .save-text i').setAttribute("id", "fa-bookmar");
                    location.reload();
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



function likeCampagna(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL+'/campagna/like',
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
                    $('#panel-post-'+id+' .like-text span').html('Unsave!');
                    //$('#panel-post-'+id+' .save-text i').removeClass('fa-heart-o').addClass('fa-heart');
                    document.querySelector('#panel-post-'+id+' .like-text i').id = 'fa-heart';
                    document.querySelector('#panel-post-'+id+' .like-text i').setAttribute("id", "fa-heart-o");
                    location.reload();
                }else{
                    $('#panel-post-'+id+' .like-text span').html('Saved!');
                    //$('#panel-post-'+id+' .save-text i').removeClass('fa-heart').addClass('fa-heart-o');
                    document.querySelector('#panel-post-'+id+' .like-text i').id = 'fa-heart-o';
                    document.querySelector('#panel-post-'+id+' .like-text i').setAttribute("id", "fa-heart");
                    location.reload();
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