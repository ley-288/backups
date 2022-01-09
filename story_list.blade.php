{{-- 10 SECONDI NEW STORIES --}}

@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('applicazione.campagne'))

@section('content') 

<style> 

video.loading {
  background: black url(assets/images/black_overlay.png) center center no-repeat;
}


#elementId{
    height:20px;
    overflow-y: scroll;
}

#button_lays .material-icons {
    font-size:40px;
}

#button_transparent_test{
    /* padding: 12px; */
    display: flex;
    border-radius: 15px;
    height: 80px;
    width: 80px;
    //-webkit-backdrop-filter: blur(15px);
    //backdrop-filter: blur(15px);
    background-color: transparent;
    align-items: center;
    justify-content: center;
}

#chevron_left_screen{
    position: absolute;
    height: 90vh;
    width: 100vw;
    display: flex;
    align-content: flex-start;
    align-items: flex-start;
    justify-content: flex-start;
    margin-left:10px;
}

    .im_pro{
        margin-top:0px !important;
    }

    @media screen and (max-width: 1024px) {

          body.modal-open {
        overflow: hidden !important;
        margin-top:6% !important;
    }

        #desktop_layout{
            margin-top:-50px;
        }

        #name_left_screen{
            position: absolute;
            display: flex;
            height: 80vh;
            width: 80vw;
            align-items: flex-start;
            align-content: center;
            justify-content: flex-end;
            flex-direction: column;
        }

        #headphones{
            pointer-events: none; 
            height:100vh; 
            width: 100vw;
            object-fit: cover;
            background-color: transparent;
            box-shadow: 2px 2px 10px 10px #f7f5f8;
        }

        .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
            justify-content:center !important;
        }

        .main-content{
            display: flex;
            justify-content: center;
        }

        .group-center{
            position: fixed;
            display: flex;
            justify-content: center;
            z-index:10;
        }

        .nav__link{
            color:white;
            background-color:black;
        }


        #mobile_header_style{
            display:none;
        }

        body{
            background:white;
        }

        #kt_body{
            margin-top:-40px;
        }

        .box-list_campaigns{
            margin-top:-20px;
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        #mobile_search_function{
            display:none;
        }

        .btn-group{
            //margin-top:-30px;
            //display:flex;
            //justify-content:center;
            //padding:15px;
            margin-top: -60px;
            height: 100px;
            display: flex;
            justify-content: center;
            padding: 15px;
            background-color: white;
            z-index:10;
        }
    
        #btn-secondary{
            border-radius:5px;
            border:2px solid #F7F5F8;
            padding-left:25px;
            padding-right:25px;
            padding-top:5px;
            padding-bottom:5px;
            //margin:1px;
            margin-top: 30px;
            color:black;
            box-shadow:none;
            background:white;
            display:flex;
            justify-content:center;
        } 

        #fixed_map_button{
            visibility:hidden;
            position:fixed;
            z-index:1;
            margin-left:-50px;
            margin-top:60vh;
            background-color:white;
            height:50px;
            padding:10px;
            border-radius:15px;
            box-shadow: 2px 2px 10px 10px lightgray;
            font-size:18px;
        }
        
    }


    @media screen and (min-width: 1024px) {

        #desktop_layout{
            margin-top:-90px;
            overflow-y:hidden;
        }

        #name_left_screen{
            position: absolute;
            margin-left:100px;
            display: flex;
            height: 90vh;
            width: 50vw;
            align-items: flex-start;
            align-content: center;
            justify-content: flex-end;
            flex-direction: column;
        }

        #headphones{
            pointer-events: none; 
            height:100vh; 
            width: 40vw;
            object-fit: cover;
            background-color: transparent;
        }

        .side_2{
            margin-top:20px;
        }

        .side_2:hover{
            margin-top:20px;
        }

        .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
            justify-content:center !important;
        }

        body{
            background-color:white;
        }

        #margin-top_boxes{
            margin-top:70px;
        }

        .group-center{
            display:flex;
            justify-content:center;
        }

        .btn-group{
            position:absolute;
            margin-top:-30px;
            display:flex;
            justify-content:center;
            padding:15px;
            margin-bottom:20px;
        }
    
        #btn-secondary{
            border-radius:5px;
            border:2px solid #F7F5F8;
            margin:3px;
            color:black;
            box-shadow:none;
        }   

        .box-list_campaigns{
            display: flex;
            align-content: center;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            width: 90vw;
        }

        #fixed_map_button{
            display:none;
        }

    }

</style>



<div style="overflow-y:hidden; background-color:black; color:black; margin-top: -80px;">
</br>
</br>
@if($stories)
    @foreach($stories as $story)

    {{ $story->story_id }}
        <div style="overflow:hidden; display: flex;justify-content: center;height: 101vh; width:100vw; margin-top: -10px; flex-direction: column;align-content: center;flex-wrap: wrap;"  id="panel-post-{{ $story->story_id }}" >       
            </br>
            @if ((str_contains($story->image_path, 'MOV') == 1) || (str_contains($story->image_path, 'mp4') == 1))
            <div class='slider-item'>
                
                <video id="headphones" src="https://www.spidergain.com/storage/stories/{{ $story->image_path }}"  preload loop autoplay muted playsinline poster="{{url('/')}}/assets/images/black_overlay.png"> {{--#t=0,10--}}     
                
            </div>

            <div id="flash-heart" style="display:none;">
            <div style="position: absolute;height: 100vh;width: 100vw;display: flex;justify-content: center;align-items: center;align-content: center;">
                <i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:200px; opacity: 0.5;" class="material-icons nav__icon">favorite</i>
            </div>
            </div>

            <div id="flash-heart-broken" style="display:none;">
            <div style="position: absolute;height: 100vh;width: 100vw;display: flex;justify-content: center;align-items: center;align-content: center;">
                <i style="background-image: linear-gradient(#2b54e7f2, #2be0e7);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:200px; opacity: 0.5;" class="material-icons nav__icon">heart_broken</i>
            </div>
            </div>
            
            <div id="flash-volume" style="display:none;">
            <div style="position: absolute;height: 100vh;width: 100vw;display: flex;justify-content: center;align-items: center;align-content: center;">
                <i style="color:white; font-size:200px; opacity: 0.5;" class="material-icons nav__icon">volume_up</i>
            </div>
            </div>
{{--
             <div id="chevron_left_screen"> 
                <a href="{{ URL::previous() }}">
                    <i style="font-size:40px; color:white;" class="material-icons nav__icon">chevron_left</i>
                </a>          
            </div>
--}}
                <div id="name_left_screen">
                       
                        <p style="font-size: 12px; background-color: transparent; color:white; padding:10px;"> <strong style="font-size:16px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{ str_limit($story->username, 30) }}</strong></br> {{str_limit($story->user->profession, 30)}} </br> {{$story->user->bio}} </p>
                        
                </div>

            <div id="button_lays" style="position: fixed;display: flex;justify-content: flex-end;align-items: flex-end;flex-direction: column;flex-wrap: nowrap;width: 100vw; height:80vh; align-content: flex-end;">
            
            
            <a id="button_transparent_test" href="{{ url('/social/'. $story->username) }}">
                
                    @if($story->avatar_location != '')
                        <img style="height:50px; width:50px; border-radius:100%; border:1px solid white; margin-right:0px;" src="{{asset('storage/'.$story->avatar_location)}}"> 
                    @else
                        <img style="height:50px; width:50px; border-radius:100%; border:1px solid white; margin-right:0px;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Attive">
                    @endif
            </a>

            <a id="button_transparent_test" href="#" data-toggle="modal" data-target="#menuModal-{{$story->id}}">
                <i class="material-icons nav__icon" style="color: white">more_horiz</i>
            </a>

            <a id="button_transparent_test"  href="{{url('/')}}/10secondi/list">
                <i class="material-icons nav__icon" style="color: white">playlist_play</i>
            </a>
            
                <div class="save-box">
                    <a id="button_transparent_test" href="javascript:;" onclick="saveStory({{$story->story_id}})" class="save-text">   
                        @if($story->checkSaves($user->id))
                            <i id="fa-heart" style="color: white;" class="material-icons nav__icon" id="bookmark">favorite</i>
                        @else
                            <i id="fa-heart" style="color: white;" class="material-icons nav__icon" id="bookmark">favorite_border</i>
                        @endif          
                    </a>
                </div>
                
            <a id="button_transparent_test" href="#" onclick="toggleMute();">
                <i id="icona" class="material-icons nav__icon" style="color: white">volume_off</i>
            </a>
            <a id="button_transparent_test" href="">
                <i class="material-icons nav__icon" style="color: white;font-size:50px;">skip_next</i>
            </a>
            </div>
            @endif
        </div> 
    @endforeach
@else

    10 secondi

@endif
</div>

@if($stories)
@foreach($stories as $story)
<div class="modal fade" id="menuModal-{{ $story->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
</br></br>
      <div style="display: flex;font-weight: bold;justify-content: center;align-content: center;    border: 2px solid #F7F5F8; border-radius:5px;">
        <div style="font-weight:bold;">
             <a id="button_transparent_test" href="{{ url('/social/'.$story->user->id) }}" style="display: flex;justify-content: center;align-items: center;width: 10vw; color:black">
                <i id="icon" class="material-icons nav__icon" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; margin-right:10px;">account_circle</i> Profilo
            </a>
        </div>
        </div>
    </br></br>
      <div style="display: flex;font-weight: bold; justify-content: center;align-content: center;   border: 2px solid #F7F5F8; border-radius:5px;">
        <div style="font-weight:bold;">
             <a id="button_transparent_test" href="#" data-toggle="modal" data-target="#reportModal-{{$story->id}}" style="display: flex;justify-content: center;align-items: center;width: 10vw; color:black">
                <i id="icon" class="material-icons nav__icon" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; margin-right:10px;">report</i> Segnala
            </a>
        </div>
        </div>
        @if($story->user_id == Auth::user()->id)
        </br></br>
         <div style="display: flex;font-weight: bold;justify-content: center;align-content: center;   border: 2px solid #F7F5F8; border-radius:5px; ">
        <div style="font-weight:bold;">
             <a id="button_transparent_test" href="#" data-toggle="modal" data-target="#deleteModal-{{$story->id}}" style="display: flex;justify-content: center;align-items: center;width: 10vw; color:black">
                <i id="icon" class="material-icons nav__icon" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; margin-right:10px;">delete</i> Cancella
            </a>
        </div>
        </div>
        </br>
        @if(!empty(Auth::user()->getAddress()))
         <div style="display: flex;font-weight: bold;justify-content: center;align-content: center;   border: 2px solid #F7F5F8; border-radius:5px; ">
        <div style="font-weight:bold;">
             <a id="button_transparent_test" href="{{ url('/10secondi/aziende') }}"  style="display: flex;justify-content: center;align-items: center;width: 10vw;color:black">
                <i id="icon" class="material-icons nav__icon" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; margin-right:10px;">search</i> Aziende
            </a>
        </div>
        </div>
        @endif
        @endif
</div>
        </br>
           
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reportModal-{{ $story->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">Segnala</h5>
      </div>
      <div class="modal-body">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            Sei sicuro?
        </div>
        </br>
            <form action="{{ url('story/report') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="story_id" name="story_id" value="{{$story->story_id}}">
                <textarea id="reason" name="reason" placeholder="Motivo?.." style="padding: 10px;border: 2px solid #F7F5F8;"></textarea>
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                </br>
            </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal-{{ $story->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">Cancella</h5>
      </div>
      <div class="modal-body">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            Sei sicuro?
        </div>
        </br>
            <form action="{{ url('story/delete') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="story_id" name="story_id" value="{{$story->story_id}}">
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">delete</i> Cancella</button>
                </br>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif


<script>

function toggleMute() {

var video=document.getElementById("headphones")

if(video.muted){
	video.muted = false;
   document.getElementById("icona").innerHTML ="volume_up";
} else {
	video.muted = true;
    document.getElementById("icona").innerHTML ="volume_off";
}

}
</script>

@push('after-scripts')
<script>

var pStart = { x: 0, y: 0 };
var pStop = { x: 0, y: 0 };

function swipeStart(e) {
  if (typeof e["targetTouches"] !== "undefined") {
    var touch = e.targetTouches[0];
    pStart.x = touch.screenX;
    pStart.y = touch.screenY;
  } else {
    pStart.x = e.screenX;
    pStart.y = e.screenY;
  }
}

function swipeEnd(e) {
  if (typeof e["changedTouches"] !== "undefined") {
    var touch = e.changedTouches[0];
    pStop.x = touch.screenX;
    pStop.y = touch.screenY;
  } else {
    pStop.x = e.screenX;
    pStop.y = e.screenY;
  }

  swipeCheck();
}

function swipeCheck() {
  var changeY = pStart.y - pStop.y;
  var changeX = pStart.x - pStop.x;
  if (isPullDown(changeY, changeX)) {
    //alert("Swipe Up!");
    location.reload();
  }
  if (isPullUp(changeY, changeX)) {
    //alert("Swipe Down!");
    location.reload();
  }
}

function isPullUp(dY, dX) {
  // methods of checking slope, length, direction of line created by swipe action
  return (
    dY < 0 &&
    ((Math.abs(dX) <= 300 && Math.abs(dY) >= 100) ||
      (Math.abs(dX) / Math.abs(dY) <= 60 && dY >= 0.3))
  );
}


function isPullDown(dY, dX) {
  // methods of checking slope, length, direction of line created by swipe action
  return (
    dY > 0 &&
    ((Math.abs(dX) <= 100 && Math.abs(dY) >= 300) ||
      (Math.abs(dX) / Math.abs(dY) <= 0.3 && dY >= 60))
  );
}

document.addEventListener(
  "touchstart",
  function (e) {
    swipeStart(e);
  },
  false
);
document.addEventListener(
  "touchend",
  function (e) {
    swipeEnd(e);
  },
  false
);


</script>

<script>
$(function() {
 
    setTimeout(function() {
        $('video').removeAttr('poster');
    }, 5000);
});

</script>


<script>

$("#icona").click(function(){ 
    $("#flash-volume").css({'display': 'contents'}).fadeIn(100).fadeOut(100);
});

</script>

@endpush
@endsection