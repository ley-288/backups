{{-- Home/Cerca Campagne--}}


<style>
.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    display:block;
}

    body {
        font-family: sans-serif;
        display: grid;
        height: 100vh;
        place-items: center;
    }

    .base-timer {
        position: relative;
        width: 300px;
        height: 300px;
    }

    .base-timer__svg {
        transform: scaleX(-1);
    }

    .base-timer__circle {
        fill: none;
        stroke: none;
    }

    .base-timer__path-elapsed {
        stroke-width: 7px;
        stroke: grey;
    }

    .base-timer__path-remaining {
        stroke-width: 7px;
        stroke-linecap: round;
        transform: rotate(90deg);
        transform-origin: center;
        transition: 1s linear all;
        fill-rule: nonzero;
        stroke: currentColor;
    }

    .base-timer__path-remaining.green {
        color: rgb(65, 184, 131);
    }

    .base-timer__path-remaining.orange {
        color: orange;
    }

    .base-timer__path-remaining.red {
        color: red;
    }

    .base-timer__label {
        position: absolute;
        width: 300px;
        height: 300px;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
    }

Resources

    iframe{
        display:block;
        pointer-events: none;
        margin-left:auto;
        margin-right:auto;
    }

    .im{  
        position: relative;    
        z-index: 1;       
    }

    {{-- full screen --}}
    @media screen and (min-width: 1024px) {

        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 10px;
            }

        .fa-facebook {
            content: url('/assets/media/icons/socialbuttons/facebook.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-twitter {
            content: url('/assets/media/icons/socialbuttons/twitter.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-instagram {
            content: url('/assets/media/icons/socialbuttons/instagram.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-youtube {
            content: url('/assets/media/icons/socialbuttons/youtube.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-linkedin {
            content: url('/assets/media/icons/socialbuttons/linkedin.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-tiktok {
            content: url('/assets/media/icons/socialbuttons/tiktok.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }

        .fa-laptop {
            content: url('/assets/media/icons/socialbuttons/laptop.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-envelope-open-text {
            content: url('/assets/media/icons/socialbuttons/envelope.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-users{
            content: url('/assets/media/icons/socialbuttons/event.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-desktop{
            content: url('/assets/media/icons/socialbuttons/envelope.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-newspaper{
            content: url('/assets/media/icons/socialbuttons/newspaper.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-store{
            content: url('/assets/media/icons/socialbuttons/shop.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }

        #lock{
            display: block;
            color: white;
            margin-left: 13px;
            }

        .im{
            height: 20px;
            width: 20px;
            border-radius: 35px;
            margin-left: auto;
            margin-right: auto     
            }
    
        #para_desc{
            height: 90px;
            padding:2px;
            margin-left: 10px;
            font-size: 14px;
            text-align: left;
            }
    
        #vai_btn{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            background-color:#e72b38;
            border-radius: 30px;
            border:1px solid #e72b38;
            width: 200px;
            }
    
        #vai_btn:hover{
            transform: scale(1.2);
            }
    
        #border_box{
            border:1px solid transparent;
            border-radius:25px;
            margin-top: 20px;
            margin-right: 15px; 
            height:520px;  
            background-color:white;
            }
    
        #border_box:hover{
            transition:0.2s;
            transform: scale(1.1);
            }
    
        iframe{
            display:table;
            margin-left:auto;
            margin-right:auto;
            }
    }


    {{-- mobile --}}
    @media screen and (max-width: 1024px) {

        #space_between_campagne_and_top{
            margin-top:-10px;
            }

        body{
            scroll-snap-type: y mandatory;
            }
   
        .page-link{
            margin-bottom:80px;
            }
   
        #lock{
            display: block;
            color: white;
            margin-left: 13px;
            }

        .im{
            height: 20px;
            width: 20px;
            border-radius: 20px;   
            margin-left: auto;
            margin-right: auto;  
            }
    
        #border_box{
            border:1px solid #E8E8E8;
            margin-top:-20px;
            margin-left:-20px; 
            height:500px;
            width:110%; 
            background-color:white;
            margin-bottom:50px;
            background-color:white;
            }
        
        #border_box_2{
            border:1px solid #E8E8E8;
            margin-top:-20px;
            margin-left:-20px; 
            height:500px;
            width:110%; 
            background-color:white;
            margin-bottom:50px;
            background-color:white;
            }
    
        #para_desc{
            height: 90px;
            padding:10px;
            margin-left: 13px;
            }  
    
        #vai_btn{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            background-color:#e72b38;
            border-radius: 30px;
            border:1px solid #e72b38;
            width: 200px;
            }
    
        iframe{
            margin-left:20%;
            }
    
        .fa-facebook {
            content: url('/assets/media/icons/socialbuttons/facebook.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-twitter {
            content: url('/assets/media/icons/socialbuttons/twitter.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-instagram {
            content: url('/assets/media/icons/socialbuttons/instagram.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-youtube {
            content: url('/assets/media/icons/socialbuttons/youtube.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-linkedin {
            content: url('/assets/media/icons/socialbuttons/linkedin.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-tiktok {
            content: url('/assets/media/icons/socialbuttons/tiktok.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        
        .fa-users{
            content: url('/assets/media/icons/socialbuttons/event.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }

        .fa-newspaper{
            content: url('/assets/media/icons/socialbuttons/newspaper.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }

        .fa-store{
            content: url('/assets/media/icons/socialbuttons/shop.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            
        .fa-laptop {
            font-size: 1.2em;
            color:black;
            }
        .fa-envelope-open-text {
            font-size: 1.2em;
            color:black;
            }

    }

    .im:hover{
        cursor: pointer;
    }

</style>



<div style="overflow-x:hidden;" class="col-xl-6 col-lg-6">
    <div id="border_box_2" style="border-radius:25px;" class="kt-portlet kt-portlet--height-fluid" >  
      
        <div class="kt-portlet__head kt-portlet__head--noborder">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                </h3>
            </div>
        </div>
        
        <div class="kt-portlet__body"> 
            <div class="kt-widget kt-widget--user-profile-2">
                <div class="kt-widget__head">
                    @if(isset($campagna->users))
                    <div class="kt-widget__media">
                        
                        <span class="kt-userpic kt-userpic--xl">
                                                <img class="kt-widget3__img" src="{{url('/')}}/assets/media/icons/definitive_s.png" style="max-width:80px; max-height:80px; margin-top:0px; margin-left:10px;border-radius: 50px; box-shadow: 4px 4px 4px 4px #F7F5F8" alt="">

                           {{-- <img class="kt-widget3__img" src='/assets/media/icons/socialbuttons/user.png' style="margin-top:0px; margin-left:10px; border-radius: 50px; box-shadow: 4px 4px 4px 4px #F7F5F8;" alt=""> --}}
                        </span>
                        
                    </div>
                    @endif
                    <div class="kt-widget__info">
                        <p class="kt-widget__titel" style="text-align:center; font-size:20px; font-weight: bold; color: red; text-transform:capitalize;">
                            BENVENUTO!
                        </p>
                    </div>
                </div>
                
                
                </br>
                
                
                <div class="kt-widget__body">
                    <div id="para_desc" class="kt-widget__section" style="text-align: center;">
                      BENVENUTO IN SPIDERGAIN</br>
                      PER CONOSCERE I PRODOTTI E I SERVIZI DELLE AZIENDE</br>
                      REGISTRATI E CREA ORA IL TUO PROFILO SU SPIDERGAIN</br>
                      START YOUR WEB CAMPAIGN!<br>
                       </br>
                    </div>
                
                    </br>

                   {{-- 
                   @if(isset($campagna->canali_view))
			        <div style="background-color: transparent; height: 30px; margin: 0 auto; display: table;">
    				@foreach($campagna->canali_view as $item)
      					<span class="badge badge-sm badge-light" style="background-color:transparent; height:40px; width:40px;"><i class="{{$item['icon']}}"></i></span>                                           
    				@endforeach 
			        </div>
	
                    @endif 
                     --}}               
                </div>

 		        
            
               <div class="kt-widget__footer">
                    <a href="https://www.spidergain.com/register" class="btn btn-success btn-lg btn-upper" id="vai_btn">{{('Registrati Ora!')}}</a>
                </div>
                          
            </div>
        </div>
    </div> 
</div>


</br>




{{-- SECOND BLOCK --}}

<div class="col-xl-6 col-lg-6">

    <!--Begin::Portlet-->

    <div style="margin-top:0px; border-radius:25px;" class="kt-portlet kt-portlet--height-fluid 
         @if(isset($campagna->cerca))
         @if (!isset($campagna->vista) )
         green
         @endif 
         @endif
         "id="border_box">
         @if(isset($campagna->cerca))
         @if (!isset($campagna->vista))
        <span class="badge badge-success badge-sm badge-absolute" style="margin-right: 20px; margin-top: 8px;">@lang('Nuova')</span>
        @endif 
        @endif
        <div class="kt-portlet__head kt-portlet__head--noborder">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">

            <!--begin::Widget -->
            <div class="kt-widget kt-widget--user-profile-2">
                <div class="kt-widget__head">
                    @if(isset($campagna->users))
                    <div class="kt-widget__media">
                        @if($campagna->users->avatar_location)


                        <span class="kt-userpic kt-userpic--xl">
                            <img class="kt-widget3__img" src="{{asset('storage/'.$campagna->users->avatar_location)}}" style="margin-top:0px; margin-left:10px;border-radius: 50px; box-shadow: 4px 4px 4px 4px #F7F5F8" alt="">
                        </span>
                        @else
                        <img class="kt-widget3__img" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="max-width:80px; max-height:80px; margin-top:0px; margin-left:10px;border-radius: 50px; box-shadow: 4px 4px 4px 4px #F7F5F8" alt="">
                        @endif
                    </div>
                    @endif
                    <div class="kt-widget__info">
                        <p class="kt-widget__titel" style="text-align:center; font-size:20px; font-weight: bold; color: #5568DA; text-transform:capitalize;">
                        {{Str::limit(strip_tags($campagna->titolo),15)}}
                            {{--{{$campagna->titolo}}--}}
                        </p>
                        

                    </div>
                    
                </div>
                </br>
                
                   <div class="kt-widget__body">
                    <div id="para_desc" class="kt-widget__section">
                       {{Str::limit(strip_tags($campagna->descrizione),80,'...')}}<br>
                       </br>
                         </div>

                                <div style="display:table; margin-left:auto; margin-right:auto;" id="budget_durata">
                                    <h6>
                                      
                                        @if(!empty($campagna->durata) && !empty($campagna->budget))
                                        <strong>@lang('applicazione.durata'):</strong>
                                        {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}
                                        
                                        -
                                    
                                        <strong>@lang('applicazione.budget'):</strong>
                                        {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                                        @endif



                                        @if(empty($campagna->durata) && !empty($campagna->budget))
                       
                                        <strong>@lang('applicazione.budget'):</strong>
                                        {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                                        @endif



                                        @if(!empty($campagna->durata) && empty($campagna->budget))
                                        <strong>@lang('applicazione.durata'):</strong>
                                        {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}

                                        @endif
                                       
                                    </h6>
                                </div>

                                    <div style="display:table; margin-left:auto; margin-right:auto;" class="kt-widget__item flex-fill">
                                        <span class="kt-widget__date">
                                            &nbsp;{{__('applicazione.fine_campagna_box')}}
                                        </span>
                                        <div style="display:table; margin-left:auto; margin-right:auto;" class="kt-widget__label">
                                            <span style="border-radius:25px;" class="btn btn-label-danger btn-sm btn-bold btn-upper">{{date('d/m/Y',strtotime($campagna->data_fine))}}</span>
                                        </div>
                                    </div>
                    
                    </br>
                    
                    
                    @if(isset($campagna->canali_view))
                    
                    
                                        
<div style="display:block; background-color: white; height: 40px;  margin: 0 auto; display: table;">
    @foreach($campagna->canali_view as $item)
      <span class="badge badge-sm badge-light" style="background-color:transparent;float:center; height:40px; width:40px;"><i class="{{$item['icon']}}"></i></span>                                            
    @endforeach 
</div>

                    @endif
           
                    
                </div>
    
            
                  <div class="kt-widget__footer">
                    <a href="https://www.spidergain.com/register" class="btn btn-success btn-lg btn-upper" id="vai_btn">{{__('Registrati Ora!')}}</a>
                    
                </div> 
               
            </div>

            <!--end::Widget -->
        </div>
    </div>

    <!--End::Portlet--> 
</div>


<script>

// Credit: Mateusz Rybczonec

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 200;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}





Resources

</script>  
