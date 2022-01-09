@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('YouTube'))

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

    .fa-youtube {
            content: url('/assets/media/icons/socialbuttons/youtube.png');
            width: 100px;
            height: 100px;
            font-size: 1.1em;
            }

    img{
        max-height:35vh;
    }

    video{
        max-height:35vh;
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
            
            <i id="photo_icon_card_image" class="fab fa-youtube"></i>
           {{-- <i id="photo_icon_card_image" class="material-icons nav__icon">smart_display</i> --}}

            

        </div>
 
        <div class="panel panel-default new-post-modal">
            <div>
                <form style="overflow-x:hidden;" id="form-new-post">
                    <input type="hidden" name="group_id" value="">
                        <div class="image-area">
                        </div>
                        </br> 
                        <textarea style="margin-top:-10px; height:70px;" id="link" rows = '8' name="link" class="link"  placeholder="@lang('applicazione.condividi_qui_video')" onchange="loadUrl()"></textarea>  
                        <textarea id="iframe_content" style="margin-top:-10px; height:70px;" rows = '8' name="content" class="content" placeholder="@lang('applicazione.se_vuoi')"></textarea>
                        <textarea style="margin-top:-20px; height:60px;" id="hashtags" rows = '8' name='hashtags' placeholder='' readonly></textarea>
                        <textarea style="margin-top:-20px; height:60px;" id="tags" rows = '8' name='tags' placeholder='' readonly></textarea>              
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
                                <button id="tag_button" class="btn btn-default" type="button" data-toggle="modal" data-target="#tagUsersModal">
                                    <i id="post_icon_color" class="material-icons nav__icon">alternate_email</i>
                                </button>
                            </div>
                            <div>
                                <button  id="hashtag_button" class="btn btn-default" type="button" onclick="CopyToHashtagArea();">  
                                    <i id="post_icon_color" class="material-icons nav__icon">tag</i>
                                </button>
                            </div>
                           
                            <div>
                                <button class="btn btn-default" type="button" id="negative" disabled onclick="newPostModal();">
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
                        </br>  
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

document.getElementById("negative").readonly = true;

  $(document).ready(function () {
    $("#link").on("change paste keyup", function () {
                var text = $(this).val();
                if (text.length > 0) {
                    document.getElementById("negative").disabled = false;
                }
                else {
                    document.getElementById("negative").disabled = true;
                }
            });
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
    document.getElementById('iframe_content').removeAttribute('readonly');
  var txt = $("#iframe_content").val();
  $("#iframe_content").val(txt + "#");
}

//add

function CopyToTagArea(el){
  var text = el.textContent;
  var textarea = document.getElementById('tags');
  textarea.value = textarea.value + text;
}


function loadUrl() {
    var url = $('textarea#link').val();
    var myId = getId(url);
    $('.image_or_video_preview').html('<iframe style="width:80%" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>')    
}

function getId(url) {
    //OLD Code

    // var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|shorts\?v=|\&v=)([^#\&\?]*).*/;
    // var match = url.match(regExp);

    // if (match && match[2].length == 11) {
    //     return match[2];
    // } else {
    //     return 'error';
    // }
    
    //New Code that accept shorts also
    var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
    if(videoid != null) {
        videoid[1] = videoid[1].replace("shorts/", "");;
        return videoid[1];
    } else { 
        return 'The youtube url is not valid.';
    }
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
