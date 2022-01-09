
$(function() {



    fetchPeopleList();
    setInterval(function(){

        fetchPeopleList();
        fetchNewMessages();

    }, 1000);
    setInterval(function(){

        var id = $('.chat input[name=chat_friend_id]').val();
        $('.dm .friends-list .friend').removeClass('active');
        $('.dm .friends-list #chat-people-list-'+id).addClass('active');

    }, 1);



});


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

function fetchPeopleList(){

    $.ajax({
        url: BASE_URL + '/direct-messages/people-list',
        type: "POST",
        timeout: 5000,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                $('.dm .friends-list .alert').remove();
                $('.dm .friends-list').html(response.html);
                if (initial_dm == 0) {
                    showFirstChat();
                    initial_dm = 1;
                }
            }
        },
        error: function () {

        }
    });

}

function fetchNewMessages(){

    var id = $('.chat input[name=chat_friend_id]').val();

    if (id > 0){


        var data = new FormData();
        data.append('id', id);

        $.ajax({
            url: BASE_URL + '/direct-messages/new-messages',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: function (response) {
                if (response.code == 200) {
                    if (response.find == 1) {
                        $('.dm .chat .message-list .alert').remove();
                        $('.dm .chat .message-list').append(response.html);
                        $(".dm .chat .message-list").animate({scrollTop: $('.dm .chat .message-list').prop("scrollHeight")}, 1000);
                    }
                }
            },
            error: function () {

            }
        });
    }

}

function showFirstChat(){
    var id = $('.dm input[name=people-list-first-id]').val();
    console.log(id);
    if (id > 0){
        showChat(id);
    }
}


function showChat(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/direct-messages/chat',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function (response) {
            if (response.code == 200) {
                $('.dm .chat').html(response.html);
                $('#userListModal').modal('hide');
                $(".dm .chat .message-list").animate({ scrollTop: $('.dm .chat .message-list').prop("scrollHeight")}, 0);
            }else{
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


function sendMessage(e){

        var id = $('#form-message-write input').val();
        var message = $('#form-message-write textarea').val();

       

        if (message.trim() != '') {
            var data = new FormData();
            data.append('id', id);
            data.append('message', message);

            $.ajax({
                url: BASE_URL + '/direct-messages/send',
                type: "POST",
                timeout: 5000,
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function (response) {
                    if (response.code == 200) {
                        $('.dm .chat .message-list .alert').remove();
                        $('#form-message-write textarea').val("");
                        $('.dm .chat .message-list').append(response.html);
                        $(".dm .chat .message-list").animate({ scrollTop: $('.dm .chat .message-list').prop("scrollHeight")}, 1000);
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

        return false;
        console.log('message');
   
}



function deleteChat(id){

    BootstrapDialog.show({
        title: 'Chat Delete!',
        message: 'Sei sicuro di voler cancellare questo conversazione?',
        buttons: [{
            label: "Si, sono sicuro!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL+'/direct-messages/delete-chat',
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
                            $('.dm .chat').html(" <p style='padding: 20px;'> Chat deleted! </p> ");
                            $('#chat-people-list-'+id).remove();
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

function deleteMessage(id){

    BootstrapDialog.show({
        title: 'Message Delete!',
        message: 'Sei sicuro di voler cancellare questo messaggio?',
        buttons: [{
            label: "Si, sono sicuro!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL+'/direct-messages/delete-message',
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
                            $('.dm .chat #chat-message-'+id).remove();
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

function likeMessage(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL+'/direct-messages/like',
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
                    $('#chat-message-'+id+' .like-text span').html('Unlike!');
                    $('#chat-message-'+id+' .like-text i').removeClass('fa-heart-o').addClass('fa-heart');
                }else{
                    $('#chat-message-'+id+' .like-text span').html('Like!');
                    $('#chat-message-'+id+' .like-text i').removeClass('fa-heart').addClass('fa-heart-o');
                }
                if (response.like_count > 1){
                    $('#chat-message-'+id+' .all_likes span').html(response.like_count+' likes');
                }else{
                    $('#chat-message-'+id+' .all_likes span').html(response.like_count+' like');
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


function showLikes(id){

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/direct-messages/likes',
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


function uploadMessageImage(){
    var form_name = '#messageImage  #form-new-message';
    $(form_name+' .image-input').click();
}

function previewMessageImage(input){
    var form_name = '#messageImage  #form-new-message';
    $(form_name + ' .loading-post').show();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(form_name + ' .image-area img').attr('src', e.target.result);
            $(form_name + ' .image-area').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
    $(form_name + ' .loading-post').hide();
}

function removeMessageImage(){
    var form_name = '#messageImage  #form-new-message';
    $(form_name + ' .image-area img').attr('src', " ");
    $(form_name + ' .image-area').hide();
    resetFile($(form_name + ' .image-input'));
}

function newMessage(){
    
        var id = $('#friend_id').val();
        var message = $('#personal_message').val();
	//var image		
        var data = new FormData();
            //data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
            console.log("enter");
        var file_inputs = document.querySelectorAll('.image-input');
        console.log(file_inputs);

        $(file_inputs).each(function(index, input) {
            data.append('image', input.files[0]);
        });

        //if (message.trim() != '') {
            //var data = new FormData();
            data.append('id', id);
            data.append('message', message);

            $.ajax({
                url: BASE_URL + '/direct-messages/send',
                type: "POST",
                timeout: 5000,
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function (response) {
                    if (response.code == 200) {
                        $('.dm .chat .message-list .alert').remove();
                        //$('#form-message-write textarea').val("");
                        $('#form-new-message textarea').val("");
                        $('.dm .chat .message-list').append(response.html);
                        $(".dm .chat .message-list").animate({ scrollTop: $('.dm .chat .message-list').prop("scrollHeight")}, 1000);
                        $("#image-remove-button-modal").click();
                        $('#messageImage').modal('hide');
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
        
        //}

        return false;
        console.log('message');

}
