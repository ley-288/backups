@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('New'))

@section('content')


<style>

    .modal {
    //margin-top:45vh;
    //height:50vh;
    //width:110vw;
    }

    .modal-header{
        border-bottom:none;
    }


    .btn.btn-default.active, .btn.btn-default:active, .btn.btn-default:hover, .show>.btn.btn-default{
        background:transparent;
        border:none;
    }   

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
    }

    .header {
        text-align: center;
        padding: 32px;
    }

    .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
    }

    .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
        display:flex;
        flex-direction: column;
    }

    #loadOverlay{display: none;}

    .findMyLocation{
	    text-align: center;
        margin: 10px 0;
    }	

    @media screen and (min-width: 1100px){

        body{
            background-color:white;
            }

        .slidecontainer {
            width: 50%;
            }

        .slider {
            margin-top:100px;
            margin-left:-10px;
            -webkit-appearance: none;
            width: 50%;
            height: 5px;
            border-radius: 5px;
            background: black;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            }   

        .slider:hover {
            opacity: 1;
            }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
            }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
            }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
            width:100%;
            }

        .col-lg-6{
            width:100%;
            }

        .btn.btn-default {
            background: transparent;
            border: none;
            box-shadow: none;
            }

        audio, canvas, progress, video {
            display: inline-block;
            vertical-align: baseline;
            height: 100%;
            width: 100%;
            }
                     
        .image-area-story{
            position: fixed;
            max-height: 700px;
            max-width: 350px;
            float:center;
            margin-left:15%;
            }

        .image-area{
            position: relative;
            width: 100vw;
            margin-top:15px;
            }

        #button_locale{
           display: flex;
    justify-content: center;
    align-items: flex-end;
    flex-direction: column;
    flex-wrap: nowrap;
    margin-top: 70vh;
    margin-right: -10vw;
        }

        #story_send_btns{
            
            position: fixed;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
            
            }

    }

    @media screen and (max-width:1100px) and (min-width:700px){

        #content_txt_story{
            color:white; background-color:transparent; font-size:24px; margin-left:20px; height:150px; width:70vw; border-radius:25px; padding:10px; border:none;font-weight: bold;
            }

        #location_txt_story{
            color:white; background-color:transparent; font-size:24px;  margin-left:20px; height:40px; width:70vw; border-radius:25px; padding:10px; border:none;font-weight: bold;
            }

        #user_btn_story{
            margin-top:100px; margin-left:76vw; height:50px; width:50px; border:3px solid white; border-radius:25px;
            }

        #foto_btn_story{
            margin-top:-400px; margin-left:75vw;
            }

        #close_btn_story{
            margin-top:-250px; margin-left:75vw;
            }

        #post_btn_story{
            margin-top:-100px; margin-left:75vw;
            }

        #story_send_btns{
            position:fixed;
            bottom:0;
            }
         
    } 

    @media screen and (max-width: 700px){

        .im_pro{
            margin:0px !important;
        }

        .nav_mobile{
            display:none;
        }

        body{
            background-color:black;
            }

        .slidecontainer {
            width: 70%;
            }

        .slider {
            margin-top:20px;
            margin-left:-10px;
            -webkit-appearance: none;
            width: 60%;
            height: 5px;
            border-radius: 5px;
            background: white;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            }

        .slider:hover {
            opacity: 1;
            }   

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: white;
            cursor: pointer;
            }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: white;
            cursor: pointer;
            }

        .column {
            -ms-flex: 100%;
            flex: 100%;
            max-width: 100%;
            }

        .kt-header-mobile{
            display:none !important;
            }
  
        .nav__link--active{
            background-color:black;
            }


        .kt-container{
            overflow-x:clip;
            }
         
        .col-lg-6{
            width:100%;
            }

        .kt-container{
            padding:0;
            }

        .btn.btn-default {
            background: transparent;
            border: none;
            box-shadow: none;
            }

        audio, canvas, progress, video {
            display: inline-block;
            vertical-align: baseline;
            height: 110vh;
            width: 100vw;
            }   
    
        .image-area-story{
            display:flex;
            position: fixed;
            height: 100vh;
            width: 100vw;
            top:0;
            background-color:black;
            justify-content: center;
            align-content: center;
            flex-direction: column;
            }

        .image_or_video_preview{
                margin-top: 0vh;
    width: 102vw;
    height: 100vh;
        }
        
        #form-new-story{
            width:110vw;
            height:100vh;
        }
       
        
        #button_locale{
           display: flex;
    justify-content: center;
    align-items: flex-end;
    flex-direction: column;
    flex-wrap: nowrap;
    margin-top: 50vh;
    margin-right: -10vw;
        }

        #story_send_btns{
            
            position: fixed;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
            
            }

        #visibile_txt_story{
            color:white;
            }
     
    }
  
</style>

<div>
    <div id="storyModal" role="dialog">
        <form id="form-new-story">
            <input type="hidden" value="">
            <div class="image-area-story">  
                <div class="image_or_video_preview">
                </div>    
            </div>  
            </br>
            <div class="slidecontainer" style="position:fixed; margin-top:-160px; margin-left:60px;">
                <input type="range" min="24" max="72" value="24" step="24" class="slider" name="expire_hours" id="expire_hours"">
                </br>
                <p id="visibile_txt_story"> Visibile per <span id="hours"></span> Hrs</p>               
            </div>
            <div id="button_locale">
                <div id="story_send_btns">   
                    <a href="{{ url('/social/'.$user->username) }}">
                        
                        <img class="im_pro" style="border:2px solid white;" src="{{asset('storage/'.$user->avatar_location)}}" alt="YouTube">
                       
                    </a>
                    </br>
                    <a href="#" class="btn btn-default btn-add-image btn-sm" onclick="uploadStoryImage()">
                            <img class="im_pro"  src="{{url('/')}}/assets/media/icons/socialbuttons/fotocamera.png" alt="YouTube">
                    </a>
                    
                    </br>
                    <a href="{{url('/')}}/newpost" class="btn btn-default btn-add-image btn-sm">
                        
                            <img class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/x.png" alt="YouTube">
                       
                    </a>
                    </br>
                    <a class="btn btn-default btn-add-image btn-sm" onclick="newStoryModal();">
                        <img class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/send.png" alt="YouTube">
                    </a>
                    <input style="visibility:hidden;" type="file" class="image-input" name="photo" onchange="previewStoryImage(this)">  
                </div>
            </div> 
        </form> 
    </div>
</div>

 {{--<div style="position:fixed; margin-top:200px;">
                   <textarea id="content_txt_story" rows = '8' name="content" class="content" placeholder="✍️"></textarea>
                    <textarea id="location_txt_story" rows = '2' name='location' class='content' placeholder='📍'></textarea>
                </div>--}}

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@endsection

@push('after-scripts')

<script>

    var slider = document.getElementById("expire_hours");
    var output = document.getElementById("hours");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }


    

    window.onload = function () {
        window.scrollTo(1, 1);
    }

    /*
    function checkHours(){
	    var hours = $('#expire_hours').val();
	    if(hours > 72){
		    $('#error_message').text('Please select less then 72 hours');
	    }else{
		    var start_hours = hours;
	    }   
    }
    */

</script>

@endpush