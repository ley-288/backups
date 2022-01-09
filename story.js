


function uploadStoryImage(){
    var form_name = '#form-new-story';
    $(form_name+' .image-input').click();
}

/*
function previewStoryImage(input){
    var form_name = '#form-new-story';
    $(form_name + ' .loading-story').show();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(form_name + ' .image-area-story img').attr('src', e.target.result);
            $(form_name + ' .image-area-story').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
    $(form_name + ' .loading-story').hide();
}
*/


const getVideoDuration = (file) =>
  new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => {
      const media = new Audio(reader.result);
      media.onloadedmetadata = () => resolve(media.duration);
    };
    reader.readAsDataURL(file);
    reader.onerror = (error) => reject(error);
  });

const previewStoryImage = async (input, e) => {
    const duration = await getVideoDuration(e.target.files[0]);
   
    if(duration >= 11.00){
        console.log('val1',document.getElementById('fileUp').value)
        document.getElementById('fileUp').value = ''
        console.log('val2',document.getElementById('fileUp').value)
        $('#story_overlay').css('visibility', 'hidden');
        
        alert("il video deve essere di 10 secondi o meno")
        return
    }
    
    var form_name = '#form-new-story';
    $(form_name + ' .loading-post').show();
    if (input.files && input.files[0]) {
        
	
        var reader = new FileReader();
        reader.onload = function (e) {
		var fileType = input.files[0]["type"];
		var validImageTypes = ["audio/ogg", "video/mp4", "video/webm", "video/x-flv", "video/quicktime", "video/ogg"];
		if ($.inArray(fileType, validImageTypes) < 0) {
		     	$(".image_or_video_preview").html("<img src='"+e.target.result+"'>");
		}else{
			$(".image_or_video_preview").html("<video id='upload_video_preview' preload loop autoplay muted playsinline> <source src='"+e.target.result+"' /></video>");
		}
            $(form_name + ' .image-area-story img').attr('src', e.target.result);
            $(form_name + ' .image-area-story').show();
        };

        reader.readAsDataURL(input.files[0]);
        
    }
    $(form_name + ' .loading-post').hide();
    
}

function removeStoryImage(){
    var form_name = '#form-new-story';
    $(form_name + ' .image-area-story img').attr('src', " ");
    $(form_name + ' .image-area-story').hide();
    resetFile($(form_name + ' .image-input'));
}

function cleanStoryForm(){
    var form_name = '#form-new-story';
    $(form_name + ' textarea').val('');
    removeStoryImage();
}

function newStory(){
    var form_name = '#form-new-story';

    $(form_name + ' .loading-story').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');


    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/stories/new',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            if (response.code == 200){
                cleanStoryForm();
                $(form_name + ' .loading-story').hide();
                $('.story-list-top-loading').show();
                
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
                $(form_name + ' .loading-story').hide();
            }
        },
        error: function(){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-story').hide();
        }
    });

}

function newStoryModal(){
    var form_name = '#storyModal #form-new-story';

    $(form_name + ' .loading-story').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');

    var content = $('#storyModal #form-new-story .content').val();
    data.append('content', content);
    var location = $('#storyModal #form-new-story .location').val();
    data.append('location', location);
    var link = $('#storynModal #form-new-story .link').val();
    data.append('link', link);


    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/stories/new',
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
                cleanStoryForm();
                $(form_name + ' .loading-story').hide();
                //$('.story-list-top-loading').show();
                //fetchForNewStories();
                    if (response.code == 200) {
                        $('#storyModal').modal('hide');
                        setTimeout(
                            function() 
                            {
                            location.reload();
                            }, 0001);    
                    }
            }else{
                $("#loading").hide();
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-story').hide();
            }
        },
        error: function(){
            $("#loading").hide();
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-story').hide();
        }
    });

}


function quickStory(){
    var form_name = '#story_overlay #form-new-story';

    $(form_name + ' .loading-story').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');

    //var content = $('#story_overlay #form-new-story .content').val();
    //data.append('content', content);
    //var location = $('#form-new-story .location').val();
    //data.append('location', location);
    //var link = $('#form-new-story .link').val();
    //data.append('link', link);


    $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

    $.ajax({
        url: BASE_URL+'/stories/quick',
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
                cleanStoryForm();
                $(form_name + ' .loading-story').hide();
                //$('.story-list-top-loading').show();
                //fetchForNewStories();
                    if (response.code == 200) {
                        $('#storyModal').modal('hide');
                        setTimeout(
                            function() 
                            {
                            location.reload();
                            }, 0001);
                        //location.href = "http://www.spidergain.com/10secondi/aziende";    
                    }
            }else{
                $("#loading").hide();
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-story').hide();
            }
        },
        error: function(){
            $("#loading").hide();
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-story').hide();
        }
    });

}

function editStorytModal(){
    var form_name = '#editstory #form-edit-story';

    $(form_name + ' .loading-story').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("edit story");

    var content = $('#editstory #form-edit-story .content').val();
    data.append('content', content);
    console.log("content");
    var location = $('#editstory #form-edit-story .location').val();
    data.append('location', location);
    console.log("location");
    var link = $('#editstory #form-edit-story .link').val();
    data.append('link', link);
    console.log("link");
    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

    $.ajax({
        url: BASE_URL+'/stories/update',
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
                cleanStoryForm();
                $(form_name + ' .loading-story').hide();
                //$('.story-list-top-loading').show();
                
                    if (response.code == 200) {
                        $('#storyedit').modal('hide');
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
                $(form_name + ' .loading-story').hide();
            }
        },
        error: function(){
            console.log("error 2");
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-story').hide();
        }
    });

}

function deleteStory(id){

    BootstrapDialog.show({
        title: 'Cancella!',
        message: 'Sei sicuro di voler cancellare il story? ?',
        buttons: [{
            label: "Si, sono sicuro!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL+'/stories/delete',
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
                            $('#panel-story-'+id).html('<div style="visibility:hidden;">.</div>');
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

function searchUserList() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("modal-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("modal-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


function saveStory(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL+'/story/save',
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
                  
                    $('#panel-post-'+id+' .save-box #fa-heart').html('favorite').css({"background-image": "linear-gradient(#e72b38, #e72b80)", "webkit-background-clip": "text", "-webkit-text-fill-color": "transparent"});
                    $("#flash-heart").css({'display': 'contents'}).fadeIn(100).fadeOut(100);
                    
                }else{
                    
                    $('#panel-post-'+id+' .save-box #fa-heart').html('heart_broken').css({"background-image": "linear-gradient(#2b54e7f2, #2be0e7)", "webkit-background-clip": "text", "-webkit-text-fill-color": "transparent"});
                    $("#flash-heart-broken").css({'display': 'contents'}).fadeIn(100).fadeOut(100);
                 
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
