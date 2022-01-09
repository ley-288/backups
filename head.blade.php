
<style>

    .request-button:after {
        content: 'Inviato!'
    }

    .slim *, .slim-crop-area *, .slim-image-editor *, .slim-popover *{
        margin-left:0px;
    }


    @media screen and (max-width: 1024px) {

        #modify_photo_avatar_here{
           margin-left:auto;
           margin-right:auto;
           margin-top:10px;
           border-radius:50px; 
           height:100px; 
           width:100px;
           box-shadow: 2px 2px 10px 10px #F7F5F8;
           margin-bottom:30px;
        }

    }

    @media screen and (min-width: 1024px) {

        #modify_photo_avatar_here{
           margin-top:20px;
           border-radius:50px; 
           height:100px; 
           width:100px;
           box-shadow: 2px 2px 10px 10px #F7F5F8;
           margin-bottom:30px;
        }

    }

</style>

<style>

.btn{
    border-radius:5px !important;
}

.moreellipses{
    width:40vw;
}


.morecontent{
    width:40vw;
}

.form-control{
    border:none;
    box-shadow:none;
}

input[type="text"]{
    font-size: 12px!important;
}

#form-upload-avatar{
    //width:100vw;
}

.kt-switch.kt-switch--icon input:checked~span:after{
    font-family: "Material Icons";
    content: "\e897";
}

#change_prof_btn{
    margin-top: 0vh;
    margin-left: -75vw;
}

#new_prf_cam{
    height:20px;
    width:20px;
    margin-left: 21vw;
    margin-top: 9vh;
}

.profile-upload-cover{
    margin-top:20vh;
}

.avatar-area {
    z-index:2;
}

.avatar_preview{
    height:80px;
    width:80px;
    border-radius:40px;
}

#avatar_thumbnail{
    position:absolute;
    border-radius:100%;
    height:20px;
    width:20px;
}

#cover_thumbnail{
    position:absolute;
    border-radius:100%;
    height:20px;
    width:20px;
    object-fit: cover;
}

#new_modal_avatar{
    z-index:1;
    box-shadow: 2px 2px 10px 10px #F7F5F8;
    height:80px;
    width:80px;
    border-radius:40px;
    object-fit:cover;
}


#avatar_modal_body{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    align-content: center;
    flex-wrap: nowrap;
    flex-direction: column;
}

div.a{
    width:80vw; 
    font-size:10px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; 
}

div.a:hover {
    width:80vw;
    overflow: visible;
}

.following-button:after {
    content: 'Segui già';
}

.im_pro_edit{
    height:40px;
    width:40px;
    margin-right:10px;
    margin-left:5px; 
    margin-top:10px;
    }

@media screen and (max-width: 1024px){

    #dots_on_computer{
        display:none;
    }

    .profile-description{
         width:80vw;
    }

    #mobile_header_style{
        display:none;
    }

.cover-area{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    align-content: center;
    margin-top: -15vh;
    height: 17vh;
    object-fit: cover;
    opacity:0.9;
    width: 88vw;
    z-index: -1;
}

#new_modal_background_image {
    margin-top: 35vh;
    width: 105vw;
    height: 25vh;
    object-fit: cover;
    opacity: 0.9;
    z-index: -1;
    border-radius: 10px;
}

#change_avatar_icon{
    position:absolute;
    //color:#F1656E;
        background-image: linear-gradient(#e72b38, #e72b80);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-left:87vw;
    margin-top:17vh;
    z-index:1;
    font-size:28px;
    opacity:0.5;
}

#change_cover_icon{
    position:absolute;
    //color:#F1656E;
        background-image: linear-gradient(#e72b38, #e72b80);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-left:27vw;
    margin-top:23vh;
    z-index:1;
    opacity:0.5;
}


.dot {
    display:none;
 margin-left:82vw;
 margin-top:27.8vh;
  border: 10px solid black;
  background: transparent;
  -webkit-border-radius: 60px;
  -moz-border-radius: 60px;
  border-radius: 60px;
  height: 90px;
  width: 90px;
  -webkit-animation: pulse 3s ease-out;
  -moz-animation: pulse 3s ease-out;
  animation: pulse 3s ease-out;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  position: absolute;
  top: -25px;
  left: -25px;
  z-index: 0;
  opacity: 0;
}

@-moz-keyframes pulse {
 0% {
    -moz-transform: scale(0);
    opacity: 0.0;
 }
 25% {
    -moz-transform: scale(0);
    opacity: 0.1;
 }
 50% {
    -moz-transform: scale(0.1);
    opacity: 0.3;
 }
 75% {
    -moz-transform: scale(0.5);
    opacity: 0.5;
 }
 100% {
    -moz-transform: scale(1);
    opacity: 0.0;
 }
}

@-webkit-keyframes "pulse" {
 0% {
    -webkit-transform: scale(0);
    opacity: 0.0;
 }
 25% {
    -webkit-transform: scale(0);
    opacity: 0.1;
 }
 50% {
    -webkit-transform: scale(0.1);
    opacity: 0.3;
 }
 75% {
    -webkit-transform: scale(0.5);
    opacity: 0.5;
 }
 100% {
    -webkit-transform: scale(1);
    opacity: 0.0;
 }
}

    #desktop_layout{
        margin-top:-66px;
    }

    body.modal-open {
        overflow: hidden !important;
        margin-top:-2% !important;
    }

    .main-content {
        margin-top: 20px;
    }

    #header_row{
        display: flex;
        justify-content: flex-start;
        width:100vw;
        margin-bottom: 5px;
        margin-top:10vh;

    }   
    
    #profile_image_new{
        position: absolute;
        height:120px;
        width:120px;
        border-radius: 100%;
        margin-left:5vw;
        margin-top:10vh;
        border:3px solid white;
        object-fit: cover;
    }

    #profile_image_new_hidden{
        position: absolute;
        height:120px;
        width:120px;
        border-radius: 100%;
        margin-left:5vw;
        margin-top:10vh;
        border:3px solid white;
        object-fit: cover;
        filter:blur(5px);
    }


/*
#head{padding:0px; position: sticky; top:0px; left:0px; z-index: 1000;}

#head.fixed-header{width:60px;height:60px;}

#head .logo img{width:60px; height:60px; transition: all linear 5s}
#head.fixed-header .logo img{width:60px; height:60px;}
*/

    //.logo {
    /*width: 120px;*/
     /*height: 120px;*/
     //min-width:60px;
     //min-height:60px;
     //width:200px; transition: all linear .5s
//}

    #profile_name_new{
        margin-left: 5vw;
        margin-top: 29vh;
        z-index:1;

        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    #profile_verified_new{
        height:15px;
        margin-left:0px;
        margin-top:-2px;
    }

    #full_screen_name{
        font-size:10px; 
    }

    #full_screen_role{
        font-size:10px; 
        //color:#e72b38;
        color:black;
        padding-right: 80px;
        //background-image: linear-gradient(#e72b38, #e72b80);
        //-webkit-background-clip: text;
        //-webkit-text-fill-color: transparent;
    }

    #full_screen_bio{
        font-size:10px;
        //max-width: 90vw;
        max-width: 70vw; 
        margin-bottom: 10px;
    }

    #profile_spider_new{
        position:absolute;
        //background-color: #e72b38;
        background-image: linear-gradient(red, #e72b38);
        color: white;
        height: 70px;
        width: 70px;
        border-radius: 100%;
        //margin-top:-76px;
        //margin-top:-50px;
        margin-left: 72vw;
        margin-right:3vw;
        text-align:center;
        //border:1px solid #e72b38;
        z-index: 1;
        animation: shadowThrob 1.5s infinite;
        animation-direction: normal;
        -webkit-animation: shadowThrob 1.5s ease-out infinite;
        -webkit-animation-direction: normal;
        display:flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        font-size: 10px;
    }
    @keyframes shadowThrob {
	    //from {box-shadow: 0 0 0 8px rgba(0,0,0, 1);}
	    //to {box-shadow: 0 0 0 1px rgba(1,1,1, 0.1);}
         from {   box-shadow: 0 0 0 6px rgb(172 172 172 / 48%);}
         to {   box-shadow: 0 0 20px 10px rgb(1 1 1 / 0%);}
    }
    @-webkit-keyframes shadowThrob {
	    //from {box-shadow: 0 0 0 0px rgba(0,0,0, 1);}
	    //to {box-shadow: 0 0 0 8px rgba(1,1,1, 0.1);}
          from {   box-shadow: 0 0 0 6px rgb(172 172 172 / 48%);}
         to {   box-shadow: 0 0 20px 10px rgb(1 1 1 / 0%);}
    }

    #profile_number_new{
        //text-align: center;
        //font-size: 18px;
        //margin-top: 2vh; 
        //margin-bottom:4vh;
        //font-weight:bold;
    }

    #background-container{
        //position: absolute;
        //padding:15px;
        position:fixed;
        z-index: 0;
        //margin-left:-5px;
        width:103vw;
        max-height: 25vh;
        top:0;
        //margin-left: 190px;
    }

    #new_background_image{
        width: 100vw;
        //padding: 20px;
        margin-left: 0px;
        height: 35vh;
        object-fit: cover;
        filter:contrast(0.9);
    }

    

    #no_background_image{
        margin-top:0vh;
        width: 105vw;
        height: 35vh;
        object-fit: cover;
        opacity:1;
    }

}

@media screen and (min-width: 1024px){

    #change_background_modal_icon{
        display:none;
    }

    #hide_on_computer{
        display:none;
    }

     .main-content {
        display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    align-content: center;
    flex-wrap: nowrap;
    }


    .cover-area {
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    margin-top: -15vh;
    height: 17vh;
    object-fit: cover;
    opacity: 0.9;
    width: 88vw;
    z-index: -1;
    justify-content: flex-start;
    }

    #new_modal_background_image {
    margin-top: 28vh;
    width: 33vw;
    height: 20vh;
    object-fit: cover;
    opacity: 0.9;
    z-index: -1;
    border-radius: 10px;
}

    #change_avatar_icon{
    position:absolute;
    //color:#F1656E;
    background-image: linear-gradient(#e72b38, #e72b80);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
    margin-left:760px;
    margin-top:320px;
    z-index:1;
    font-size:28px;
    opacity:0.5;
}

#change_cover_icon{
    position:absolute;
    //color:#F1656E;
    background-image: linear-gradient(#e72b38, #e72b80);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
    margin-left: 440px;
    margin-top: 350px;
    z-index:1;
    opacity:0.5;
}

.dot {
    display:none;
 margin-left:73vw;
 margin-top:35vh;
  border: 10px solid #e72b38;
  background: transparent;
  -webkit-border-radius: 60px;
  -moz-border-radius: 60px;
  border-radius: 60px;
  height: 90px;
  width: 90px;
  -webkit-animation: pulse 3s ease-out;
  -moz-animation: pulse 3s ease-out;
  animation: pulse 3s ease-out;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  position: absolute;
  top: -25px;
  left: -25px;
  z-index: -1;
  opacity: 0;
}

@-moz-keyframes pulse {
 0% {
    -moz-transform: scale(0);
    opacity: 0.0;
 }
 25% {
    -moz-transform: scale(0);
    opacity: 0.1;
 }
 50% {
    -moz-transform: scale(0.1);
    opacity: 0.3;
 }
 75% {
    -moz-transform: scale(0.5);
    opacity: 0.5;
 }
 100% {
    -moz-transform: scale(1);
    opacity: 0.0;
 }
}

@-webkit-keyframes "pulse" {
 0% {
    -webkit-transform: scale(0);
    opacity: 0.0;
 }
 25% {
    -webkit-transform: scale(0);
    opacity: 0.1;
 }
 50% {
    -webkit-transform: scale(0.1);
    opacity: 0.3;
 }
 75% {
    -webkit-transform: scale(0.5);
    opacity: 0.5;
 }
 100% {
    -webkit-transform: scale(1);
    opacity: 0.0;
 }
}

    body.modal-open {
        overflow: hidden !important;
        margin-top:5% !important;
    }

   #header_row{
        justify-content: center;
    }  
    
    #profile_image_new{
        height:150px;
        width:150px;
        object-fit:cover;
        border-radius: 100%;
        margin-left:auto;
        margin-right:auto;
        margin-top:-120px;
        border:3px solid white;
        display: flex;
        justify-content: center;
        float:center;
    }

    #profile_image_new_hidden{
        height:150px;
        width:150px;
        object-fit:cover;
        border-radius: 100%;
        margin-left:auto;
        margin-right:auto;
        margin-top:-120px;
        border:3px solid white;
        display: flex;
        justify-content: center;
        float:center;
        filter:blur(5px);
    }

    #profile_verified_new{
        height:15px;
        margin-left:0px;
    }

    #profile_name_new{
        font-size:24px; 
        margin-top:-2vh;
        display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding:10px;
    }

    #full_screen_name{
        font-size:10px;
    }

    #full_screen_role{
        font-size:10px; 
        color:#e72b38;
    }

    #full_screen_bio{
        margin-top:1vh;
        font-size:12px; 
        max-width:50vw; 
    }

    #profile_spider_new{
        position:absolute;
        background-color: #e72b38;
        border:3px solid white;
        color: white;
        height: 60px;
        width: 60px;
        border-radius: 100%;
        //margin-top: -120px;
        margin-left:720px;
        text-align:center;
         animation: shadowThrob 1.5s infinite;
        animation-direction: normal;
        -webkit-animation: shadowThrob 1.5s ease-out infinite;
        -webkit-animation-direction: normal;
        display:flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        font-size: 10px;
    }

     @keyframes shadowThrob {
	    //from {box-shadow: 0 0 0 8px rgba(0,0,0, 1);}
	    //to {box-shadow: 0 0 0 1px rgba(1,1,1, 0.1);}
         from {   box-shadow: 0 0 0 6px rgb(172 172 172 / 48%);}
         to {   box-shadow: 0 0 20px 10px rgb(1 1 1 / 0%);}
    }
    @-webkit-keyframes shadowThrob {
	    //from {box-shadow: 0 0 0 0px rgba(0,0,0, 1);}
	    //to {box-shadow: 0 0 0 8px rgba(1,1,1, 0.1);}
          from {   box-shadow: 0 0 0 6px rgb(172 172 172 / 48%);}
         to {   box-shadow: 0 0 20px 10px rgb(1 1 1 / 0%);}
    }

    #profile_number_new{
        font-size: 16px;
        margin-top: 1.5vh; 
        margin-bottom:4vh; 
    }
    

    #background-container{
        display:flex;
        justify-content:center;
        z-index: -1;
        width:800px;
        //margin-left:-1.8vw;
        height: 350px;
        margin-top:-115px;
    }

    #new_background_image{
        width: 800px;
        height: 350px;
        object-fit: cover; //not sure about it
        //opacity:0.9;
        filter:contrast(0.9);
        z-index: -1;
        border-top-right-radius:25px;
        border-top-left-radius:25px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
    }

    #no_background_image{
        width: 800px;
        height: 350px;
        object-fit: cover;
        opacity:0.9;
        z-index: -1;
    }

    #dots_on_computer{
        position:absolute;
        color:red;
        margin-top:180px;
        margin-left:750px;
        
    }

}

</style>

<div id="dots_on_computer">
 <a data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}"><i class="material-icons nav__icon">more_horiz</i></a>
</div>                  
<div id="header_row">
    @if($my_profile)
        <a data-item="{{ $user->id }}" data-toggle="modal" data-target="#newBackgroundModal-{{ $user->id }}">
            <i class="material-icons nav__icon" id="change_avatar_icon">photo_camera</i>
        </a>
        <a data-item="{{ $user->name }}" data-toggle="modal" data-target="#avatarModal-{{ $user->id }}">
            <i class="material-icons nav__icon" id="change_cover_icon">photo_camera</i>
        </a>
    @endif 
    @if(!empty($user->cover_path))
        <div id="background-container">
            <img id="new_background_image" src="{{ $user->getCover() }}">
        </div>
    @else
        <div id="background-container">
            @if($my_profile)
                <a style="z-index:-5 !important;" data-item="{{ $user->id }}" data-toggle="modal" data-target="#newBackgroundModal-{{ $user->id }}">
                    <img id="no_background_image" src="{{url('/')}}/assets/media/icons/angryimg-2.png">
                </a>
            @else
                <img id="no_background_image" src="{{url('/')}}/assets/media/icons/angryimg-2.png">
            @endif
        </div>
    @endif         
    @if($user->avatar_location != '')
        @if($my_profile)
            <a data-item="{{ $user->name }}" data-toggle="modal" data-target="#avatarModal-{{ $user->id }}">
                <img id="profile_image_new" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
            </a>
        @else
            <div id="head">
            
                <a href="#" @if($user->id != 274) data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}" @endif>
                    <img id="profile_image_new" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                </a>
            </div>
        @endif
    @else
        @if($my_profile)
            <a data-item="{{ $user->name }}" data-toggle="modal" data-target="#avatarModal-{{ $user->id }}">
                <img id="profile_image_new" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png?v=2" alt="Immagine profilo">
            </a>
        @else
            <a data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}">
                <img id="profile_image_new" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png?v=2" alt="Immagine profilo">
            </a>
        @endif
    @endif




    <div id="profile_name_new">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"> @if ($user->hasRole('brand') || $user->company == 1) {{ $user->dettagli->azienda_nome }} @elseif ($user->hasRole('influencer')){{ $user->name }} @endif
            @if($user->verified == 1)
                <img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Verified">
            @elseif($user->gold == 1)
                <img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Verified">
            @elseif($user->staff == 1)
                <img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Verified">
            @endif
        </div>
        <div id="full_screen_name">{{ '@'.$user->username }}
        </div>
        <div id="full_screen_role">@if($user->hasRole('influencer')) @if(!empty($user->profession)){{$user->profession}}@endif @endif @if($user->hasRole('brand')) @lang('applicazione.azienda_role')@endif
        </div>
        @if(! empty($user->bio))  
                <div id="full_screen_bio">{{ $user->bio }}
                </div>
                </br>   
            @endif 	
    

   
        @if($user->id != 274)
            <a id="profile_spider_new" href="#">
                @if($user->dettagli)
                    @if($user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower +  $user->follower()->where('allow', 1)->count() < 99)
                        <strong style="font-size: 18px;">  {{$user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count()}}</strong>  Spiders  
                    @endif
               
                    @if($user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower +  $user->follower()->where('allow', 1)->count() >= 100 && $user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower +  $user->follower()->where('allow', 1)->count() < 999)
                         <strong style="font-size: 18px;"> {{$user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count()}}</strong> Spiders  
                    @endif

                    @if($user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count() >= 1000 && $user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count() <= 9999)
                          <strong style="font-size: 18px;"> {{round($user->dettagli->facebook_follower / 1000, 1) + round($user->dettagli->twitter_follower / 1000, 0) + round($user->dettagli->instagram_follower / 1000, 1) + round($user->dettagli->youtube_follower / 1000, 0) + round($user->dettagli->linkedin_follower / 1000, 1) + round($user->dettagli->tiktok_follower / 1000, 1) + round($user->dettagli->pinterest_follower / 1000, 1) + round($user->dettagli->snapchat_follower / 1000, 0) + round($user->dettagli->twitch_follower / 1000, 1) + round($user->dettagli->reddit_karma / 1000, 1) + round($user->dettagli->tumblr_follower / 1000, 1) + round($user->dettagli->myspace_follower / 1000, 1) + round($user->follower()->where('allow', 1)->count() / 1000, 0)}} K </strong> Spiders                     
                    @endif

                    @if($user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count() >= 10000 && $user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count() <= 999999)
                       <strong style="font-size: 18px;">  {{floor(round($user->dettagli->facebook_follower / 1000, 1) + round($user->dettagli->twitter_follower / 1000, 0) + round($user->dettagli->instagram_follower / 1000, 1) + round($user->dettagli->youtube_follower / 1000, 0) + round($user->dettagli->linkedin_follower / 1000, 1) + round($user->dettagli->tiktok_follower / 1000, 1) + round($user->dettagli->pinterest_follower / 1000, 1) + round($user->dettagli->snapchat_follower / 1000, 0) + round($user->dettagli->twitch_follower / 1000, 1) + round($user->dettagli->reddit_karma / 1000, 1) + round($user->dettagli->tumblr_follower / 1000, 1) + round($user->dettagli->myspace_follower / 1000, 1) + round($user->follower()->where('allow', 1)->count() / 1000, 1))}} K </strong> Spiders                         
                    @endif

                    @if($user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count() >= 1000000 && $user->dettagli->facebook_follower + $user->dettagli->twitter_follower + $user->dettagli->instagram_follower + $user->dettagli->youtube_follower + $user->dettagli->linkedin_follower + $user->dettagli->tiktok_follower + $user->dettagli->pinterest_follower + $user->dettagli->snapchat_follower + $user->dettagli->twitch_follower + $user->dettagli->reddit_karma + $user->dettagli->tumblr_follower + $user->dettagli->myspace_follower + $user->follower()->where('allow', 1)->count() <= 999999999)
                        <p id="profile_number_new">  <strong style="font-size: 18px;">  {{floor(round($user->dettagli->facebook_follower / 1000000, 1) + round($user->dettagli->twitter_follower / 1000000, 1) + round($user->dettagli->instagram_follower / 1000000, 0) + round($user->dettagli->youtube_follower / 1000000, 1) + round($user->dettagli->linkedin_follower / 1000000, 1) + round($user->dettagli->tiktok_follower / 1000000, 1) + round($user->dettagli->pinterest_follower / 1000000, 1) + round($user->dettagli->snapchat_follower / 1000000, 1) + round($user->dettagli->twitch_follower / 1000000, 1) + round($user->dettagli->reddit_karma / 1000000, 1) + round($user->dettagli->tumblr_follower / 1000000, 1) + round($user->dettagli->myspace_follower / 1000000, 0) + round($user->follower()->where('allow', 1)->count() / 1000000, 0))}} M </strong> Spiders </p>
                    @endif
   

                    

                @endif

              
            </a> 
            @endif


            {{--<div class="dot">
            </div>--}}  
            
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade"  id="newBackgroundModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">   
            </div>
            <div class="modal-body" style="height: 350px;">
            <div style="display:flex;justify-content:center;">
              @include('frontend.user.account.change-background')
            </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div style="padding-bottom:80px;" class="modal fade"  id="avatarModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$user->name}}</h4>
            </div>
            <div class="modal-body" id="avatar_modal_body">
                <div>
                    <div class="avatar-area" style="display:flex; justify-content:center;">
                       @include('frontend.user.account.tabs.change-avatar')  
                    </div>
                    </br>
                    <div style="text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        Cambia il tuo foto
                    </div>
                    <hr>
                    <form id="form-upload-avatar" enctype="multipart/form-data" action="{{ url('/social/{username}/upload/prof')  }}" method="POST">
                        @csrf
                        
                      <div id="new_modal_buttons">
                       {{-- <i style="font-size:14px;margin-right:5px;" class="material-icons nav__icon">block</i> Avatar visiblie agli altri utenti?
                        </br>
                        <span class="kt-switch kt-switch kt-switch--icon">
                            <label>
                                <input type="checkbox" name="avatar_private" id="avatar_private" value="1" @if($user['avatar_private'] == 1){{ 'checked' }}@endif>
                                <span></span>  
                            </label>
                        </span> --}}
                        
                            <div class="profile-description" style="margin-top: 5px;">
                                <input type="text" class="form-control" maxlength="200" name="first_name" id="first_name" placeholder="Nome" value="{{ $user->first_name != '' ? $user->first_name : ''}}" required>
                            </div>
                            <div class="profile-description" style="margin-top: 5px">
                                <input type="text" class="form-control" maxlength="200" name="last_name" id="last_name" placeholder="Cognome" value="{{ $user->last_name != '' ? $user->last_name : ''}}" required>
                            </div>
                            <div class="profile-description"  style="margin-top: 5px">
                                <input type="text" class="form-control" maxlength="200" name="profession" id="profession" placeholder="Profession" value="{{ $user->profession != '' ? $user->profession : ''}}">
                            </div>
                            <div class="profile-description"  style="margin-top: 5px">
                                <input type="text" class="form-control" maxlength="1000" name="profile_bio" id="profile_bio" placeholder="Bio" value="{{ $user->bio != '' ? $user->bio : ''}}">
                            </div>
                            <div class="profile-description"  style="margin-top: 5px">
                                <input type="text" class="form-control" maxlength="200" name="city" id="city" placeholder="City" value="{{ $user->city != '' ? $user->city : ''}}">
                            </div>
                            <hr>
                        </div>   
                        <i style="font-size:14px;margin-right:5px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">lock</i> Account privato?
                        </br>
                        <span class="kt-switch kt-switch kt-switch--icon">
                            <label>
                                <input type="checkbox" name="profile_type" id="profile_type" value="1" @if($user['private'] == 1){{ 'checked' }}@endif>
                                <span></span>  
                            </label>
                        </span>
                        <hr>
                        
                        @if(!empty($user->getAddress()))
                         <i style="font-size:14px;margin-right:5px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">lock</i> Indirizzo privato?
                         </br></br>
                        <strong>{{ $user->getAddress() }}</strong>
                        </br></br>
                        Indirizzo visiblie agli altri utenti?
                        </br></br>
                        <span class="kt-switch kt-switch kt-switch--icon">
                            <label>
                                <input type="checkbox" name="address_visible" id="addres_visible" value="1" @if($user['address_visible'] == 1){{ 'checked' }}@endif>
                                <span></span>  
                            </label>
                        </span>
                        </br>
                        


                        <a href="#" data-toggle="modal" data-target="#findMeModal-{{$user->id}}">Inidirzzo sbagliato?</a>
                        
                        <hr>
                        @endif
                       
                        <div style="display:flex; justify-content:center;" class="modal-footer">
                            <button type="submit" class="btn btn-default" value="Submit">Salva</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade"  id="findMeModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">   
            </div>
            <div class="modal-body">
                <div style="display:flex;justify-content:center;">
                    <form style="overflow-x:hidden; width:100%;" id="form-profile-information">
                        {{ csrf_field() }}
                        <input type="hidden" value="" name="map_info" class="map-info">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input style="border-radius:5px; border:2px solid #F7F5F8;" type="text" class="form-control location-input" value="{{ $user->getAddress() }}" aria-describedby="basic-addon1">
                                        <input type="hidden" value="" name="map_info" class="map-info">
                                    </div>
                                </div>  
                            </div>
                            </br>
                            <div class="clearfix"></div>
                            <a href="javascript:;" style="display:flex; justify-content:center;" onclick="findMyLocation({{$user->id}})">Posizione Reale ( Dal tuo telefono<i style="font-size:12px;" class="material-icons nav__icon">location_on</i>)</a>
                            </br>
                        </div>
                        </br></br></br>
                        <div class="row" style="display:flex; justify-content:center;">
                           <button type="button" class="btn btn-success saveMyLocation" onclick="saveMyLocation({{$user->id}})">@lang('applicazione.salva')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


            
<script>

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


$(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    var scrollHeight = 

        $('#background-container').css({
        opacity: function() {
            var elementHeight = $(this).height(),
            opacity = ((elementHeight - scrollTop) / elementHeight);
            return opacity;
            }
        });
});


$(window).scroll(function() {
  var scroll = $(window).scrollTop();
	$("#new_background_image").css({
		//transform: 'translate3d(-50%, -'+(scroll/100)+'%, 0) scale('+(100 + scroll/5)/100+')',
        //left:'190px';
		"-webkit-filter": "blur(" + (scroll/50) + "px)",
		filter: "blur(" + (scroll/30) + "px)",
        transform:  'scale('+(100 + scroll/20)/100+')',
	});
});



</script>
@endpush
