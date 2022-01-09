
$(function() {


    messageNotifications();
    setInterval(function(){

        messageNotifications();

    }, 100000);



});


function messageNotifications(){

    $.ajax({
        url: BASE_URL + '/direct-messages/notifications',
        type: "POST",
        timeout: 5000,
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.code == 200) {
                $('.direct-messages-notification').html(response.html);
            }
        },
        error: function () {

        }
    });

}