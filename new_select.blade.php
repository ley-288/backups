@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Choose'))

@section('content')

@push('after-styles')

<style>


 body.modal-open {
        overflow: hidden !important;
        margin-top:16.5% !important;
    }

#fake_card{
        display: flex;
    flex-direction: row;
    width: 100px;
    height:200px;
    align-items: center;
    align-content: center;
    justify-content: center;
    flex-wrap: nowrap;
    text-align:center;
    font-size: 14px;
}

.card-img-overlay {
  background-color: #f7f5f8;
  opacity:0.8;
  box-shadow: 2px 2px 10px 10px #f7f5f8;
}


#button_transparent_test{
    display: flex;
    border-radius: 15px;
    height: 80px;
    width: 80px;
    //-webkit-backdrop-filter: blur(15px);
    //backdrop-filter: blur(15px);
    background-color: transparent;
    align-items: center;
    justify-content: center;
    box-shadow:none;
    border:none;
}

body{
    //overflow-y:hidden !important;
}

.btn.btn-default.active, .btn.btn-default:active, .btn.btn-default:hover, .show>.btn.btn-default {
    color: #fff;
    background: transparent;
    border-color: transparent;
}

 @media screen and (max-width: 1024px) {

     .image-area-story{
        position:fixed; background-color: black; height: 100vh; width: 100vw; margin-top:-80px; z-index: 21474835;
    }

     #story_overlay{
         position:absolute; visibility:hidden; background-color:black; height:100vh; width:100vw;
     }

     #button_lays{
         z-index: 99999999999; position: fixed;display: flex;justify-content: flex-end;align-items: flex-end;flex-direction: column;flex-wrap: nowrap;width: 100vw; height:80vh; align-content: flex-end;
     }

   #story_post_btn{
        position: absolute;
        z-index: 999999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:flex-end;
   }

   #post_story_button{
     border:none;
     font-size:16px;
     background-color:#D472DF;
     padding:10px;
     color:white;
     border-radius:100%;
     width: 50px;
   }

   #story_close_btn{
        position: absolute;
        z-index: 999999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:flex-end;
        margin-top: -100px;
   }

   #close_story_button{
     border:none;
     font-size:16px;
     background-color:#E92635;
     padding:10px;
     color:white;
     border-radius:100%;
     width: 50px;
   }

   #play_over_btn{
        position: absolute;
        z-index: 999999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:flex-start;
        height:60px;
        width:60px;
        margin-left:40px;
   }

   #avatar_over_btn{
        position: absolute;
        z-index: 99999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:flex-start;
        height:60px;
        width:60px;
        border-radius:30px;
        object-fit:cover;
        border:2px solid white;
   }

    #name_over_btn{
        position: absolute;
        z-index: 99999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        color:white;
        border-radius:5px;
        margin-left: 70px;
    font-weight: bold;
    padding: 10px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
        background-color: transparent;
   }

    audio, canvas, progress, video {
        display: inline-block;
        vertical-align: baseline;
        height: 100vh;
        width: 100vw;
        background-color: black;
    }

      #mobile_header_style{
        display:none;
    }

     #desktop_layout{
         margin-top:0px;
     }

    #kt_body{
        position:inherit;
        margin-top:-30px;
    }

    #mobile_search_function{
        display:none;
    }

    body{
        //background-image: url(/assets/media/icons/angryimg-2.png);
        background-repeat: repeat-x;
        background-color:white;
    }

    .card-title{
        font-size:16px;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0px;
    }

    .card-img-top_avatar{
        border-radius:25px;
        height:50px;
        width:50px;
        margin-top:10px;
        margin-bottom:10px; 
    }

    .card-img-top{
        border-radius:20px;
        height:40px;
        width:40px;
        margin-top:10px;
        margin-bottom:10px; 
    }

    .card h5{
        width:50vw;
    }

    #color_white{
        color:white;
    }

    .new_row{
        margin-top:-30px;
        margin-left: 0px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-content: center;
        align-items: center;
    }

    .card-deck .card {
        display: flex;
        margin: 10px;
        width: 35vw;
        height: 35vw;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        border-radius: 15px;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
    }

    .card-deck {
        margin-top:3vh;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        width:80vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }
}

@media screen and (min-width: 1024px) {


    .image-area-story{
        position:fixed; height: 100vh; width: 100vw; margin-top:-80px; z-index: 21474835;
    }

     #story_overlay{
         position:absolute; visibility:hidden; height:100vh; width:100vw;
     }

     #button_lays{
         z-index: 99999999999; position: fixed;display: flex;justify-content: flex-end;align-items: flex-end;flex-direction: column;flex-wrap: nowrap;height:80vh; align-content: flex-end;
     }


    body{
        background-color:white;
    }

    #story_post_btn{
        position: absolute;
        z-index: 999999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:center;
   }

   #post_story_button{
     border:none;
     font-size:16px;
     background-color:#D472DF;
     padding:10px;
     color:white;
     border-radius:100%px;
     width: 80px;
   }

    #play_over_btn{
        position: absolute;
        z-index: 999999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:flex-start;
        height:60px;
        width:60px;
        margin-left:40px;
   }

   #avatar_over_btn{
        position: absolute;
        z-index: 99999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        justify-content:flex-start;
        height:60px;
        width:60px;
        border-radius:30px;
        object-fit:cover;
        border:2px solid white;
   }

    #name_over_btn{
        position: absolute;
        z-index: 99999999999999999999999999999999999999;
        box-shadow:none;
        border:none;
        display:flex;
        color:white;
        border-radius:5px;
        margin-left: 110px;
    font-weight: bold;
    padding: 10px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
        background-color: transparent;
   }

    audio, canvas, progress, video {
    display: inline-block;
    vertical-align: baseline;
    height: 110vh;
    width: 50vw;
    //-webkit-backdrop-filter: blur(15px);
    //backdrop-filter: blur(15px);
        background-color: black;
    margin-top: -50px;
    }

    .card-img-top_avatar{
        border-radius:35px;
        height:70px;
        width:70px;
        margin-top:10px;
        margin-bottom:10px; 
    }

    .card{
        border:none;
        background-color:transparent;
        color:black;
        margin-top:20vh;
        border-radius: 15px;
    }

    .card-title{
        font-size:18px;
    }

    #color_white{
        margin-left:-40px;
    }

    .card h5{
        width:50vw;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:40px;
        max-width:40px;
        margin-top:5px;
        margin-bottom:10px;
    }

    .new_row{
     margin-top:-50px;
         margin-left: 0px;
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .card-deck .card {
        display: flex;
        margin: 10px;
        width: 40vw;
        height: 10vw;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
    }

    .card-deck {
      margin-top:20px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn-block{
        display:flex;
        justify-content: flex-start;
        margin-left:15vw;
        color:black;
        width:30vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }

}

</style>

@endpush

<div style="display:flex;justify-content:center;">
    
   <div class="new_row">
        
        @if($user->avatar_location != '')
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
         @else
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
        @endif
        </br>
        <p style="font-size:20px; text-align:center; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text">Ciao, {{ $user->first_name }}!</p>
        <p style="font-size:12px; text-align:center;color: black;" class="card-text">Posti qualcosa? </p>
        </div> 
    </div>

<div class="card-deck">
  <a href="{{url('/')}}/new/photo"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/camera.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Foto / Video</h5>
      <p class="card-text"><small class="text-muted">Condividi una foto</small></p>
    </div>
  </div></a>

  <a href="{{url('/')}}/new/check-in"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/gmaps.png" style="box-shadow: 2px 2px 10px 10px #F7F5F8;" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Check-In</h5>
      <p class="card-text"><small class="text-muted">La tua posizione</small></p>
    </div>
  </div></a>

  {{--<a href="{{url('/')}}/new/instagram"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/instagram.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Instagram</h5>
      <p class="card-text"><small class="text-muted">Condividi un post</small></p>
    </div>
  </div></a>
  <a href="{{url('/')}}/new/quickpost"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/tiktok.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">TikTok</h5>
      <p class="card-text"><small class="text-muted">Scrivi qualcosa</small></p>
    </div>
  </div></a>
  <a href="{{url('/')}}/new/quickpost"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Facebook</h5>
      <p class="card-text"><small class="text-muted">Scrivi qualcosa</small></p>
    </div>
  </div></a>--}}

 <a href="{{url('/')}}/new/iframe"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">YouTube</h5>
      <p class="card-text"><small class="text-muted">Condividi un video</small></p>
    </div>
  </div></a>
  
   
  <a href="{{url('/')}}/new/quickpost"><div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/lightning.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Quickpost</h5>
      <p class="card-text"><small class="text-muted">Scrivi qualcosa</small></p>
    </div>
  </div></a>

   


  {{--
  @if($user->staff == 1)<a href="#" onclick="uploadStoryImage()">@else<a href="#">@endif
  <div class="card">
    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/play.png" alt="Card image cap">
    <div class="card-body">

      <h5 class="card-title">10 Secondi</h5>
      <p class="card-text"><small class="text-muted">Coming Soon</small></p>
    </div>
  </div></a>
  --}}

@if($user->company != 1)
 {{--@if($user->staff == 1)<a href="#" onclick="uploadStoryImage()">@else<a href="#">@endif<div class="card">--}}
 <a href="#" data-toggle="modal" data-target="#secondiModal"><div class="card">
    <img class="card-img-top"  src="{{url('/')}}/assets/media/icons/socialbuttons/play.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">10 Secondi</h5>
      <p class="card-text"><small class="text-muted">Coming Soon</small></p>
    </div>
  </div></a>
  
@else
        <div class="card">
        <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/play.png" alt="Campagna">
        <div class="card-body">
          <h5 class="card-title">10 Secondi</h5>
          <p class="card-text"><small class="text-muted">Coming Soon</small></p>
        </div>
        <div class="card-img-overlay d-flex flex-column justify-content-center" style="padding:10px;">
        <div class="card-body">
          <h5 class="card-title"></h5>      
          <p class="card-text" style="color:black; font-size:10px;">Puoi creare video di 10 secondi visibili alle aziende solo con l'account da influencer</p>
        </div>
        </div>
      </div>
@endif

  @if($user->hasRole('brand') || $user->company == 1)
  <a href="{{url('/')}}/campagne/crea"><div class="card">
    <img class="card-img-top"  style="box-shadow: 2px 2px 10px 10px #F7F5F8; border:1px solid #F7F5F8;"src="{{url('/')}}/assets/media/icons/socialbuttons/suitcase.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Campagna</h5>
      <p class="card-text"><small class="text-muted">Nuova Campagna</small></p>
    </div>
  </div></a>
  
  @else

        <div class="card">
        <img class="card-img-top" style="box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/suitcase.png" alt="Campagna">
        <div class="card-body">
          <h5 class="card-title">Campanga</h5>
          <p class="card-text"><small class="text-muted">Nuova Campagna</small></p>
        </div>
        <div class="card-img-overlay d-flex flex-column justify-content-center" style="padding:10px;">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text" style="color:black; font-size:10px;">Se sei azienda, portrai creare le tue campagne gratuite passando all'account business</p>
        </div>
        </div>
      </div>


  @endif
  
</div>
    </br>
    </br>
    </br>
  
</div>




<div id="story_overlay">
   
    <form id="form-new-story">
        <input type="hidden" value="">
        <div class="image-area-story" style="">  
            <div class="image_or_video_preview">
            </div>    
        </div> 
        <input style="visibility:hidden;" type="range" min="24" max="72" value="24" step="24" class="slider" name="expire_hours" id="expire_hours">
        <input style="visibility:hidden;" type="file" accept="video/*" id="fileUp" capture class="image-input" name="photo" onchange="previewStoryImage(this,event)">
        

        <div id="button_lays" style="">
         <a id="button_transparent_test" href="{{ url('/social/'. $user->username) }}">
                
                @if($user->avatar_location != '')
                        <img style="height:50px; width:50px; border-radius:100%; border:1px solid white; margin-right:0px;" src="{{asset('storage/'.$user->avatar_location)}}"> 
                    @else
                        <img style="height:50px; width:50px; border-radius:100%; border:1px solid white; margin-right:0px;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Attive">
                    @endif
            </a>
            <a href="{{url('/')}}/newpost" id="button_transparent_test">
                <i class="material-icons nav__icon" style="color: white; font-size:40px;">cancel</i>
            </a> 
           <a id="button_transparent_test" href="#" onclick="toggleMute2();">
                <i id="iconi" class="material-icons nav__icon" style="color: white; font-size:40px;">volume_off</i>
            </a>
            
            <a id="button_transparent_test" onclick="quickStory();">
                <i class="material-icons nav__icon" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:36px;">send</i>
            </a>  

            
            </div>
                <div style="border-radius:25px; background-color:transparent;z-index: 10000000000000;" id="loading">
                    <img id="loading-image" src="{{url('/')}}/assets/images/loader.gif" alt="Loading..." />
                </div>  
    </form>
</div>


<!-- Modal -->
<div class="modal fade" id="secondiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div style="display:flex;justify-content: space-around;">
            <div id="fake_card">
                <a href="#" onclick="uploadStoryImage()" style="color:black" >
                    <img style="max-height: 80px;max-width: 80px;" src="{{url('/')}}/assets/media/icons/socialbuttons/film.png" alt="Campagna">
                    </br></br>
                    Crea
                </a>
            </div>
            @if($my_story)
                <div id="fake_card">
                    <a href="{{ url('/10secondi/single/'. $my_story) }}" style="color:black" >
                        <img style="max-height: 80px;max-width: 80px;" src="{{url('/')}}/assets/media/icons/socialbuttons/play.png" alt="Campagna">
                        </br></br>
                            Vedi
                    </a>
                </div>

                <div id="fake_card">
                    <a href="{{ url('/10secondi/aziende/') }}" style="color:black" >
                        <img style="max-height: 80px;max-width: 80px;" src="{{url('/')}}/assets/media/icons/socialbuttons/search.png" alt="Campagna">
                        </br></br>
                            Aziende
                    </a>
                </div>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@endsection

@push('after-scripts')
<script>

$('input:file').on("change", function() {
    $('#story_overlay').css('visibility', 'visible');
    $('.nav__link').css('color', 'white');
    $('.nav__link').css('background-color', 'black');
});

</script>

<script>
function toggleMute2() {

var video=document.getElementById("upload_video_preview")

if(video.muted){
	video.muted = false;
   document.getElementById("iconi").innerHTML ="volume_up";
} else {
	video.muted = true;
    document.getElementById("iconi").innerHTML ="volume_off";
}

}
</script>
@endpush
