@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Photo'))

@section('content')

<style>

    body{
        background-color:white;
    }

    body.modal-open {
        overflow: hidden !important;
        margin-top:-6% !important;
    }

    .btn.btn-default {
        background: white;
        color: black;
        //background-image: linear-gradient(#e72b38, #e72b80);
        border: 2px solid #F7F5F8;
        margin-right:5px;
        margin-top:6px;
        border-radius:7px;
    }

    .btn.btn-default:hover{
        background-color:white;
    }

    #post_icon_color{
        color:black;
       
        padding:5px;
    }

    #desktop_layout{
        margin-top:-18vh;
    }

    #mobile_search_function{
        display:none;
    }

    img{
        max-height:36vh;
    }

    video{
        max-height:36vh;
    }

    #tagUsersModal{
        //margin-top:100px;
        //height:90vh;
    }

    #modal_avatar{
        height:40px;
        width:40px;
        margin-right:10px;
        margin-bottom:10px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
    }

    .modal-header{
        border-bottom:none;
    }

    #modal-table{
        margin-left:20px;
        height:40vh;
    }

    @media screen and (max-width: 1024px) {

      #mobile_header_style{
        display:none;
      }
        
        .image_or_video_preview{
            height:36vh;
            width:100vw;
            object-fit:cover;
            background:#F7F5F8;
            display:flex;
            justify-content:center;
        }

        #photo_icon_card_image{
            margin-top:10vh;
            color:gray;
            font-size:80px;
        }

        textarea{
            border-radius:0px !important;
            width:100vw !important;
        }

        #button_container{
            border-top: 2px solid #F7F5F8;
            background-color: transparent;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            display: flex;
            flex-direction: row;
            justify-content: center;
            height:45px;
            margin-left:3vw;
            margin-top:8vh;
            margin-bottom:1vh;
        }

        #modal_profile_btn{
            margin-left:60vw;
            margin-top:-50px;
        }
    }

    @media screen and (min-width: 1024px) {

        .side_2{
            margin-top:100px;
        }

        .side_2:hover{
            margin-top:100px;
        }

        .image_or_video_preview{
            margin-top:5vh;
            height:36vh;
            width:50vw;
            object-fit:cover;
            background:#F7F5F8;
            display:flex;
            justify-content:center;
        }

        #photo_icon_card_image{
            margin-top:10vh;
            color:gray;
            font-size:80px;
        }

        textarea{
            border-radius:0px !important;
            width:50vw !important;
            margin-left:-5px !important;
        }

        #button_container{
            border-top: 2px solid #F7F5F8;
            background-color: transparent;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            display: flex;
            flex-direction: row;
            justify-content: center;
            height:45px;
            margin-left:3vw;
            margin-bottom:1vh;
        }

        #modal_profile_btn{
            margin-left:45vw;
            margin-top:-40px;
        }
    }

    #loadOverlay{display: none;}
	
</style>

    <div id="locationModal">
   
        <div class="image_or_video_preview">
            <i id="photo_icon_card_image" class="material-icons nav__icon">photo_camera</i>
        </div>
    
 
        <div class="panel panel-default new-post-modal">
            <div>
                <form style="overflow-x:hidden;" id="form-new-post">
                    <input type="hidden" name="group_id" value="">
                        <div class="image-area">
                           
                        </div>
                        </br>   
                        <textarea id="photo_content" style="margin-top:-10px; height:70px;" rows = '8' name="content" class="content" @if($user->hasRole('influencer')) placeholder="@lang('applicazione.cosa_stai_pensando')" @else placeholder="@lang('applicazione.cosa_stai_pensando')" @endif></textarea>
                        <textarea style="margin-top:-20px; height:60px;" id="hashtags" rows = '8' name='hashtags' placeholder='' readonly></textarea>
                        <textarea style="margin-top:-20px; height:60px;" id="tags" rows = '8' name='tags' placeholder='' readonly></textarea>    
                        <textarea style="margin-top:-20px; height:60px;" id="locazioni" rows = '2' name='location' class="form-control location-input" placeholder='' value="" ></textarea>                                      
                        <input type="hidden" value="" class="map-info" name="map_info" id="map_info">
                        </br>
                        @if($user->id == 274)
                        <div style="display:flex; padding-bottom:20px;" id="influencer_azienda_boxes">
                            <div style="padding-right:20px;" class="azienda_box_yes">
                                <label for="azienda" class="">azienda</label>
                                <input type="checkbox" name="azienda" value="1" id="azienda_box" @if(['azienda'] == 1){{ 'checked' }}@endif>
                            </div>
                            <div class="influencer_box_yes">
                                <label for="influencer" class="">influencer</label>
                                <input type="checkbox" name="influencer" value="1" id="influencer_box" @if(['influencer'] == 1){{ 'checked' }}@endif>
                            </div>
                        </div>  
                        @endif  
                        </br>
                        <div id="button_container">

                             <div>
                                <button class="btn btn-default" type="button" onclick="uploadPostImage()">
                                    
                                    <i id="post_icon_color" class="material-icons nav__icon">photo_camera</i>
                                </button>
                                <input type="file" class="image-input" name="photo" onchange="previewPostImage(this)">
                            </div>
                            
                            <div>
                                <button id="tag_button"  class="btn btn-default" type="button" data-toggle="modal" data-target="#tagUsersModal">
                                    <i id="post_icon_color" class="material-icons nav__icon">alternate_email</i>
                                </button>
                            </div>
                            <div>
                                <button id="hashtag_button"  class="btn btn-default" type="button" onclick="CopyToHashtagArea();">  
                                    <i id="post_icon_color" class="material-icons nav__icon">tag</i>
                                </button>
                            </div>
                            
                            <div class="findMyLocation">
                                <a href="javascript:;" onclick="findPostLocation({{ $user->id }})"> 
                                    <div class="btn btn-default">
                                        <i id="post_icon_color" class="material-icons nav__icon">location_on</i>
                                    </div>
                                </a>
                            </div>
                        
                           
                            <div>
                                <button class="btn btn-default" disabled type="button" onclick="newPostModal();">
                                    <i id="post_icon_color" class="material-icons nav__icon">send</i>
                                </button>
                            </div>

                            <div style="border-radius:25px; background-color:transparent;" id="loading">
                                <img id="loading-image" src="{{url('/')}}/assets/images/loading.gif" alt="Loading..." />
                            </div>  
                </form>
            </div>
        </div>
    </div>
                    
                
        <div class="modal fade" id="tagUsersModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div style="border-radius:15px;" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="no_show_new_message" class="modal-title">Tags</h5>
                        </div>
                        <div class="user_list">
                            <div class="form-group">
                                <input style="border-radius:15px; width:90%; margin-left:20px;" type="text" class="form-control" id="modal-search" onkeyup="searchUserList()" placeholder="@lang('applicazione.cerca_contatti')">
                            </div>
                        </br>
                        <div class="modal-body">
                        <table id="modal-table">
                        @foreach($user_list_chats->get() as $f)
                            <tr>
                                <td>
                                <div>
                                    @if($f->follower->avatar_location)
                                        <img id="modal_avatar" src="{{asset('storage/'.$f->follower->avatar_location)}}" class="img-circle"/>
                                    @else
                                        <img id="modal_avatar" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="img-circle"/>
                                    @endif
                                
                                    <a href="#" onclick="CopyToTagArea(this); tageduser(this);">{{ $f->follower->username }}
                                    </a>
                                    <a href="{{ url('/social/'.$f->follower->username) }}">
                                    <div id="modal_profile_btn">
                                        <button class="btn btn-default">Profilo</button>
                                    </div>
                                    </a>
                                </div>
                                </br> 
                                </td>
                            </tr>
                        @endforeach            
                        </table>
                        </div>
                        </div>
                        </br>  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button> 
                        </br>  
                        </br>  
                        </br>  
                    </div>
                </div>
            </div>
        </div>





</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script>

$('input:file').on("change", function() {
    $('button').attr('disabled',false);
});

function tageduser(element){
  $(element).closest("tr").addClass("hide");
}

document.getElementById('tag_button').onclick = function() {
    document.getElementById('tags').removeAttribute('readonly');
};

function CopyToTextarea(el){
  var text = el.textContent;
  var textarea = document.getElementById('post_text_area');
  textarea.value = textarea.value + text;
}


function CopyToHashtagArea() {
    document.getElementById('photo_content').removeAttribute('readonly');
  var txt = $("#photo_content").val();
  $("#photo_content").val(txt + "#");
}

//add

function CopyToTagArea(el){
  var text = el.textContent;
  var textarea = document.getElementById('tags');
  textarea.value = textarea.value + text + ' ';
  
}

//remove

function CopyToTagArea(el){
  var text = el.textContent,                           // get this <a> text
      textarea = document.getElementById('tags'),  // textarea id
      textareaValue = textarea.value,                  // text area value
      Regex = new RegExp(text + ' ', 'g'),            // make new regex with <a> text and \n line break 
      textareaValue = textareaValue.indexOf(text+' ') > -1 ?  textareaValue.replace(Regex, '') : textareaValue + text+' '; // this is something similar to if statement .. mean if the textarea has the <a> text and after it line break .. replace it with its line break to blank (remove it) .. if not its not on textarea add this <a> text to the textarea value
  textarea.value = textareaValue ;                     // change the textarea value with the new one
}

</script>

<script>
    $(".ignore-click").click(function(){
        return false;
    });
</script>


@endsection


@push('after-scripts')


<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>

@endpush
