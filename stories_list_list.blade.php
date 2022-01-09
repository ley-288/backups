{{-- LIST OF LIKED STORIES --}}

@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('10 Secondi'))

@section('content') 

<style>


#snap {
  overflow: scroll;
  height: 100vh;
  scroll-snap-points-y: repeat(100vh);
  scroll-snap-type: y mandatory;
}

#snap .part {
  height: 100vh;
  scroll-snap-align: start;
  position: relative;
}

video.loading {
  background: black url(assets/images/black_overlay.png) center center no-repeat;
}


body.modal-open {
    overflow: hidden !important;
    margin-top:8% !important;
}

.vid-size{
/* 	padding: 0;
	margin: 0; */
	    height: 80vh;
    width: 95vw;
	background-size: cover;
	overflow: hidden;
}
.modal-content {
    height:50vh;
   width: 95vw;
  border:none;
}
.modal-body {
   padding: 0;
}

.modal{
    background:transparent;
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    background-image:url;
}


.modal-header{
    border-bottom:none;
}
.modal-footer{
    border-top:none;
}


#lay_name{
    position:absolute;
  display: flex;
    //align-items: center;
    flex-wrap: nowrap;
    flex-direction: column;
    width: 90vw;
    height:75vh;
    font-size:20px;
    justify-content: flex-end;
}

#button_lays_horiz .material-icons {
    font-size:35px;
}

#button_lays_horiz{
    //width:70vw;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    flex-direction: column;
    flex-wrap: nowrap;
    /* width: 100vw; */
    /* height: 70vh; */
    align-content: center;
    //margin: 10px;
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

    .im_pro{
        margin-top:0px !important;
    }

    

    @media screen and (max-width: 1024px) {

      #desktop_layout{
        margin-top:0px;
      }

        #snap{
            margin-top:0px;
        }


        hr {
            border: 0;
            clear:both;
            display:block;
            width: 96%;   
            //background-color:#eee;            
            background-image: linear-gradient(to right, blue, #e72b38, #e72b80, yellow);
            height: 1px;
        }

        #video_fit{
            height:75vh;
            width: 90vw;
            object-fit: cover;
            background-color: transparent;
            border-radius:15px;
        }

       .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -55px;
        //box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
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
            //margin-top: -60px;
            //height: 100px;
            display: flex;
            justify-content: center;
            //padding: 15px;
            background-color: white;
            z-index:10;
            margin-top: 10px;
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

         #snap{
            margin-top:100px;
        }

        .row_1{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: nowrap;
            align-items: center;
            //margin-top: -55px;
            //box-shadow: 0 4px 2px -2px #F7F5F8;
            padding-bottom:20px;
        }

        hr {
            border: 0;
            clear:both;
            display:block;
            width: 50%;   
            //background-color:#eee;            
            background-image: linear-gradient(to right, blue, #e72b38, #e72b80, yellow);
            height: 1px;
        }

        #video_fit{
            height:450px;
            width: 300px;
            object-fit: cover;
            background-color: transparent;
            border-radius:15px;
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



<div style="width: 100vw;">
    <div class="row_1">
         <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            Salvate
          
        </div>
        <div>
            <i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px; margin-top: -5px;" class="material-icons nav__icon">favorite</i>
        </div>
    </div>

{{--
    <div style="display:flex;justify-content:center;">
    <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{url('/')}}/campagne/open"><button id="btn-secondary" class="btn btn-secondary btn-lg">
                    @if($user->avatar_location != '')
                        <img style="height:26px; width:26px; border-radius:13px; margin-right:5px; border:1px solid lightgray; object-fit:cover;" class="im_pro" src="{{asset('storage/'.$user->avatar_location)}}" alt="Attive">
                    @else
                        <img style="height:26px; width:26px; border-radius:13px; margin-right:5px; border:1px solid lightgray;" class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Attive">
                    @endif
                        Attive</button></a>

            </div>
    </div>
--}}

    <div id="snap" >   
    @if($stories)
        @foreach($stories as $story)
            <div class="part" style="margin-top:30px; padding-bottom:10px; display: flex;border-radius: 15px;flex-direction: column;align-items: center;" id="panel-post-{{ $story->story_id }}" >       
                <div> 
                <a href="{{ url('/10secondi/single/'.$story->story_id) }}">
                    <video id="video_fit" src="https://www.spidergain.com/storage/stories/{{ $story->image_path }}#t=0.001"  preload autoplay loop muted playsinline poster="{{url('/')}}/assets/images/black_overlay.png"> {{--#t=0,10--}}        
                </a>
                </div>
            <div id="lay_name">
                <div id="button_lays_horiz">
                    <a id="button_transparent_test" href="{{ url('/social/'. $story->username) }}">
                        @if($story->avatar_location != '')
                            <img style="height:35px; width:35px; border-radius:100%;border: 2px solid white;" src="{{asset('storage/'.$story->avatar_location)}}"> 
                        @else
                            <img style="height:35px; width:35px; border-radius:100%; border: 2px solid white;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Attive">
                        @endif
                    </a>
                    <a id="button_transparent_test" href="{{ url('/direct-messages/show/'. $story->user_id) }}">
                        <i class="material-icons nav__icon" style="background-image: linear-gradient(#87e756, #67e102);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">maps_ugc</i>
                    </a>
                    <div class="save-box">
                        <a id="button_transparent_test" href="javascript:;" onclick="saveStory({{$story->story_id}})" class="save-text">              
                            <i id="fa-heart" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon" id="bookmark">favorite</i>          
                        </a>
                    </div>
                    <a id="button_transparent_test" href="{{ url('/10secondi/single/'.$story->story_id) }}">
                        <i class="material-icons nav__icon" style="background-image: linear-gradient(#D472DF, #f110a6);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">play_circle_filled</i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        </br>
        </br>
        </br>  
    @endforeach
    </div>
    </br>
    </br>
@else

@endif
</div>


@push('after-scripts')

<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>

<script>
$('video').on('loadstart', function (event) {
    $(this).addClass('loading');
  });
  $('video').on('canplay', function (event) {
    $(this).removeClass('loading');
    $(this).attr('poster', '');
  });
</script>
@endpush

@endsection