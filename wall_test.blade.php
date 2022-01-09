@push('after-styles')
<style>

    .modal-header{
        border-bottom:none;
    }

    .modal-footer{
        border-top:none;
    }

    #About {background-color: transparent;}

    .fancybox-show-infobar .fancybox-infobar{
        display:none;
    }

    .fancybox-caption{
        display:none;
    }


@media screen and (max-width: 1024px){

    #stickytypeheader{
        width:100vw;
        background-color:white;
        z-index:100;
        //border-bottom: 2px solid #F7F5F8;
    }

    #Home {
        background-color: transparent;
        width:800px;
        flex-direction: column;
        flex-wrap: wrap;
        }

    #News {
        background-color: transparent;
        width: 800px;
        display: flex;
        place-content: center;
        flex-flow: column nowrap;
        align-items: flex-end;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        }

    #Contact {background-color: transparent;
        width: 800px;
        display: flex;
        place-content: center;
        flex-flow: column nowrap;
        align-items: center;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        }

    #new_photo_container{
        width:101vw;
        margin-left:0.9vw;
    }

    #new_profile_image {
        padding-top: 0.3vw;
        padding-bottom: 0.3vw;
        padding-left: 0.5vw;
        padding-right: 0.5vw;
        width: 34vw;
        height: 34vw;
        object-fit: cover;
    }

     #new_profile_video {
        padding-top: 0.3vw;
        padding-bottom: 0.3vw;
        padding-left: 0.5vw;
        padding-right: 0.5vw;
        width: 34vw;
        height: 34vw;
        object-fit: cover;
    }

    .tabcontent {
        //border-top: 2px solid #F7F5F8;
        color: white;
        display: none;
        height: 100%;
    }

    .tablink {
        background-color: transparent;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 14px;
        width: 25%;
    }

    .tablink_b {
        background-color: transparent;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 14px;
        width: 25%;
    }

    .tablink:hover {
        background-color: transparent;
    }

    .post-list {
        border-top: 2px solid #F7F5F8;
        margin-left: -15px;
        color:black;
    }

    #new_iframe_youtube{
        margin-bottom: 0px;
        margin-left: -10px;
        position: relative;
        width: 102vw;
        height: 35vh;
        padding-bottom: 0px;
        border: none;
    }

    .card_2{
        width:100px;
        margin-top:20px;
        margin-left: 100px;
        margin-bottom:100px;
        padding:20px;
    }

    #card-icon{
        display: flex;
        align-items: center;
        justify-content: center;
        font-size:50px;
    }
	
}

@media screen and (min-width: 1024px){

    #stickytypeheader{
        width:800px;
        background-color:white;
        z-index:100;
        //border-bottom: 2px solid #F7F5F8;
    }


    #Home {
        background-color: transparent;
        width:800px;
        flex-direction: column;
        flex-wrap: wrap;
        }

    #News {background-color: transparent;
        width: 800px;
        display: flex;
        place-content: center;
        flex-flow: column nowrap;
        align-items: flex-end;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        }

    #Contact {background-color: transparent;
        width: 800px;
        display: flex;
        place-content: center;
        flex-flow: column nowrap;
        align-items: center;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        }

    #new_photo_container{
        width:55vw;
        margin-left:-1vw;
    }

    #new_profile_image {
        padding-top: 0.3vw;
        padding-bottom: 0.3vw;
        padding-left: 0.5vw;
        padding-right: 0.5vw;
        width: 250px;
        height: 250px;
        object-fit: cover;
    }

    .tabcontent {
        display:flex;
        justify-content:center;
        color: white;
        display: none;
        height: 100%;
    }


    .tablink {
        border-top: 1px solid blue;
        margin-top: 0vh;
        margin-left: 0vw;
        background-color: transparent;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 14px;
        width: 25%;
    }

    .tablink_b {
        border-top: 1px solid lightgray;
        margin-top:0vh;
        background-color: transparent;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 14px;
        width: 25%;
    }

    .post-list {
        border-top: 1px solid #F7F5F8;
        margin-top: 70px;
        margin-left: -2vw;
        color:black;
        width:55.3vw;
    }

    #new_iframe_youtube{
        margin-bottom: 0px;
        position: relative;
        width: 800px;
        height: 55.3vh;
        padding-bottom: 0px;
        border: none;
    }

     .card_2{
        margin-top:20px;
        margin-bottom:100px;
        margin-left:-50px;
        padding:20px;
    }

    #card-icon{
        display: flex;
        align-items: center;
        justify-content: center;
        font-size:50px;
    }
	
}

</style>
@endpush

@if($can_see)

<div id="stickytypeheader">
    <button class="tablink" onclick="openPage('Home', this, 'transparent')" id="defaultOpen"><i class="material-icons nav__icon" id="ico_side">reorder</i></button>
    <button class="tablink" onclick="openPage('News', this, 'transparent')"><i class="material-icons nav__icon" id="ico_side">grid_on</i></button>
    <button class="tablink" onclick="openPage('Contact', this, 'transparent')"><i class="material-icons nav__icon" id="ico_side">smart_display</i></button>
    <button data-item="{{ $user->name }}" data-toggle="modal" data-target="#userShareModal-{{ $user->id }}" class="tablink_b"><i class="material-icons nav__icon" id="ico_side" style="color:#e72b38;">share</i></button>
</div>

<div id="Home" class="tabcontent">

<div class="post-list-top-loading">
    <img src="{{url('/')}}/assets/images/loading.gif" alt="">
</div>

<div class="post-list">
</div>

<div class="post-list-bottom-loading">
    <img src="{{url('/')}}/assets/images/loading.gif" alt="">
</div>
<div class="modal fade " id="likeListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h5 class="modal-title">Likes</h5>
            </div>
            <div class="user_list">
            </div>
        </div>
    </div>
</div>
</div>


<div id="News" class="tabcontent">

  
@if($my_profile)
  @if($photos->count() == 0)
  <div>
   <a href="{{url('/')}}/new/photo"><div class="card_2" style="width: 18rem; margin-bottom:100px;">
    <i class="material-icons nav__icon" id="card-icon" style="color:black">photo_camera</i>
    <div class="card-body">
    <p style="color:#0645AD; font-size:12px; text-align:center;" class="card-text">Condividi foto!</p>
  </div>
</div></a>
</div>
</br></br></br></br></br></br></br></br></br></br></br></br>
@endif
@endif

    <div id="new_photo_container">

  		@foreach($photos as $photo)
            @if ((str_contains($photo->image_path, 'MOV') == 0) && (str_contains($photo->image_path, 'mp4') == 0))
               <a data-fancybox="gallery" href="{{asset('storage/posts/'.$photo->image_path)}}" data-caption="{{ $user->username }}"><img id="new_profile_image" src="{{asset('storage/posts/'.$photo->image_path)}}" onload="previewPostImage(this)"></a>
            @endif
        @endforeach

        </br></br></br></br></br></br>
       
    </div>

</div>

<div id="Contact" class="tabcontent">

@if($my_profile)
  @if($socials->count() == 0)
   <a href="{{url('/')}}/new/iframe"><div class="card_2" style="width: 18rem;">
    <i class="material-icons nav__icon" id="card-icon" style="color:black">smart_display</i>
    <div class="card-body">
    <p style="color:#0645AD; font-size:12px; text-align:center;" class="card-text">Condividi video!</p>
  </div>
</div></a>
</br></br></br></br></br></br>
@endif
@endif

    <div id="new_photo_container">
  		@foreach($socials as $social)

            <?php

                $link = preg_replace(
                    "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                    "<iframe id='new_iframe_youtube' src=\"//www.youtube.com/embed/$2/\" allow='fullscreen;'></iframe>",
                    $social->link);

                    if (strpos($link, '</iframe>') !== false) {
                        echo $link;
                    }
            ?>
              
        @endforeach
        </br></br></br></br></br></br></br></br></br></br></br></br>
    </div>
  		
	</div>



<!-- Modal -->
  <div class="modal fade"  id="userShareModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">@if($user->hasRole('brand') || $user->company == 1){{$user->dettagli->azienda_nome}}@else{{$user->name}}@endif</h4>
        </div>
        <div class="modal-body" style="display: flex;justify-content: center;align-items: center;align-content: center;flex-wrap: nowrap;flex-direction: column;">

            @if($user->avatar_location) 
                <img src="{{asset('storage/'.$user->avatar_location)}}"  class="media-object img-circle" style="height: 80px; width:80px; border-radius:40px; object-fit:cover;"/>
            @else                              
                <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png"  class="media-object img-circle" style=" max-height: 80px; max-width:80px; border-radius:40px;"/>
            @endif
            </br>
            <p style="text-align:center;">Invita amici e colleghi a scaricare l'app di Spidergain, crea gruppi di lavoro, fai crescere i tuoi Spiders!</p>
            </br>

          <div id="user_modal_links">
                <div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap; align-content: center; padding:10px;">
                    <a href="javascript:void(0)" onClick='copyText(this)'><p style="display:none; font-size:1px;">{{ url('/solcial/'.$user->username) }}</p><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/copylink.png"></a>
                    <a href="#"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(' {{asset('storage/'.$user->avatar_location)}} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"></a>
                    <a href="#"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{asset('storage/'.$user->avatar_location)}}','Twitter-dialog','width=626,height=436'); return false; ismap"></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{asset('storage/'.$user->avatar_location)}}" target="_blank"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"></a>
                    <a href="https://api.whatsapp.com/send?text=www.spidergain.com/social/{{ $user->username }}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png"  alt="Share on Whatsapp"></a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<!-- Modal -->
<div id="locationModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div style="margin-left:0px;" id="new_post_box_height" class="panel panel-default new-post-modal">
        <div class="panel-body">
        <form style="overflow-x:hidden; width:100%;" id="form-new-post">
            <input type="hidden" name="group_id" value="{{ $wall['new_post_group_id'] }}">
                <div class="image-area">
                    <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                        <img src=""/>
                </div>

                </br>
                <textarea style="height:100px; width:100%; border-radius:25px;" rows = '4' name="content" class="content"  @if($user->posts()->where('group_id', 0)->count() == 2) placeholder="@lang('applicazione.post_il_post_primo')" @elseif($user->posts()->where('group_id', 0)->count() > 2 && $user->hasRole('influencer')) placeholder="@lang('applicazione.cosa_stai_pensando')" @else placeholder="@lang('applicazione.cosa_stai_pensando')" @endif></textarea>
                </br>
                <textarea style="height:100px; width:100%; border-radius:25px;" rows = '4' name="link" class="link"  placeholder="Condividi qui un link dal Youtube o Social media.."></textarea>
                </br>
                <textarea style="height:40px; width:100%;" rows = '2' name='location' class='form-control' placeholder='Location'></textarea>
                </br></br></br></br></br></br></br>

                    <div class="row">
                        <div class="col-xs-6">
                            <button id="big_image_button" type="button" class="btn btn-default btn-add-image btn-sm" onclick="uploadPostImage()">
                                <i id="image_button_id_logo" class="material-icons md-12">photo_camera</i>
                            </button>
                                <input type="file" class="image-input" name="photo" onchange="previewPostImage(this)">
                        </div>

                        <button id="big_close_button" type="button" class="btn btn-default btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                <i id="image_button_id_logo" class="material-icons md-12">close</i>
                        </button>
              
                        <div class="col-xs-4">
                            <button id="big_post_button" type="button" class="btn btn-primary pull-right btn-submit" onclick="newPostModal();">
                                <i id="post_button_id_logo" class="material-icons md-12">send</i>
                            </button>
                        </div>
                        <div style="border-radius:25px; background-color:transparent;" id="loading">
                            {{--<img id="loading-image" src="{{url('/')}}/assets/images/loading.gif" alt="Loading..." />--}}

                            <img id="loading-image" src="{{asset('storage/'.$user->avatar_location)}}" alt="Loading..." />
                        </div>
                    </div>

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
        </form>
        </div>
    </div>
    </div>
  </div>
</div>
@else

</br>
</br>
 <div class="new_row">
        <div style="display:flex; justify-content:center;">
        <i style="font-size:30px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">lock</i>
        </div>
        </br>
        <p style="font-size:20px; text-align:center; color:black;" class="card-text">This profile is private</p>
        <p style="font-size:12px; text-align:center;color: black;" class="card-text">Follow to see their activity</p>
        </br>
        <a style="display:flex; justify-content:center;" href="#" data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}">
            <i style="font-size:50px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">more_horiz</i>
        </a>
        </div> 
    </div>


@endif



</br></br></br></br></br></br></br></br></br></br></br>

<script>

function refreshPage(){
    window.location.reload();
} 

</script>


<script>
function openPage(pageName, elmnt, color) {

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  document.getElementById(pageName).style.display = "flex"; 
  elmnt.style.backgroundColor = color;

}

document.getElementById("defaultOpen").click();


function copyText(element) {
    var range, selection, worked;

    if (document.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(element);
        selection.removeAllRanges();
        selection.addRange(range);
    }

    try {
        document.execCommand('copy');
        alert('link copiato!');
    }
    catch (err) {
        alert('unable to copy text');
    }
}

</script>


@push('after-scripts')
<script>
if ($(window).width() < 1024) {
$(function(){
        var stickyHeaderTop = $('#stickytypeheader').offset().top - 45;
        
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop) {
                        $('#stickytypeheader').css({position: 'fixed', top: '45px'});
                        $('#sticky').css('display', 'block');
                        $('.tablink').css('margin-top', '25px');
                        $('.tablink_b').css('margin-top', '25px');
                } else {
                        $('#stickytypeheader').css({position: 'static', top: '45px'});
                        $('#sticky').css('display', 'none');
                }
        });
  });

}

</script>


@endpush