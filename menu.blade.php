<style>

.btn.btn-default {
    background: white;
    color: black;
    border: 2px solid #F7F5F8;
    margin-right:5px;
    margin-top:6px;
    border-radius:7px;
    height: 35px;
    box-shadow: none;
}

.btn.btn-default.active, .btn.btn-default:active, .btn.btn-default:hover, .show>.btn.btn-default{
    color:black;
    background-color:white;
}

#menu_icon_size{
    height: 60px;
    width: 60px;
    border-radius: 100%;
    margin-left: 0px;
    //border:2px solid white;
    //box-shadow: 2px 2px 10px 10px #F7F5F8;
}

.card{
    padding:20px;
    display:flex;
    align-items:center;
    margin-left: 15px;
    margin-bottom: 1px;
}

#black_link{
    color:black!important;
}

@media screen and (max-width: 1024px){

    #new_menu_scroll { 
        //border-top: 2px solid #F7F5F8;
        background-color: transparent;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        height:45px;
        margin-left:3vw;
        margin-bottom:1vh;
        }
    
    #second_menu { 
        background-color: transparent;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        //height:45px;
        //margin-left:3vw;
        width: 101vw;
        padding-right: 15px;
        margin-left: -2px;
        margin-bottom:1vh;
        margin-right: 10px;
        }

   

    .new-menu-item {
        height: 25px;
        display: inline-block;
        padding: 4px;
        text-align: center;
        }
    
    #second-menu-item {
        height: 50px;
        display: inline-block;
        padding: 4px;
        text-align: center;
        border:2px solid lightgray;
        }

    .card{
      border-radius:10px;
    }
  
}


@media screen and (min-width: 1024px){

    #new_menu_scroll { 
        background-color: transparent;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        display: flex;
        flex-direction: row;
        justify-content: center;
        height:50px;
        }
    
    #second_menu { 
        background-color: transparent;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        display: flex;
        flex-direction: row;
        justify-content: center;
        //height:50px;
        }

    .new-menu-item {
        height: 25px;
        background: white;
        display: inline-block;
        padding: 4px;
        text-align: center;
        }
    
    #second-menu-item {
        height: 50px;
        display: inline-block;
        padding: 4px;
        text-align: center;
        }

}

</style>

<div id="new_menu_scroll">
            
                        
                    

                    
                        <div  class="follow_link_icons profile-follow-b1">
                            {!! sHelper::followButton($user->id, Auth::id(), '.profile-follow-b1') !!}
                        </div>

                    @if(!$they_blocked_me)
                        @if($can_see)
                            @if(!$my_profile)
                                
                                <a href="{{ url('/direct-messages/show/'. $user->id) }}" class="btn btn-default">
                                    <div  class="follow_link_icons">
                                        Messaggio
                                    </div>
                                </a>
                               
                            @endif

                            @if(! empty($user->dettagli->whatsapp) || ! empty($user->dettagli->tripadvisor) || ! empty($user->dettagli->airbnb) || ! empty($user->dettagli->amazon) || ! empty($user->dettagli->ebay) || ! empty($user->dettagli->subito) || ! empty($user->dettagli->apple) || ! empty($user->dettagli->apple_music) || ! empty($user->dettagli->spotify) || ! empty($user->dettagli->playstation) || ! empty($user->dettagli->xbox) || ! empty($user->dettagli->yelp) || ! empty($user->dettagli->skype) || ! empty($user->dettagli->zoom) || ! empty($user->dettagli->telegram) || ! empty($user->dettagli->discord) || ! empty($user->dettagli->blogger) || ! empty($user->dettagli->udemy) || ! empty($user->dettagli->evernote) || ! empty($user->dettagli->craigslist))
                            <div>
                                <button onclick="openSecondMenu()" class="btn btn-default">
                                <i class="material-icons nav__icon" style="color:black; margin-bottom:4px; margin-left:2px;">expand_more</i>
                                </button>
                            </div>
                            @endif
                        @endif
                    @endif

</div>

<div id="second_menu" style="display:none;">
@if($can_see)


@if(! empty($user->dettagli->whatsapp))
 <a href="whatsapp://send?phone={{$user->dettagli->whatsapp}}&text=Ciao!"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center; " class="card-text">Whatsapp</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->tripadvisor))
<a href="{{$user->dettagli->tripadvisor}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/tripadvisor.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Tripadvisor</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->airbnb))
<a href="{{$user->dettagli->airbnb}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/airbnb.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Airbnb</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->amazon))
<a href="{{$user->dettagli->amazon}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/amazon.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Amazon</p>
  </div>
</div></a>
@endif


@if(! empty($user->dettagli->subito))
<a href="{{$user->dettagli->subito}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/subito.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center; " class="card-text">Subito</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->ebay))
<a href="{{$user->dettagli->ebay}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/ebay.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Ebay</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->apple))
<a href="javascript:void(0);"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/apple_logo.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Apple</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->apple_music))
<a href="{{ $user->dettagli->apple_music}}"><div class="card" style="width: 15rem;">
    <img  id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/apple_music2.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Apple Music</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->spotify))
<a href="{{ $user->dettagli->spotify}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/spotify.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Spotify</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->playstation))
<a href="javascript:void(0);"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/playstation.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">{{ $user->dettagli->playstation }}</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->xbox))
<a href="javascript:void(0);"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/xbox.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center; " class="card-text">{{ $user->dettagli->xbox }}</p>
  </div>
</div></a>
@endif

 @if($user->hasRole('brand') || $user->company == 1)
                    @if(! empty($user->dettagli->azienda_via) && $user->address_visible != 1)
<a href="http://www.google.com/maps/?q={{$user->dettagli->azienda_nome}}, {{$user->dettagli->azienda_via}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/gmaps.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Location</p>
  </div>
</div></a>
@endif
@endif


@if(! empty($user->dettagli->yelp))
<a href="{{$user->dettagli->yelp}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/yelp.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Yelp</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->skype))
<a href="{{$user->dettagli->skype}}">
<div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/skype.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Skype</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->zoom))
<a href="{{$user->dettagli->zoom}}">
<div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/zoom.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Zoom</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->telegram))
<a href="{{$user->dettagli->telegram}}">
<div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/telegram.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Telegram</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->discord))
<a href="{{$user->dettagli->discord}}">
<div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/discord.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Discord</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->blogger))
<a href="{{$user->dettagli->blogger}}">
<div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/blogger.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Blogger</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->udemy))
<a href="{{$user->dettagli->udemy}}">
<div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/udemy.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Udemy</p>
  </div>
</div></a>
@endif


@if(! empty($user->dettagli->evernote))
<a href="{{$user->dettagli->evernote}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/evernote.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Evernote</p>
  </div>
</div></a>
@endif


@if(! empty($user->dettagli->craigslist))
<a href="{{$user->dettagli->ebay}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/craigslist.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Craigslist</p>
  </div>
</div></a>
@endif

@if(! empty($user->dettagli->website))
<a href="{{$user->dettagli->website}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/website.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Website</p>
  </div>
</div></a>
@endif


@if($user->company == 1)
<a href="javascript:hideEmailAddress($email);"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" style="background-color:white;" src="{{url('/')}}/assets/media/icons/socialbuttons/email.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Email</p>
  </div>
</div></a>

{{--
<a href="mailto:{{$user->email}}?subject=Buongiorno&amp;body={{Auth::user()->name}}"><div class="card" style="width: 15rem;">
    <img id="menu_icon_size" src="{{url('/')}}/assets/media/icons/socialbuttons/email.png">
    <div class="card-body">
    <p style="font-size:12px; text-align:center;" class="card-text">Email</p>
  </div>
</div></a>
--}}
@endif





@endif            
               

                           
</div>
        

@push('after-scripts')

<script>

function openSecondMenu() {
  var x = document.getElementById("second_menu");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}

</script>

@endpush