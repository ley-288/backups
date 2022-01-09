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


function removeUserFromGroup(id,groupId){

    BootstrapDialog.show({
        title: 'User Delete!',
        message: 'Are you sure you want to remove this user ?',
        buttons: [{
            label: "Yes, I'm Sure!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);
                data.append('groupId', groupId);


                $.ajax({
                    url: BASE_URL+'/group/{id}/delete/group',
                    type: "POST",
                    timeout: 5000,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {'X-CSRF-TOKEN': CSRF},
                    success: function(response){
                        dialog.close();
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



function groupPostModal(){
	
    var form_name = '#groupPost #form-new-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();console.log(data);
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));
    console.log("enter");
    var file_inputs = document.querySelectorAll('.image-input');

    var content = $('#group #form-new-post .group_id').val();
    data.append('group_id', group_id);
    var content = $('#group #form-new-post .content').val();
    data.append('content', content);
    var location = $('#group #form-new-post .location').val();
    data.append('location', location);
    var link = $('#group #form-new-post .link').val();
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
                        //window.location = url; 
                        location.reload();  
                        
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